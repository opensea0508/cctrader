<?php 
ob_start();
session_start();
    require 'user/clean.php';
    function basePage($data){
         echo basename($_SERVER["REQUEST_URI"]) == $data?"uk-active":"" ;
    }
 ?>
<!DOCTYPE html>
<html lang="zxx" dir="ltr">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
<?php if(in_array($_SERVER['REMOTE_ADDR'], $localhost)){ ?>
      <base href="<?php echo $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME'] .'/cctrader/'; ?>">
      <base href="cctrader/">
    <?php } else {?>
      <base href="<?php echo $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME']; ?>">
      <base href="/">
    <?php }?>

    <!-- Standard Meta -->
    <meta charset="utf-8">
    <meta name="description" content="CC Trading ">
    <meta name="keywords" content="Forex Centre">
    <meta name="author" content="Indonez">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#e9e8f0" />
    <!-- Site Properties -->
    <title>CCITraders - Your One Stop Forex Centre</title>
    <link rel="shortcut icon" href="img/favicon.jpeg" type="image/x-icon">
    <!-- Critical preload -->
    <link rel="preload" href="js/vendors/uikit.min.js" as="script">
    <link rel="preload" href="css/vendors/uikit.min.css" as="style">
    <link rel="preload" href="css/style.css" as="style">
  
    <!-- Favicon and apple icon --> 
    <link rel="apple-touch-icon-precomposed" href="img/favicon.jpeg">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="css/vendors/uikit.min.css">
    <link rel="stylesheet" href="css/style.css">

    <style>
        .mt-40{
            margin-top: 40px !important;
        }
    </style>

<!-- <script type="text/javascript">
    (function () {
        var options = {
            whatsapp: "+447471161456", // WhatsApp number
            call_to_action: "Message us", // Call to action
            button_color: "#FF6550", // Color of button
            position: "left", // Position may be 'right' or 'left'
        };
        var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
    })();
</script> -->

</head>