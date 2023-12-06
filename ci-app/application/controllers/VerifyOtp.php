<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Class VerifyOtp
 *
 * The `VerifyOtp` class handles OTP verification, updates data, and prepares responses.
 * It extends the `Appointment` class, adding specific OTP verification functionality.
 *
 * @package App\Controllers
 */
class VerifyOtp extends Appointment
{
    /**
     * Performs OTP verification and handles subsequent actions.
     *
     * @throws Exception
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public final function index(): void
    {
        $TEST = 1;

        if (!$this->isVerificationRequest()) {
            return;
        }

        $otp = $this->input->post('otp');
        $mobile = $this->session->userdata('full_mobile_no');

        $postData = [
            'authkey' => MSG91_AUTH_KEY,
            'template_id' => MSG91_OTP_TEMPLATE_ID,
            'mobile' => $mobile,
            'otp' => $otp,
            'otp_expiry' => 10,
        ];

        if (!$TEST) { //todo
            $response_decoded = $this->apiMiddleware->_SMSRequest('/api/v5/otp/verify', $postData);

            if (!$this->isSuccessfulVerification($response_decoded)) {
                $this->apiMiddleware->errorResponseBuilder($response_decoded, $response_decoded['data']['message'] ?? 'Invalid OTP');
                return;
            }
        }

        // Update new_appointment_details
        $this->appointment_model->updateAppointmentDetails("2", "Verify otp");

        // Update otp_entries
        $this->appointment_model->updateOtpEntries();

        // Set session variable
        if ($this->session->userdata('session_mobile_no') != "") {
            $this->session->set_userdata('otp_verified', 1);
        }

        // Send as OPTIN for Whatsapp API
        $this->sendWhatsAppOptin($this->session->userdata('session_mobile_no'));

        // Insert api request in db
        $patlist_code = generate_random_id(8);
        $patListData = $this->insertPatApiLog($patlist_code);

        // Update api response across the request in db
        $this->updatePatApiLog($patListData, $patlist_code);

        // Get patient data
        $this->getPatientData($patListData);

        // Get upcoming and past appointments
        $this->getAppointments();

        // Prepare and echo response
        $this->prepareResponse();
    }

    /**
     * Checks if the current request is a verification request.
     *
     * @return bool True if it's a verification request; otherwise, false.
     */
    private function isVerificationRequest(): bool
    {
        return $this->input->post('status') == 'verify' && $this->input->post('otp') != '';
    }

    /**
     * Checks if OTP verification was successful based on the API response.
     *
     * @param array $response_decoded The decoded API response.
     *
     * @return bool True if verification is successful; otherwise, false.
     */
    private function isSuccessfulVerification(array $response_decoded): bool
    {
        return $response_decoded['data'] && $response_decoded['json'] && $response_decoded['data']['type'] !== "error";
    }

    /**
     * Inserts patient API log, updates API response in the database, and gets patient data.
     *
     * @param int $patlist_code The code associated with the patient API log.
     *
     * @return array The patient list data.
     * @throws Exception
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    private function insertPatApiLog(int $patlist_code): array
    {
        $postData = [
            "mobileno" => $this->session->userdata('session_mobile_no'),
            "loc" => '',
        ];

        $fullPatListURL = API_HOST_URL . '/patlist';
        $patListData = $this->apiMiddleware->_APIRequest($fullPatListURL, $postData);
        $this->appointment_model->insertPatApiLog(
            $this->session->userdata('country_code'),
            $this->session->userdata('session_mobile_no'),
            $fullPatListURL . '?' . http_build_query($postData),
            $patlist_code
        );
        return $patListData;
    }

    private function updatePatApiLog(array $patListData, int $patlist_code): void
    {
        $this->appointment_model->updatePatApiLog(
            $patListData['data']['status'],
            json_encode($patListData['data']),
            $this->session->userdata('session_mobile_no'),
            $patlist_code
        );
    }

    /**
     * @throws Exception
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    private function getPatientData(array $patListData): void
    {
        $existingPts = $patListData['data'];

        if ($existingPts['patcount'] === "") {
            $this->handlePatlistError();
        } else {
            $this->updateSessionData($existingPts);
        }
    }

    /**
     * Handles errors when retrieving patient data from the API.
     *
     * @throws Exception
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    private function handlePatlistError(): void
    {
        $screenCode = "10";
        $screenMessage = "Patlist Error";

        $this->appointment_model->updateScreenCode($screenCode, $screenMessage);
        $this->email_model->sendPatlistApiDownEmail();
        $this->saveContactOpportunityDataToCrm($screenMessage);

        echo "FAILED";
    }

    /**
     * Updates session data with existing patient details.
     *
     * @param array $existingPts The existing patient details.
     */
    private function updateSessionData(array $existingPts): void
    {
        $this->session->set_userdata('patient_count', $existingPts['Total']);

        if (!empty($existingPts['Patlist'])) {
            $this->session->set_userdata('existing_patients', $existingPts['Patlist']);
        } else {
            $this->session->unset_userdata('existing_patients');
        }
    }

