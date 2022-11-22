<?php

require '../user/clean.php';
$code = bin2hex(random_bytes(6)) . date("Ymdhis");
$folder = 'files';

function updateReg($id, $email, $row, $rowRes)
{
  runQuery("UPDATE dregister SET $row='$rowRes' WHERE userid='$id' AND demail='$email' ");
}


if (isset($_POST['Message']) and $_POST['Message'] == 'deleteCourse') {
  $img = clean($_POST['id']['img']);
  $id = clean($_POST['id']['id']);
  deleteFire("dcourse", "cid='$id'");
  @unlink($_POST['himg']);
}

if (isset($_POST['Message']) and $_POST['Message'] == 'deleteNid') {
  $nid = clean($_POST['id']);
  deleteFire("dnews", "nid='$nid'");
}

if (isset($_POST['Message']) and $_POST['Message'] == 'canDepo') {
  $userid = clean($_POST['id']['user']);
  $email = clean($_POST['id']['email']);
  $id = clean($_POST['id']['id']);

  updateFire('ddeposit', "dstatus='cancelled'", "userid='$userid' AND demail='$email' AND did='$id' ");
}

if (isset($_POST['Message']) and $_POST['Message'] == 'paidDepo') {
  $userid = clean($_POST['id']['user']);
  $email = clean($_POST['id']['email']);
  $id = clean($_POST['id']['id']);
  $amount = clean($_POST['id']['amount']);

  $balance = (int)userInfo($userid, $email, 'dwallet') + (int)$amount;
  updateFire('dregister', "dwallet='$balance'", "userid='$userid' AND demail='$email'");
  updateFire('ddeposit', "dstatus='confirmed'", "userid='$userid' AND demail='$email' AND did='$id'");
  updateFire("dhistory", "dstatus='paid'", "tid='$id'");

  $ref = userInfo($userid, "$email", "dreferral");
  $name = userInfo($userid, "$email", "dfname");
  if (!empty($ref)) {
    //get user wallet
    $wall = runQuery("SELECT dwallet, demail, userid FROM dregister WHERE drefCode='$ref'")->fetch_assoc();
    //get the amount with 10% deposit
    $per = (int)$amount * 0.1;
    $rfinal = (float)$wall['dwallet'] + $per;
    runQuery("UPDATE dregister SET dwallet='$rfinal' WHERE drefCode='$ref'");
    $userid = $wall['userid'];
    $email = $wall['demail'];

    runQuery("INSERT INTO dhistory SET userid='$userid', tid='$code', dname='Referral bonus by $name', damount='$per', dcredit='$per', dwallet_balance='$rfinal', ddate='$date', dtype='deposit', demail='$email'");
  }
}


if (isset($_POST['Message']) and $_POST['Message'] == 'paidReq') {
  $userid = clean($_POST['id']['user']);
  $email = clean($_POST['id']['email']);
  $id = clean($_POST['id']['id']);

  updateFire('dhistory', "dstatus='Paid'", "userid='$userid' AND demail='$email' AND tid='$id' ");
}

if (isset($_POST['Message']) and $_POST['Message'] == 'canReq') {
  $userid = clean($_POST['id']['user']);
  $email = clean($_POST['id']['email']);
  $id = clean($_POST['id']['id']);
  $amount = clean($_POST['id']['amount']);

  $balance = (int)userInfo($userid, $email, 'dwallet') + (int)$amount;
  updateFire('dregister', "dwallet='$balance'", "userid='$userid' AND demail='$email'");
  updateFire('dhistory', "dstatus='Cancelled'", "userid='$userid' AND demail='$email' AND tid='$id'");
}




if (isset($_POST['Message']) and $_POST['Message'] == 'verifyAccount') {
  $id = clean($_POST['id']['userid']);
  $email = clean($_POST['id']['email']);
  updateReg($id, $email, 'dvastatus', 'Verified');
  updateReg($id, $email, 'dvstatus', 'Verified');
}

if (isset($_POST['Message']) and $_POST['Message'] == 'Ban') {
  $id = clean($_POST['id']['userid']);
  $email = clean($_POST['id']['email']);
  $status = clean($_POST['id']['status']) == "banned" ? "banned" : "active";
  updateReg($id, $email, 'dstatus', $status);
}

if (isset($_POST['Message']) and $_POST['Message'] == 'Trader') {
  $id = clean($_POST['id']['userid']);
  $email = clean($_POST['id']['email']);
  $status = clean($_POST['id']['status']) == "client" ? true : false;
  updateReg($id, $email, 'isTrader', $status);
}

if (isset($_POST['Message']) and $_POST['Message'] == 'approveReq') {
  $id = clean($_POST['id']['id']);
  $userid = clean($_POST['id']['userid']);
  $email = clean($_POST['id']['email']);
  $status = clean($_POST['id']['status']) == "approve" ? "Approved" : "Rejected";
  $kyc = clean($_POST['id']['status']) == "approve" ? "yes" : "no";
  if ($kyc == 'yes') {
    //send approval mail
    $test = './kycMail.php';
  } else {
    //send rejected mail
    $test = './kycMail2.php';
  }
  $name = userInfo($userid, $email, 'dfname');
  include './kycMailApi.php';
  updateReg($userid, $email, 'dkyc', $kyc);
  updateFire('dkyc', "dstatus='$status'", "id='$id'");
}
