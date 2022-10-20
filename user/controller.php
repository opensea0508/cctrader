<?php

require './clean.php';
$code = bin2hex(random_bytes(6)) . date("Ymdhis");
$email = $_SESSION['email'];
$userid = $_SESSION['userid'];
$folder = 'files';

require '../image_php/class.upload.php';
$transid = date("Ymdhis");
$filePath = "../image_php/image_doc.php";
$date = gmdate("Y-m-d H:i:s", strtotime("+1hour"));


$rate = runQuery("SELECT * FROM drate WHERE id=1")->fetch_assoc();



if (isset($_POST['saveCrypto'])) {
  // print_r($_POST);
  $amount = clean($_POST['amount']);
  $wall = userInfo($userid, "$email", "dwallet") + $amount;

  // $final = (Float)$amount/(Float)$rate['drate'];
  // $wall = (Float)$row['dwallet'] + $final;
  $cat = $_SESSION['category'];

  $sql = runQuery("INSERT INTO ddeposit SET did='$code', userid='$userid', demail='$email',damount='$amount', ddate='$date', dcategory='$cat' ");

  runQuery("INSERT INTO dhistory SET userid='$userid', tid='$code', dname='Wallet topup', damount='$amount', dcredit='$amount', dwallet_balance='$wall', ddate='$date', dtype='deposit', demail='$email'");

  if ($sql) {
    header("Location:pay-crypto");
    $_SESSION['amount'] = $amount;
  }
}

//With request
if (isset($_POST['saveTradeReq'])) {
  $amount = clean($_POST['amount']);
  $method = clean($_POST['method']);
  $from = clean($_POST['from']);
  $to = clean($_POST['to']);
  $name = userInfo($userid, $email, 'dfname');

  runQuery("INSERT INTO  dtrading SET tid='$code', userid='$userid', demail='$email', dfname='$name', dfrom='$from', dto='$to', ddate='$date'");

  $_SESSION['msgs'] = 'Your request has been submitted successfully.';
  $_SESSION['msg'] = '<div class="alert alert-success" role="alert">
      <strong>Success!</strong> <br>
      Your request has been submitted, Admin will get back to you asap!
  </div>';
  header("Location:history");
}

if (isset($_POST['saveRequest'])) {
  $amount = clean($_POST['amount']);
  $method = clean($_POST['method']);
  $balance = (int)userInfo($userid, $email, 'dwallet') - (int)$amount;

  runQuery("INSERT INTO  dhistory SET tid='$code', userid='$userid', demail='$email', dname='Withdrawal request', ddebit='$amount', damount='$amount', dwallet_balance='$balance', dtype='withdraw', ddate='$date', dpay='$method'");
  updateFire('dregister', "dwallet='$balance'", "userid='$userid' AND demail='$email'");

  $_SESSION['msgs'] = 'Your request has been submitted successfully.';
  header("Location:withdraw");
}


//Upload Documents
if (isset($_POST['saveLimt'])) {
  $name = clean($_POST['name']);
  $date = str_replace('/', '-', clean($_POST['date']));

  runQuery("UPDATE dregister SET driskName='$name', driskDate='$date' WHERE userid='$userid' and demail='$email' ");
  //    if(!empty($_FILES['img']['name'])){
  //     universalImageUpload($_FILES['img'], $transid, 'dregister', "userid='$userid' AND demail='$email'", 'driskSign', $int='');
  //     //    @unlink($_POST['himg']);
  //    } 

  $_SESSION['msg'] = '<div class="alert alert-success" role="alert">
              <strong>Success!</strong> <br>
                Thank You, Your agreement was successfully signed and submitted
          </div>';
  header("Location:limited-power");
}

//Upload Documents
if (isset($_POST['saveRisk'])) {
  $name = clean($_POST['name']);

  runQuery("UPDATE dregister SET dlimited='$name' WHERE userid='$userid' and demail='$email' ");

  $_SESSION['msg'] = '<div class="alert alert-success" role="alert">
              <strong>Success!</strong> <br>
              Thank You, Your agreement was successfully signed and submitted!
          </div>';
  header("Location:risk-disclosure");
}


//start and stop trade
if (isset($_POST['startTrade'])) {
  $link = clean($_POST['link']);
  $position = clean($_POST['position']);
  $buy = clean($_POST['buy']);
  $sell = clean($_POST['sell']);
  $stop = clean($_POST['stop']);
  $instrument = clean($_POST['instrument']);
  $profit = clean($_POST['profit']);
  $price = !empty(clean($_POST['price'])) ? clean($_POST['price']) : "";
  $request = clean($_POST['request']);
  $type = $link == "start-trade" ? 'start' : 'stop';
  $date = gmdate("Y-m-d H:i:s", strtotime("+1 hour"));


  $sql = runQuery("INSERT INTO dtrade_request SET userid='$userid', demail='$email', drequest='$request', dposition='$position', dbuy='$buy', dsell='$sell', dstop='$stop', dprice='$price', dinstrument='$instrument', dprofit='$profit', dtype='$type', ddate='$date' ");
  if ($sql) {
    $_SESSION['msg'] = '<div class="alert alert-success" role="alert">
                <strong>Success!</strong> <br>
                Submitted successfully! admin will contact you shortly.
            </div>';
  } else {
    $_SESSION['msg'] = '<div class="alert alert-danger" role="alert">
                <strong>Fail!</strong> <br>
                Oops! unable to submit your request, try again later!
            </div>';
  }

  header("Location:$link");
}



