<?php
include 'clean.php'; 
$out = $outs = $amount = '';
$active = false;
$email = $_SESSION['email'];
$userid = $_SESSION['userid'];


if(isset($_POST['Message']) AND $_POST['Message']=='canReq' ){
  $id = clean($_POST['id']['id']);
  $amount = clean($_POST['id']['amount']);
  $balance = (INT)userInfo($userid, $email, 'dwallet') + (INT)$amount;
  updateFire('dregister', "dwallet='$balance'", "userid='$userid' AND demail='$email'");
  updateFire('dhistory', "dstatus='Cancelled'", "userid='$userid' AND demail='$email' AND tid='$id'");
  updateFire('dhistory', "dstatus='Cancelled'", "original_tid='$id' AND dtype='commission'");

}

