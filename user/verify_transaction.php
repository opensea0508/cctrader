<?php

require 'clean.php'; 


$email = $_SESSION['email'];
$customerId = $_SESSION['userid'];

$rate = runQuery("SELECT * FROM drate WHERE id=1")->fetch_assoc();

$transid = bin2hex(random_bytes(11));

$refrence = $_GET['reference'];
$amount = $_GET['amount'];
// die;
    //check if payment was successfull
    $result = array();
    //The parameter after verify/ is the transaction reference to be verified
    $payrefrence=$_SESSION['transid'];
    $url = 'https://api.paystack.co/transaction/verify/'.$refrence;
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt(
        $ch, CURLOPT_HTTPHEADER, [
        'Authorization: Bearer sk_live_1978fce1fa1326569e44de4684f5877a57105c80']
    );
    $request = curl_exec($ch);
    curl_close($ch);
    
    if ($request) {
        $result = json_decode($request, true);
    }

    $cat = $_SESSION['category'];

    $date = gmdate("Y-m-d H:i:s", strtotime("+1 hour"));
 
    if (array_key_exists('data', $result) && array_key_exists('status', $result['data']) && ($result['data']['status'] === 'success')) {
        //update database and set user payment
        //get wallet balance and add to it
        $row = runQuery("SELECT dwallet FROM dregister WHERE userid='$customerId' AND demail='$email' ")->fetch_assoc();
        $final = (Float)$amount/(Float)$rate['drate'];
        $wall = (Float)$row['dwallet'] + $final;
        runQuery("UPDATE dregister SET  dwallet='$wall' WHERE userid='$customerId' AND demail='$email' ");
        runQuery("INSERT INTO ddeposit SET did='$transid', userid='$customerId', demail='$email',damount='$amount', ddate='$date', dcategory='$cat' ");
        $ref = userInfo($customerId,"$email", "dreferral");
        if(!empty($ref)){
            //get user wallet
            $wall = runQuery("SELECT dwallet FROM dregister WHERE drefCode='$ref'")->fetch_assoc();
            //get the amount with 10% deposit
            $per = $final * 0.1;
            $rfinal = (Float)$wall['dwallet'] + $per;
            runQuery("UPDATE dregister SET  dwallet='$rfinal' WHERE drefCode='$ref'");

        }

        runQuery("INSERT INTO dhistory SET userid='$customerId', tid='$transid', dname='Wallet topup', damount='$amount', dcredit='$amount', dwallet_balance='$wall', ddate='$date', dtype='deposit', demail='$email'");
  
    }
    else{

        $_SESSION['msg']="Your payment was not successful!";
    }


 
?> 