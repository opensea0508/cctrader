<?php

require './user/clean.php'; 
 

$transid = bin2hex(random_bytes(11));

$refrence = $_GET['reference'];
$amount = $_GET['amount'];
$id = $_GET['cid'];
$email = $_GET['email'];
$name = $_GET['name'];
// die;
    //check if payment was successfull
    $result = array();
    //The parameter after verify/ is the transaction reference to be verified 
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

    $date = gmdate("Y-m-d H:i:s", strtotime("+1 hour"));
    $row = runQuery("SELECT * FROM dcourse WHERE cid='$id' ")->fetch_assoc();
    $course = $row['dtitle'];
    
    runQuery("INSERT INTO dapplication SET drefId='$transid', dfname='$name', demail='$email', dcourse='$course', courseId='$id', ddate='$date'");
 
    if (array_key_exists('data', $result) && array_key_exists('status', $result['data']) && ($result['data']['status'] === 'success')) {         
        runQuery("UPDATE dapplication SET  dstatus='paid' WHERE drefId='$transid' "); 
         
                $test = './mail.php'; 
                include 'mailApi.php';
                $_SESSION['msg']=' 
                    <div class="uk-alert-success" uk-alert>
                        <a class="uk-alert-close" uk-close></a>
                        <strong>Success!</strong> 
                        <p>Your payment was successful, thanks for choosing us.</p>
                    </div>
                    ';
    }
    else{
        $_SESSION['msg']=' 
        <div class="uk-alert-danger" uk-alert>
            <a class="uk-alert-close" uk-close></a>
            <strong>Fail!</strong> 
            <p>Your payment was not successful, contact the admin if your account was debited to process your registration.</p>
        </div>
        ';
    }


 
?> 