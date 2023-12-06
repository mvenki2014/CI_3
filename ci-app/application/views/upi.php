<?php
// Set your PayU Money credentials sandbox variable
$merchant_key = $MERCHANT_KEY;
$merchant_salt = $MERCHANT_SALT;
$amount = 100; // Set the amount dynamically

// Create a payment form

$txnid = uniqid();

$prodInfo = "Product Information";
$firstname = "John";
$lastName = "smith";
$email = "john@example";
$phone = "9876543210";
$surl = base_url('PayU/success');
$furl = base_url('PayU/failure');

$hash =  hash ("sha512",$merchant_key."|".$txnid."|".$amount."|".$prodInfo."|".$firstname."|".$email."|||||||||||".$merchant_salt);

$VPA = 'test123@payu';
$hashR = [
    $merchant_key,
    "validateVPA",
    $VPA,
    $merchant_salt
];
$hash2 =  sha512($hashR);
?>

<form action='https://secure.payu.in/_payment' method='post'>
    <input type="hidden" name="key" value="<?php echo $merchant_key; ?>" />
    <input type="hidden" name="txnid" value="<?php echo  $txnid; ?>" />
    <input type="hidden" name="amount" value="<?php echo $amount; ?>" />
    <input type="hidden" name="productinfo" value="<?= $prodInfo ?>" />

    <input type="hidden" name="firstname" value="<?= $firstname ?>" />
    <input type="hidden" name="lastname" value="<?= $lastName ?>" />
    <input type="hidden" name="email" value="<?= $email ?>" />
    <input type="hidden" name="pg" value="UPI" />
    <input type="hidden" name="bankcode" value="UPI" />
    <input type="hidden" name="vpa" value="<?= $VPA ?>" />
    <input type="hidden" name="surl" value="<?= $surl ?>" />
    <input type="hidden" name="furl" value="<?= $furl ?>" />
    <input type="hidden" name="phone" value="<?= $phone ?>" />
    <input type="hidden" name="hash" value="<?= $hash ?>" />
    <input type="submit" value="submit">
</form>
