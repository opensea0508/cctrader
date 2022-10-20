<?php 

require 'clean.php';


if($_SERVER['REQUEST_METHOD']=="POST"){
    if(isset($_POST['save'])){
        $fname = clean($_POST['fname']);
        $lname = clean($_POST['lname']);
        $city = clean($_POST['city']);
        $state = clean($_POST['state']);
        $country = clean($_POST['country']);
        $address = clean($_POST['address']);
        $nin = clean($_POST['nin']);
        $bvn = clean($_POST['bvn']);
        $email = clean($_SESSION['email']);
        $userid = clean($_SESSION['code']);

       $sql = runQuery("UPDATE dcustomers SET dfname='$fname', dlname='$lname', dcity='$city', dstate='$state', dcountry='$country', daddress='$address', dNIN='$nin', dBVN='$bvn' WHERE demail='$email' AND customer_code='$userid' ");
        if($sql){
            $_SESSION['msg']='<div class="alert alert-success" role="alert">
            <strong>Success!</strong> <br>
            Updated successful!
        </div>';
        }else{
            $_SESSION['msg']='<div class="alert alert-danger" role="alert">
                        <strong>Fail!</strong> <br>
                        Oops! something went wrong, try again later!
                    </div>';
        }
    }
}

header("location:profile");