    /**
     * Gets upcoming and past appointments and stores them in the session.
     *
     * @throws Exception
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    private function getAppointments(): void
    {
        $sessionMobileNo = $this->session->userdata('session_mobile_no');
        $authKey = 'SImLh96q75HDKfD5J2zJFKDFs';
        $apiUrl = API_HOST_URL . '/aptlist';

        $queryParams = [
            'mobileno' => $sessionMobileNo,
            'loc' => '',
            'authkey' => $authKey,
        ];

        $result_applisttinfo = $this->apiMiddleware->_APIRequest($apiUrl, $queryParams)['data'];

        $upcomingApt = [];
        $pastApt = [];

        // Sort the array
        $arr = $result_applisttinfo['Appointmentslist'];
        usort($arr, function ($element1, $element2) {
            $datetime1 = strtotime($element1['APTDATE']);
            $datetime2 = strtotime($element2['APTDATE']);
            return $datetime2 - $datetime1;
        });

        $date_now = new DateTime();

        foreach ($arr as $appList) {
            $date2 = new DateTime($appList['APTDATE']);
            if ($date_now > $date2) {
                $pastApt[] = $appList;
            } else {
                $upcomingApt[] = $appList;
            }
        }

        $this->session->set_userdata('upcoming_appt', ($upcomingApt));
        $this->session->set_userdata('past_appt', ($pastApt));
    }

    /**
     * Prepares the response data and sends a success response.
     *
     * @throws Exception
     */
    private function prepareResponse(): void
    {
        $response_data = [
            "otp" => "true",
            "message" => "OTP verified",
            "existing_pts" => $this->session->userdata('existing_patients'),
            "upcoming_appt" => ($this->session->userdata('upcoming_appt')),
            "past_appt" => ($this->session->userdata('past_appt'))
        ];

        $this->apiMiddleware->successResponseBuilder($response_data, 'OTP verified');
    }

    /**
     * Sends a WhatsApp opt-in request.
     *
     * @param int $mobile_number The mobile number for WhatsApp opt-in.
     *
     * @return array The API response data.
     * @throws Exception
     */
    public final function sendWhatsAppOptin(int $mobile_number): array
    {
        $url = 'https://waapi.pepipost.com/api/v2/consent/manage/';
        $reqHeaders = [
            'accept' => 'application/json',
            'authorization' => 'Bearer ' . WHATSAPP_AUTH_TOKEN,
            'cache-control' => 'no-cache',
            'content-type' => 'application/json',
        ];
        $post = [
            'type' => 'optin',
            'recipients' => [
                [
                    'recipient' => $mobile_number,
                    'source' => 'WEB',
                ],
            ],
        ];
        $this->apiMiddleware->_APIRequest($url, $post, $reqHeaders);
        return $this->apiMiddleware->post('json');
    }

    /**
     * Saves contact opportunity data to the CRM.
     *
     * @param string $screen_name The screen name associated with the CRM opportunity.
     * @param int    $oppStage    The opportunity stage.
     * @param int    $oppType     The opportunity type.
     *
     * @throws Exception
     */
    public final function saveContactOpportunityDataToCrm(string $screen_name, int $oppStage = 1, int $oppType = 17): void
    {
        $user_phone = $this->session->userdata('full_mobile_no');
        $pageurl = $this->session->userdata('pageurl');
        $utm_source = $this->session->userdata('utm_source');
        $utm_medium = $this->session->userdata('utm_medium');
        $utm_term = $this->session->userdata('utm_term');
        $utm_content = $this->session->userdata('utm_content');
        $utm_campaign = $this->session->userdata('utm_campaign');

        $api_url = 'https://yashoda.unfyd.com/unfydcrm-yashoda/api/OpportunitiesHandler?Action=SaveContactOpportunityData';

        $data['patientDetails'] = [
            "firstName" => "",
            "lastName" => "",
            "mobile" => "+" . $user_phone . "",
            "email" => "",
            "whatsAppSameAsMobile" => ""
        ];

        $data['referredDetails'] = [
            "firstName" => "",
            "lastName" => "",
            "mobile" => "",
            "email" => ""
        ];

        $data['OppoDetails'] = [
            "oppoName" => "Appointments",
            "description" => "",
            "rating" => "",
            "leadChannel" => "6",
            "languagePromoted" => "",
            "doctor" => "",
            "reminderDate" => "",
            "customerFlag" => "",
            "hospitalLocation" => "",
            "yhNumber" => "",
            "ipNumber" => "",
            "nextSteps" => "",
            "conversionType" => "",
            "oppoType" => $oppType,
            "campaignMedium" => $utm_medium,
            "campaignName" => $utm_campaign,
            "campaignTerm" => $utm_term,
            "websiteURL" => $pageurl,
            "campaignContent" => $utm_content,
            "campaignSource" => $utm_source,
            "referenceNumber" => "",
            "appointmentDateTime" => "",
            "speciality" => "",
            "procedure" => "",
            "doctorName" => "",
            "doctorLocation" => "",
            "doctorDepartment" => "",
            "oppoStage" => $oppStage,
            "leadSource" => "2",
            "dependent" => "",
            "screenName" => $screen_name
        ];


        $responceData = $this->apiMiddleware->_APIRequest($api_url, $data);


        if ($oppStage == 7 && $oppType == 8) {
            $apptSlotDate = date_create($_SESSION['appt_slot_date']);
            $AptDate = date_format($apptSlotDate, "d/M/Y");
            $slot_time = date("H:i", strtotime($_SESSION['appt_slot_time']));
            $aptDateTime = $AptDate . ' ' . $slot_time;
            $opportunityID = $responceData['OpportunityID'];

            $update_api_url = 'https://yashoda.unfyd.com/unfydcrm-yashoda/api/OpportunitiesHandler?Action=UpdateOppoStage';

            $update_data = [
                "opportunityID" => $opportunityID,
                "oppoStageID" => $oppStage,
                "oppoTypeID" => $oppType,
                "doctorName" => $this->session->userdata('pg_doc_name'),
                "doctorLocation" => getLocationByBranchId($this->session->userdata('location_to_final_api')),
                "doctorDepartment" => $this->session->userdata('pg_doc_speciality'),
                "referenceNumber" => $this->session->userdata('appt_ref_no'),
                "appointmentDateTime" => $aptDateTime
            ];

            $responceData = $this->apiMiddleware->_APIRequest($update_api_url, $update_data);
        }
    }
}
