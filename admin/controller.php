<?php

require '../user/clean.php';
$ref = bin2hex(random_bytes(8)) . date("Ymdhis");
$date = gmdate("Y-m-d H:i:s", strtotime("+1 hour"));


$folder = 'files';

require '../image_php/class.upload.php';
$transid = date("Ymdhis");
$filePath = "../image_php/image_icon.php";


if ($_SERVER['REQUEST_METHOD'] == "POST") {


  if (isset($_POST['saveCourse'])) {
    $title  = clean($_POST['title']);
    $desc  = clean($_POST['desc']);
    $amount  =  clean($_POST['amount']);
    $id  =  clean($_POST['cid']);

    if (isset($_POST['link'])) {
      $link = $_POST['link'];
      $sql = runQuery("UPDATE dcourse SET dtitle='$title', damount='$amount', ddesc='$desc' WHERE cid ='$id' ");
      if ($sql) {
        if (!empty($_FILES['img']['name'])) {
          universalImageUpload($_FILES['img'], $transid, 'dcourse', "cid='$id'");
          @unlink($_POST['himg']);
        }

        $_SESSION['msgs'] = "Updated successfully";
      }
    } else {
      $sql = runQuery("INSERT INTO dcourse SET cid ='$ref', dtitle='$title', damount='$amount', ddesc='$desc', ddate='$date'");
      if ($sql) {
        if (!empty($_FILES['img']['name'])) {
          universalImageUpload($_FILES['img'], $transid, 'dcourse', "cid='$ref'");
          //    @unlink($_POST['himg']);
        }

        $_SESSION['msgs'] = "created successfully";
      }
    }


    isset($_POST['link']) ? header("Location:$link") : header("Location:courses");
  }


  if (isset($_POST['saveTop'])) {
    $id  = clean($_POST['id']);
    $email  = clean($_POST['email']);
    $amount  = (int)clean($_POST['amount']);
    $wallet  = (int)clean($_POST['wallet']);
    $type  = clean($_POST['type']);

    if ($type == 'add') {
      $bal = $wallet + $amount;
      $note = "Wallet topup by admin";
    } else {
      $note = "Wallet deduction by admin";
      $bal = $wallet - $amount;
    }

    runQuery("UPDATE dregister SET dwallet='$bal' WHERE userid='$id' and demail='$email'");
    $_SESSION['msgs'] = "Updated successfully";

    runQuery("INSERT INTO dhistory SET userid='$id', tid='$ref', dname='$note', damount='$amount', dcredit='$amount', dwallet_balance='$bal', ddate='$date', dtype='deposit', demail='$email'");
    header("Location:user-details?id=$id&email=$email");
  }


  if (isset($_POST['Message']) and $_POST['Message'] == 'sendTest') {

    $name = clean($_POST['id']['name']);
    $email = clean($_POST['id']['email']);
    $test = './marginMail.php';
    include 'marginApi.php';


    $_SESSION['msgs'] = "Message sent successfully";
    // header('Location:dashboard');  
  }

  if (isset($_POST['sendNewUser'])) {
    $msg  = $_POST['msg'];
    $title  = clean($_POST['title']);
    $sendEmail = $email  = clean($_POST['email']);
    $id  = clean($_POST['id']);

    $test = './newsletterMail.php';
    include 'newsletterApi.php';

    $_SESSION['msgs'] = "Message sent successfully";
    header("Location:user-details?id=$id&email=$email");
  }

  if (isset($_POST['sendNew'])) {
    $msg  = $_POST['msg'];
    $title  = clean($_POST['title']);

    $sql = runQuery("SELECT demail FROM dregister WHERE dstatus='active'");
    if (numRows($sql) > 0) {
      while ($row = fetchAssoc($sql)) {
        $sendEmail = $row['demail'];
        $test = './newsletterMail.php';
        include 'newsletterApi.php';
      }
    }

    runQuery("INSERT INTO dnews SET nid='$ref', dmsg='$msg', dsubject='$title', ddate='$date' ");

    $_SESSION['msgs'] = "Message sent successfully";
    header('Location:newsletter');
  }


  if (isset($_POST['saveRate'])) {
    $rate  = clean($_POST['rate']);
    runQuery("UPDATE drate SET drate='$rate' WHERE id=1");
    $_SESSION['msgs'] = "Updated successfully";
    header('Location:dashboard');
  }

  if (isset($_POST['saveRap'])) {
    $depo  = clean($_POST['depo']);
    $with  = clean($_POST['with']);
    // runQuery("UPDATE drate SET drate='$rate' WHERE id=1");
    updateFire('drate', "dminDepo='$depo', dminWith='$with'", "id=1");
    $_SESSION['msgs'] = "Updated successfully";
    header('Location:settings');
  }

  if (isset($_POST['saveUpload'])) {
    $tid  = clean($_POST['tid']);
    $id  = clean($_POST['id']);
    $email  = clean($_POST['email']);

    $allowedExts = array("pdf", "doc", "docx");
    $extension = end(explode(".", $_FILES["file"]["name"]));
    if (($_FILES["file"]["type"] == "application/pdf") || ($_FILES["file"]["type"] == "application/msword") || ($_FILES["file"]["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document") && ($_FILES["file"]["size"] < 20000000) && in_array($extension, $allowedExts)) {
      if ($_FILES["file"]["error"] > 0) {
        $_SESSION['msgs'] = "Fail something wrong happen, try again later";
      } else {
        $file = $_FILES["file"]["name"];
        move_uploaded_file($_FILES["file"]["tmp_name"], "files/" . $file);
        runQuery("UPDATE dtrading SET dfile='$file', dstatus='confirmed' WHERE tid='$tid'");

        $_SESSION['msgs'] = "Uploaded successfully!";
      }
    }

    header("Location:user-details?id=$id&tid=$tid&email=$email");
  }
}
