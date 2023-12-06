<?php

$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://secure.payu.in/QrPayment',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => 'key=&txnid=txn1234&amount=100&qrId=qr123&productinfo=Integrated%20Static%20QR&expirytime=3600&UDF3=Gurgaon&UDF4=120001&UDF5=India&firstname=Payu&lastname=user&email=test%40payu.in&phone=1234567890&hash=5606747fec73bd7a271748f13c06626d6520b5ba1af9db7338b9a1d2d9d6da77c9291304f7a78fe4bf02319702f56131c868306a5280daf18038a1d8bdbdef21',
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
?>
