<?php

namespace App\Controllers;

use App\Libraries\APIMiddleWare;

class Test extends \CI_Controller
{
    /**
     * The base URL for the API.
     */
    private const END_POINT_URL = API_HOST_URL;

    public array $data;
    private APIMiddleWare $apiMiddleware;

    /**
     * RestApi constructor.
     *
     * Initializes the API handler instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this->data = [];
        self::setAPIMiddleWare();
    }

    /**
     * Retrieves a list of doctors from the API and returns a success response.
     * @throws Exception
     */
    public final function getDoctors(): void
    {
        $postData = [
            "loc" => 3,
            "depart" => 30
        ];

        $doctorsData = $this->apiMiddleware->_APIRequest(API_GET_DOCTORS, $postData);
        $this->apiMiddleware->successResponseBuilder($doctorsData, 'Success doctors Data');
    }

    /**
     * Processes an application disapproval request and returns a success response.
     * @throws Exception
     */
    public final function apiAppDiscrove(): void
    {
        $postData = [
            "discresponse" => ''
        ];

        $appDisapproveResponse = $this->apiMiddleware->_APIRequest(self::END_POINT_URL . API_APP_DISCROVE, $postData);
        $this->apiMiddleware->successResponseBuilder($appDisapproveResponse);
    }

    /**
     * Performs a test API request and returns a success response.
     * @throws Exception
     */
    public final function apiTest(): void
    {
        $response = $this->apiMiddleware->_APIRequest(self::END_POINT_URL . API_TEST);
        $this->apiMiddleware->successResponseBuilder($response);
    }

    public final function sendSMS(): void
    {
//        $postData = [
//            "sender" => "YASHODA",
//            "route" => "4",
//            "country" => "91",
//            "sms" => [
//                [
//                    "message" => "This is a test message",
//                    "to" => [
//                        "919014551553"
//                    ]
//                ]
//            ]
//        ];

//        $response = $client->request('POST', 'https://control.msg91.com/api/v5/otp?template_id=6555862bd6fc0549dc1b6623&mobile=919999999999', [
//            'body' => '{"Param1":"value1","Param2":"value2","Param3":"value3"}',
//
//        ]);

//        $postData = [
//            "template_id" => "6555862bd6fc0549dc1b6623",
//            "short_url" => "0",
//            "recipients" => [
//                "mobiles" => "919642223438",
//                "OTP_Val" => "9999"
//            ]
//        ];

        $postData = [
            "OTP" => 9999
        ];
        $doctorsData = $this->apiMiddleware->_SMSRequest('/api/v5/otp?template_id=6555862bd6fc0549dc1b6623&mobile=919642223438', $postData);
        $this->apiMiddleware->successResponseBuilder($doctorsData, 'Success SMS Data');
    }
}
