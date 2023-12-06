<?php

class Appointment_model extends CI_Model {
    public final function insertAppointmentDetails($screenCode, $screenMessage): int
    {
        $data = [
            'country_code' => $this->session->userdata('country_code'),
            'phone' => $this->session->userdata('full_mobile_no'),
            'pageflow_id' => $this->session->userdata('pageflow_id'),
            'screen_code' => $screenCode,
            'screen_message' => $screenMessage,
            'created_at' => date("Y-m-d H:i:s"),
        ];

        $this->db->insert('new_appointment_details', $data);
        return $this->db->insert_id();
    }

    public final function insertOtpEntry(int $otp_id): int
    {
        $data = [
            'countrycode' => $this->session->userdata('country_code'),
            'phone' => $this->session->userdata('full_mobile_no'),
            'otp_id' => $otp_id,
            'otp_sent' => 1,
            'created_at' => date("Y-m-d H:i:s"),
        ];

        $this->db->insert('otp_entries', $data);
        return $this->db->insert_id();
    }

    public function updateAppointmentDetails($screenCode, $screenMessage): void
    {
        $data = [
            'screen_code' => $screenCode,
            'screen_message' => $screenMessage,
            'updated_at' => date("Y-m-d H:i:s")
        ];

        $this->db->where('phone', $this->session->userdata('full_mobile_no'));
        $this->db->where('pageflow_id', $this->session->userdata('pageflow_id'));
        $this->db->update('new_appointment_details', $data);
    }


    public function updateScreenCode($screenCode, $screenMessage): void
    {
        $queryCount = $this->getResult($this->session->userdata('full_mobile_no'), $this->session->userdata('pageflow_id'), true);

        if ($queryCount > 0) {
            self::updateAppointmentDetails($screenCode, $screenMessage);
        }
    }

    public function updateOtpEntries(): void
    {
        $data = [
            'otp_verified' => 1,
            'updated_at' => date("Y-m-d H:i:s")
        ];

        $this->db->where('phone',  $this->session->userdata('full_mobile_no'));
        $this->db->update('otp_entries', $data);
    }

    public function insertPatApiLog($countryCode, $phone, $apiRequest, $patlistCode): int
    {
        $data = [
            'countrycode' => $countryCode,
            'phone' => $phone,
            'api_request' => $apiRequest,
            'patlist_code' => $patlistCode,
            'created_at' => date("Y-m-d H:i:s")
        ];

        $this->db->insert('patlistapi_logs', $data);
        return $this->db->insert_id();
    }

    public function updatePatApiLog($status, $apiResponse, $sessionMobileNo, $patlistCode)
    {
        $data = array(
            'status' => $status,
            'api_response' => $apiResponse,
            'updated_at' => date("Y-m-d H:i:s")
        );

        $this->db->where('phone', $sessionMobileNo);
        $this->db->where('patlist_code', $patlistCode);
        $this->db->update('patlistapi_logs', $data);
    }

    public function getResult($sessionMobileNo, $pageflowId, $isCount = false)
    {
        $this->db->where('phone', $sessionMobileNo);
        $this->db->where('pageflow_id', $pageflowId);
        $query = $this->db->get('new_appointment_details');
        if ($isCount) {
            return $query->num_rows();
        }

        return $query->result();
    }

	public function insertVisitorDetails($data)
	{
		$this->db->insert('visitors', $data);
		return $this->db->insert_id();
	}
}
