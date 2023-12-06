<?php

class PayU extends \BaseController
{
    public const MERCHANT_KEY = PAYU[PAYU_ENV]['MERCHANT_KEY'];
    public const MERCHANT_SALT = PAYU[PAYU_ENV]['MERCHANT_SALT'];
    public const MERCHENT_ID = PAYU[PAYU_ENV]['MERCHENT_ID'];
    public const URL = PAYU[PAYU_ENV]['URL'];
    public function __construct()
    {
        parent::__construct();
    }
    public function index() {
        $this->load->view('payu');
    }

    public function success() {
        echo "Payment Successfull";
    }
    public function failure() {
        echo "Payment failed";
    }

    /**
     * @throws Exception
     */
    public function payInitiate() {
        $apiCommand = 'generate_integrated_static_qr';

        $trxID = 'abc_123';
        $var1Data = [
            'transactionId' => $trxID,
            'transactionAmount' => 100,
            'pgMerchantId' => PayU::MERCHENT_ID,
//            'pg' => 'UPI' ,
//            'me_code' => $trxID ,
            "instaProduct"=>"qr",
            "qrType"=>"upi",
            'customerId' => '1202020',
            "merchantVpa"=>"testqr.6879.prod4@indus",
            'expiryTime' => '3600',
            'qrName' => 'payu',
            'qrCity' => 'Gurgaon',
            'qrPinCode' => '122001',
            'customerName' => 'Ravi',
            'customerCity' => 'Ranchi',
            'customerPinCode' => '834001',
            'customerPhoe' => '7800078000',
            'customerEmail' => 'hello@payu.in',
            'customerAddress' => 'Ggn',
            'udf3' => 'deliveryboy1',
            'udf4' => 'sector14',
            'udf5' => 'cod',
            'outputType' => 'string',
            "submerchantRegistration" =>"1","mebussname"=>"Sltest1",
            "awlmcc"=>"7999","legalStrName"=>"Testaly","panNo"=>"BPEPK5437G","strCntMobile"=>"9833270176"
        ];

        $var1Data = '{"vendorKey":"test","qrName":"ronaldo","qrCity":"madrid","qrPinCode":"28001"}';
        $postData = [
            'key' => PayU::MERCHANT_KEY,
            'command' => $apiCommand,
            'hash' => sha512([PayU::MERCHANT_KEY, $apiCommand, ($var1Data), PayU::MERCHANT_SALT]),
            'var1' => ($var1Data)
        ];
        $apiData = $this->apiMiddleware->_APIRequest(PayU::URL, $postData);
        da($apiData);
//        $this->apiMiddleware->successResponseBuilder($apiData, 'Payment Initiated Successfully');
    }

    public function upi() {
        $this->data['MERCHANT_KEY'] = $merchant_key = PayU::MERCHANT_KEY;
        $this->data['MERCHANT_SALT'] = $merchant_salt = PayU::MERCHANT_SALT;
        $txnid = uniqid();

        $amount = 100; // Set the amount dynamically

        $prodInfo = "Product Information";
        $firstname = "John";
        $lastName = "smith";
        $email = "john@example";
        $phone = "9876543210";
        $surl = base_url('PayU/success');
        $furl = base_url('PayU/failure');

        $hash =  hash ("sha512",$merchant_key."|".$txnid."|".$amount."|".$prodInfo."|".$firstname."|".$email."|||||||||||".$merchant_salt);

        $VPA = 'test123@payu';
//        $hashR = [
//            $merchant_key,
//            "validateVPA",
//            $VPA,
//            $merchant_salt
//        ];
//        $hash2 = sha512($hashR);


        $url = "https://secure.payu.in/_payment";
        $postData = [
            "key" => $merchant_key,
            "txnid" => $txnid,
            "amount" => $amount,
            "productinfo" => $prodInfo,
            "firstname" => $firstname,
            "lastname" => $lastName,
            "email" => $email,
            "pg" => "UPI",
            "bankcode" => "UPI",
            "vpa" => $VPA,
            "surl" => $surl,
            "furl" => $furl,
            "phone" => $phone,
            "hash" => $hash,
        ];
        $apiData = $this->apiMiddleware->_APIRequest($url, $postData);

        da($apiData);

        $this->load->view('upi', $this->data);
    }


}
