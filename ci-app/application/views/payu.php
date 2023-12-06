<?php
// Set your PayU Money credentials sandbox variable
$merchant_key = 'n9OZsE';
$merchant_salt = '5a31azQHhSinqqBt67kIkBqleuyv2AlC';
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
?>
<form method="post" action="https://test.payu.in/_payment">
    <input type="hidden" name="key" value="<?php echo $merchant_key; ?>" />
    <input type="hidden" name="txnid" value="<?php echo  $txnid; ?>" />
    <input type="hidden" name="amount" value="<?php echo $amount; ?>" />
    <input type="hidden" name="productinfo" value="<?= $prodInfo ?>" />
    <input type="hidden" name="amount" value="<?= $amount?>" />

    <input type="hidden" name="firstname" value="<?= $firstname ?>" />
    <input type="hidden" name="lastname" value="<?= $lastName ?>" />
    <input type="hidden" name="email" value="<?= $email ?>" />
    <input type="hidden" name="phone" value="<?= $phone ?>" />
    <input type="hidden" name="hash" value="<?= $hash ?>" />
    <input type="hidden" name="surl" value="<?= $surl ?>" />
    <input type="hidden" name="furl" value="<?= $furl ?>" />
    <input type="submit" value="Pay Now" />
</form>
