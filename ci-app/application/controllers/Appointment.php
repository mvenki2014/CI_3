<?php

/**
 * Appointment Class
 *
 * @subpackage    Controllers
 * @property \CI_Input input
 * @property \Appointment_model $appointment_model
 * @property \CI_Session session
 * @property \Email_model $email_model
 * @author  Developer
 */
class Appointment extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Appointment_model', 'appointment_model');
    }

    /**
     * @throws Exception
     */
    public final function sendOTP(): void
    {
        $captcha = $this->input->post('token');
        /* todo check captcha
        if (!$captcha) {
            self::_showError('Please check the the captcha form.');
        }

        // Verify reCAPTCHA
        $recaptchaVerification = $this->verifyRecaptcha($captcha);

        if (!$recaptchaVerification['success'] || $recaptchaVerification['score'] < 0.1) {
            echo json_encode(['success' => 'false']);
            return;
        }
        */

        // Handle mobile number and session data
        $this->handleMobileNumber();

        // Generate OTP and send
        $otpSent = $this->generateAndSendOtp();

        if ($otpSent['status']) {
            echo json_encode(array("message" => "true", "otp" => "otp send", "country_code" => $this->session->userdata('hashed_number')));
        } else {
            echo json_encode(array("message" => "false", "error" => "Failed to send OTP. Please contact the administrator."));
        }
    }

    private function verifyRecaptcha(string $captcha): array
    {
        $secretKey = v3_G_RECAP_SECRET_KEY; // Replace with your actual secret key
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $data = array('secret' => $secretKey, 'response' => $captcha);

        $options = array(
            'http' => array(
                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'content' => http_build_query($data)
            )
        );

        $context = stream_context_create($options);
        $response = file_get_contents($url, false, $context);

        return json_decode($response, true);
    }

    private function handleMobileNumber(): void
    {
        $mobile_no = $this->input->post('mobile');
        $country_code = $this->input->post('country_code');

        if ($mobile_no) {
            $sessionMobileData = [
                'full_mobile_no' => $country_code . $mobile_no,
                'session_mobile_no' => $mobile_no,
                'country_code' => $country_code,
                'hashed_number' => $country_code . str_repeat('X', strlen($mobile_no) - 1) . substr($mobile_no, -1),
            ];

            $this->session->set_userdata($sessionMobileData);
        }
    }

    /**
     * @throws Exception
     */
    private function generateAndSendOtp()
    {
        $otp_id = generate_random_id(6);
        $this->session->set_userdata('otp_id', $otp_id);

        $this->session->set_userdata('pageflow_id', generate_random_id(7));

        // Insert data into the database
        $this->appointment_model->insertAppointmentDetails('1', 'Request otp');

        // Send OTP todo checkpoint
//        $otpSent = $this->sendOtpAPI($this->session->userdata('full_mobile_no'), $otp_id);

        $otpSent['status'] = 1;
        if ($otpSent['status']) {
            // Insert OTP entry into the database
            $this->appointment_model->insertOtpEntry($otp_id);
            return $otpSent;
        }

        return false;
    }

    /**
     * @throws Exception
     */
    private function sendOtpAPI($mobile, $otp_id)
    {
        $postData = [
            'authkey' => MSG91_AUTH_KEY,
            'template_id' => MSG91_OTP_TEMPLATE_ID,
            'mobile' => $mobile,
            'otp_length' => 5,
            'otp_expiry' => 1,
        ];
        $sendOTPData = $this->apiMiddleware->_SMSRequest('/api/v5/otp', $postData);
        return $this->apiMiddleware->_responseBuilder($sendOTPData, 'Success SMS Data', 1, 0, true);
    }

    /**
     * @throws Exception
     */
    public final function addPatientAction()
    {
        // Add new patient
        if ($this->input->post('status') == 'add_new_patient') {
            $screenCode = "3b";
            $screenMessage = "Add new patient continue";

            $pageflowId = $this->session->userdata('pageflow_id');

            if (empty($pageflowId)) {
                $pageflowId = generate_random_id(7);
                $this->session->set_userdata('pageflow_id', $pageflowId);
                $this->appointment_model->insertAppointmentDetails($screenCode, $screenMessage);
            } elseif ($this->appointment_model->getResult($this->session->userdata('full_mobile_no'), $pageflowId, true) > 0) {
                $this->appointment_model->updateAppointmentDetails($screenCode, $screenMessage);
            }

            $newPatientDataRaw = $this->input->post('new_patient_data');
            $newPatientData = [];

            $keyTransformations = [
                'fname' => 'first_name',
                'mname' => 'middle_name',
                'lname' => 'last_name',
            ];

            $postDataKeys = [
                "GENDER" => "gender",
                "AgeType" => "age_type",
                "TITLE" => "title",
                "FNAME" => "first_name",
                "LNAME" => "last_name",
                "MNAME" => "middle_name",
                "DOB" => "dob",
                "AGE" => "age",
                "COUNTRY" => "country",
                "STATE" => "state",
                "DISTRICT" => "district",
                "MANDAL" => "mandal",
                "CITYNAME" => "city",
                "MOBILENO" => "mobile_no",
            ];

            foreach ($newPatientDataRaw as $newPatientDatum) {
                $key = strtoupper($newPatientDatum['name']);

                if (isset($postDataKeys[$key])) {
                    $postDataKeys[$key] = $newPatientDatum['value'];
                }

                // Additional transformations
                switch ($key) {
                    case 'CITY':
                        $postDataKeys['CITYNAME'] = $newPatientDatum['value'];
                        break;
                    case 'MANDAL':
                        $postDataKeys['DISTRICT'] = $newPatientDatum['value'];
                        break;
                }

                $newPatientData[$keyTransformations[$newPatientDatum['name']] ?? $newPatientDatum['name']] = $newPatientDatum['value'];
            }

            foreach ($postDataKeys as $key => $value) {
                $this->session->set_userdata('pat_' . strtolower($key), $value ?? '');
            }

            $fullName = $this->session->userdata('pat_title') . ". "
                . $this->session->userdata('pat_first_name') . " "
                . $this->session->userdata('pat_middle_name') . " "
                . $this->session->userdata('pat_last_name');

            $this->session->set_userdata('pat_full_name', preg_replace('/\s+/', ' ', $fullName));

            $postDataKeys['MOBILENO'] = $this->session->userdata('session_mobile_no');
            if (!empty($this->session->userdata('session_mobile_no'))) {
                $this->session->set_userdata('user_selected_patient', 1);
            }

            $this->session->set_userdata('otp_verified', 0);

            $regDataResponse = $this->apiMiddleware->_APIRequest(API_HOST_URL.'/RegSave', $postDataKeys);

            $response = [
                "add_new_patient" => "true",
                "message" => "New Patient Added",
                "new_patient_data" => $newPatientData,
                "pat_full_name" => $this->session->userdata('pat_full_name'),
                "location" => $this->session->userdata('location'),
                "doc_id" => $this->session->userdata('doc_id'),
                "appt_date" => $this->session->userdata('appt_date'),
                "regDataResponse" => $regDataResponse
            ];

            da($response);
        }
    }

    public final function selectPatientAction()
    {
        da($_POST);
    }

    public final function getDoctorsList() {
        echo json_encode($_POST);
        $this->data['doctorInfo']  = [
            ['Dr. Pramod Kumar K', 'MD (Cardiology), DM, FACC, FESC, MBA (Hospital Management)', 'Consultant Interventional Cardiologist', '20 Yrs', 'Secunderabad'],
            // Add more doctor information as needed
        ];
        $this->load->view("doctors_list");
    }

}
