<?php
session_start();
require 'user/clean.php';
$code = bin2hex(random_bytes(7)) . date("Ymdhis");
$date = gmdate("Y-m-d H:i:s", strtotime("+1hour"));

if ($_SERVER['REQUEST_METHOD'] == "POST") {

  //register user

  if (isset($_POST['saveReg'])) {

    $name = clean($_POST['name']);
    $phone = clean($_POST['phone']);
    $email = clean($_POST['email']);
    $pass = clean($_POST['pass']);
    $cpass = clean($_POST['cpass']);
    $ref = clean($_POST['ref']);
    // $ref = !empty($_SESSION['ref'])?$_SESSION['ref']:"";

    // https://ccitraders.com/controller?key=84aadbd655badf1a4d33ceb5&hash=4adf7d6eebb0266197b2d52a6273865b&verify=yes

    if ($pass == $cpass) {
      $pass = md5($pass);
      //insert record here
      //check if email exist
      $sql = runQuery("SELECT * FROM dregister WHERE demail='$email'");
      if (numRows($sql) == 0) {

        $sql = runQuery("INSERT INTO dregister SET dfname='$name', userid='$code', demail='$email', dpass='$pass', dphone='$phone', dreferral='$ref', ddate='$date' ");

        if ($sql) {
          $link = "https://ccitraders.com/controller?key=$code&hash=$pass&verify=yes";
          // header("Location: dashboard");
          // $_SESSION['web']=true;
          // $_SESSION['code']=$code;
          // $_SESSION['email']=$email; https://www.ccitraders.com/private/signup
          $test = 'user/registerMail.php';
          include 'user/registerMailApi.php';
          $_SESSION['msg'] = ' 
                    <div class="uk-alert-success" uk-alert>
                        <a class="uk-alert-close" uk-close></a>
                        <strong>Success!</strong> 
                        <p>Your registration was successful, kindly login to your email and verify your account.</p>
                    </div>
                    ';
          header("Location: register");
        } else {
          //error message here...
          $_SESSION['msg'] = '
                    <div class="uk-alert-danger" uk-alert>
                        <a class="uk-alert-close" uk-close></a>
                        <strong>Fail!</strong> 
                        <p>Something went wrong, try again later!</p>
                    </div>
                    ';
          header("Location: register");
        }
      } else {
        //error message here...
        $_SESSION['msg'] = ' 
            <div class="uk-alert-danger" uk-alert>
                <a class="uk-alert-close" uk-close></a>
                <strong>Fail!</strong> 
                <p>Email already taken, try again later with another email!</p>
            </div>';
        header("Location: register");
      }
    } else {
      $_SESSION['msg'] = ' 
            <div class="uk-alert-danger" uk-alert>
                <a class="uk-alert-close" uk-close></a>
                <strong>Fail!</strong> 
                <p>Password doesn\'t match!</p>
            </div>';
      header("Location: register");
    }
  }


  //Login User
  if (isset($_POST['saveLog'])) {
    $email = clean($_POST['email']);
    $pass = md5(clean($_POST['pass']));
    loginUser($email, $pass, "dregister");
  }

  //Forgot password
  if (isset($_POST['saveFor'])) {
    $email = clean($_POST['email']);
    $sql = runQuery("SELECT dpass, userid, dfname  FROM dregister WHERE demail='$email'");
    if (numRows($sql) > 0) {
      $row = fetchAssoc($sql);
      $userid = $row['userid'];
      $name = $row['dfname'];
      $pass = $row['dpass'];
      $link = "https://ccitraders.com/reset?key=$userid&hash=$pass";
      $test = 'user/forgetMail.php';
      include 'user/forgetMailApi.php';
      $_SESSION['msg'] = ' 
                <div class="uk-alert-success" uk-alert>
                    <a class="uk-alert-close" uk-close></a>
                    <strong>Success!</strong> 
                    <p>Reset link has been sent to ' . $email . ', kindly login to your account to reset your password.</p>
                </div>
                ';
    } else {
      $_SESSION['msg'] = ' 
            <div class="uk-alert-danger" uk-alert>
                <a class="uk-alert-close" uk-close></a>
                <strong>Fail!</strong> 
                <p> Something went wrong, try again later!</p>
            </div>';
    }

    header('Location:forgot');
  }


  //Reset Password
  if (isset($_POST['saveRes'])) {
    $pass = clean($_POST['pass']);
    $cpass = clean($_POST['cpass']);
    $userid = clean($_POST['userid']);
    $hash = clean($_POST['hash']);
    if ($pass == $cpass) {
      $pass = md5($pass);
      $sql = runQuery("UPDATE dregister SET dpass='$pass' WHERE userid='$userid' AND dpass='$hash'");
      if ($sql) {
        $_SESSION['msg'] = ' 
                <div class="uk-alert-success" uk-alert>
                    <a class="uk-alert-close" uk-close></a>
                    <strong>Success!</strong> 
                    <p>Password reset was successful, kindly login to your account </p>
                </div>
                ';
        header("Location:login");
      } else {
        $_SESSION['msg'] = ' 
            <div class="uk-alert-danger" uk-alert>
                <a class="uk-alert-close" uk-close></a>
                <strong>Fail!</strong> 
                <p> Something went wrong we can\'t reset your password.</p>
            </div>';
        header("Location:reset?key=$userid&hash=$hash");
      }
    } else {
      $_SESSION['msg'] = ' 
            <div class="uk-alert-danger" uk-alert>
                <a class="uk-alert-close" uk-close></a>
                <strong>Fail!</strong> 
                <p>Password does\'n match, try again!</p>
            </div>';
      header("Location:reset?key=$userid&hash=$hash");
    }
  }
} else {

  //Verify user account

  if (isset($_GET['verify']) and !empty($_GET['key']) and !empty($_GET['hash'])) {
    $userid = clean($_GET['key']);
    $hash = clean($_GET['hash']);

    $sql = runQuery("UPDATE dregister SET dstatus='active' WHERE userid='$userid' AND dpass='$hash' AND dstatus='pending'");
    if ($sql) {

      $_SESSION['msg'] = ' 
                <div class="uk-alert-success" uk-alert>
                    <a class="uk-alert-close" uk-close></a>
                    <strong>Success!</strong> 
                    <p>Your account has been verified!</p>
                </div>
                ';
    } else {
      $_SESSION['msg'] = ' 
            <div class="uk-alert-danger" uk-alert>
                <a class="uk-alert-close" uk-close></a>
                <strong>Fail!</strong> 
                <p>Something went wrong we can\'t verify your account, try again later!.</p>
            </div>';
    }


    header("Location:login");
  }
}
