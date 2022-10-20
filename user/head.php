<?php 

include 'clean.php';
$ref = bin2hex(random_bytes(11));
if(isset($_SESSION['web'])){
  $email = $_SESSION['email'];
  $user = $_SESSION['userid'];
}else{
  header("Location:../login");
}
 $rate = runQuery("SELECT * FROM drate WHERE id=1")->fetch_assoc();

 if(empty(userInfo($user, $email,'drefCode'))){
    $rav = bin2hex(random_bytes(6));
    runQuery("UPDATE dregister SET drefCode='$rav' WHERE userid='$user' AND demail='$email'");
  }
 

if(basename($_SERVER['REQUEST_URI'])=='deposit' || basename($_SERVER['REQUEST_URI'])=='withdraw'){
  if(userInfo($user, $email, 'dlimited')!='yes' AND userInfo($user, $email, 'dvastatus')!='Verified' AND userInfo($user, $email, 'driskSign')==''){
    header('location:dashboard');
  }
}
  ?>
<!DOCTYPE html>
<html lang="en">
   
<head>
<?php if(in_array($_SERVER['REMOTE_ADDR'], $localhost)){ ?>
      <base href="<?php echo $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME'] .'/cctrader/user/'; ?>">
      <base href="cctrader/user/">
    <?php } else {?>
      <base href="<?php echo $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME'] .'/user/'; ?>">
      <base href="user/">
    <?php }?>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content=" ">
    <meta name="keywords" content=" ">
    <meta name="author" content="\">
    <link rel="icon" href="../img/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="../img/favicon.png" type="image/x-icon">
    <title>CCI Traders - Dashboard</title>
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap" rel="stylesheet">
    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="./assets/font-awesome/css/font-awesome.min.css">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="./assets/css/vendors/icofont.css">
    <!-- Themify icon-->
    <!-- <link rel="stylesheet" type="text/css" href="./assets/css/vendors/themify.css"> -->
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="./assets/css/vendors/flag-icon.css">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="./assets/css/vendors/feather-icon.css">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="./assets/css/vendors/animate.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/vendors/prism.css">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="./assets/css/vendors/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/vendors/sweetalert2.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="./assets/css/style.css">
    <link id="color" rel="stylesheet" href="./assets/css/color-1.css" media="screen">
    <!-- Responsive css-->
    
    <link rel="stylesheet" type="text/css" href="./assets/css/responsive.css">
    <style>

      .text-orange{
        color:orange !important
      }

      .bg-orange{
        background-color:orange !important
      }

      .border-orange{
        border: 1px solid orange !important;
      }

      #map {
          height: 260px;
          width: 100%;
      }

      .lister ul li{
        border-bottom: 1px solid orange;
      }

      .lister ul li a {
        display: flex;
        align-items: center;
        color:#2b2b2b
      }

      .lister ul li a span{
        margin-left: 10px !important; 
      }

      @media screen and (max-width:800px){
        .footer{
          margin-left: 0 !important;
        }
      }
      
.owl-nav{
    /* display: flex; */
    position: relative;
    color: orange !important;
    /* width: 100px; */
    margin: auto;
    text-align: center;
    /* justify-content: space-between; */
}


.owl-nav .owl-prev, .owl-nav .owl-next{
    /* text-transform: capitalize; */
    font-size: 18px;
    padding: 4px;
}

.owl-nav .owl-next{
    position: absolute;
    right: 10px;
    top: -140px;
}

.owl-nav .owl-prev{
    position: absolute;
    left: 10px;
    top: -140px;
}

.lister i{
  font-size: 12px !important;
}
    </style>
  </head>