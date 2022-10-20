<?php

require 'clean.php';
$email = clean($_SESSION['email']);
$userid = clean($_SESSION['userid']);

if($_SERVER['REQUEST_METHOD']=="POST"){

if(isset($_POST['change'])){
    $old = md5(clean($_POST['old']));
    $pass = md5(clean($_POST['pass']));
    $cpass = md5(clean($_POST['cpass']));

    if($pass == $cpass){
        changePassword($old, $pass, $email, $userid, 'dregister');
    }else{ 
        $_SESSION['msg']='<div class="alert alert-danger" role="alert">
                        <strong>Fail!</strong> <br>
                        Password doesn\'t match, try again later!
                    </div>';
    }
 
    header('location:change-password');
}
}
