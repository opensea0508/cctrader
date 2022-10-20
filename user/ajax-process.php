<?php
include 'clean.php'; 
$out = $outs = $amount = '';
$active = false;
$email = $_SESSION['email'];
$userid = $_SESSION['code'];
include '../mobile-customers/ajax-process-api.php';
// include '../app/ajax-process-api.php';