//KYC
if (isset($_POST['saveKyc'])) {

  $occupation = clean($_POST['occupation']);
  $annual = clean($_POST['annual']);
  $monthly = clean($_POST['monthly']);
  $funds = clean($_POST['funds']);
  $employment = clean($_POST['employment']);
  $exp = clean($_POST['exp']);
  $specify = clean($_POST['specify']);
  $goal = clean($_POST['goal']);
  $qty = clean($_POST['qty']);
  $app = clean($_POST['app']);
  $leverage = clean($_POST['leverage']);
  $position = clean($_POST['position']);
  $risk = clean($_POST['risk']);
  $exec = clean($_POST['exec']);
  $amtDepo = clean($_POST['amtDepo']);

  $sql = runQuery("INSERT INTO dkyc SET userid='$userid', demail='$email', doccupation='$occupation', dannual='$annual', dmonthly='$monthly', dfunds='$funds', demployment='$employment', dexperience='$exp', dspecify='$specify', dgoal='$goal', dqty='$qty', dapp='$app', dleverage='$leverage', dposition='$position', drisk='$risk', dexec='$exec', damtDepo='$amtDepo', ddate='$date' ");

  if ($sql) {
    $_SESSION['msg'] = '<div class="alert alert-success" role="alert">
                <strong>Success!</strong> <br>
                Submitted successfully! admin will contact you shortly.
            </div>';
  } else {
    $_SESSION['msg'] = '<div class="alert alert-danger" role="alert">
                <strong>Fail!</strong> <br>
                Oops! unable to submit your kyc, try again later!
            </div>';
  }

  header("Location:kyc");
}







//Upload Documents
if (isset($_POST['upDocs'])) {
  runQuery("UPDATE dregister SET dvstatus='submitted' WHERE userid='$userid' and demail='$email' ");
  if (!empty($_FILES['img']['name'])) {
    insertImagesNew($_FILES['img'], $code, 'dutility');
    @unlink($_POST['himg']);
  }

  if (!empty($_FILES['img1']['name'])) {
    insertImagesNew($_FILES['img1'], $code, 'dfront', '_1');
    @unlink($_POST['himg1']);
  }

  if (!empty($_FILES['img2']['name'])) {
    insertImagesNew($_FILES['img2'], $code, 'dback', '_2');
    @unlink($_POST['himg2']);
  }

  $_SESSION['msg'] = '<div class="alert alert-success" role="alert">
                <strong>Success!</strong> <br>
                Updated successful!
            </div>';
  header("Location:verification");
}


//Bank Detail
if (isset($_POST['saveBank'])) {
  $bank = clean($_POST['bank']);
  $name = clean($_POST['name']);
  $number = clean($_POST['number']);
  $country = clean($_POST['country']);
  $sort = clean($_POST['sort']);
  runQuery("UPDATE dregister SET dbank='$bank', daccName='$name', daccNum='$number', dcountry='$country', dsort='$sort' WHERE userid='$userid' and demail='$email' ");
  $_SESSION['msg'] = '<div class="alert alert-success" role="alert">
            <strong>Success!</strong> <br>
            Updated successful!
        </div>';
  header("Location:profile");
}


//Profile Details
if (isset($_POST['saveProf'])) {
  $fname = clean($_POST['fname']);
  $city = clean($_POST['city']);
  $state = clean($_POST['state']);
  $address = clean($_POST['address']);
  $waddress = clean($_POST['waddress']);
  $nphone = clean($_POST['nphone']);
  $kin = clean($_POST['kin']);
  $rel = clean($_POST['rel']);

  $sql = runQuery("UPDATE dregister SET dfname='$fname', dcity='$city', dstate='$state', daddress='$address', dwalletAddress='$waddress', dnext='$kin', drelation='$rel', dnextPhone='$nphone' WHERE demail='$email' AND userid='$userid' ");
  if ($sql) {
    $_SESSION['msg'] = '<div class="alert alert-success" role="alert">
        <strong>Success!</strong> <br>
        Updated successful!
    </div>';
  } else {
    $_SESSION['msg'] = '<div class="alert alert-danger" role="alert">
                    <strong>Fail!</strong> <br>
                    Oops! something went wrong, try again later!
                </div>';
  }

  header("Location:profile");
}
