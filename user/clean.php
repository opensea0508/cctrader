<?php

@session_start();

//check whether on localhost or online
$localhost = array(
  '127.0.0.1',
  '::1'
);

if (in_array($_SERVER['REMOTE_ADDR'], $localhost)) {
  $conn = new mysqli("localhost", "root", "", "ccitrader");
} else {
  $conn = new mysqli("localhost", "ccitrade_server", "@admin100@", "ccitrade_server");
}



function clean($value)
{
  global $conn;
  $value = trim($value);
  $value = htmlspecialchars($value);
  $value = strip_tags($value);
  $value = $conn->real_escape_string($value);
  return $value;
}

@$idc = clean($_SESSION['userid']);

function limitTextAnchor($text, $limit, $anchor)
{
  if (str_word_count($text, 0) > $limit) {
    $word = str_word_count($text, 2);
    $pos = array_keys($word);
    $text = substr($text, 0, $pos[$limit]) . $anchor;
  }
  return $text;
}
function formatDate($data)
{
  return date("d M, Y", strtotime($data));
}

function formatDateTime($data)
{
  return date("d M Y, h:i:sa", strtotime($data));
}


function formatTime($data)
{
  return date("H:i", strtotime($data));
}

function runQuery($statement)
{
  global $conn;
  return $conn->query($statement);
}

function fetchAssoc($statement)
{
  return $statement->fetch_assoc();
}

function numRows($sql)
{
  return $sql->num_rows;
}



function addToMonth($now, $howManyMonth)
{
  $date = $now;
  $date = strtotime($date);
  $date = strtotime($howManyMonth . ' months', $date);
  return gmdate('Y-m-d H:i:s', $date);
}

function addToWeek($howManyWeek)
{
  $date = strtotime(gmdate("Y-m-d H:i:s"));
  $date = strtotime($howManyWeek . ' weeks', $date);
  return gmdate('Y-m-d H:i:s', $date);
}

function addToDate($now, $howManyDays)
{
  $date = $now;
  $date = strtotime($date);
  return gmdate('Y-m-d H:i:s', strtotime($howManyDays . ' day'));
}

function addMins($mins)
{
  return gmdate('Y-m-d H:i:s', strtotime("+ $mins minutes"));
}

function datePlusOneHour()
{
  $now = date("Y-m-d H:i:s");
  $date = date('Y-m-d H:i:s', strtotime("+1 hour", strtotime($now)));
  return $date;
}


function generateRandomString($length = 10)
{
  return substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length);
}

function limitText($text, $limit)
{
  if (str_word_count($text, 0) > $limit) {
    $word = str_word_count($text, 2);
    $pos = array_keys($word);
    $text = substr($text, 0, $pos[$limit]) . '...';
  }
  return $text;
}


function replaceForMeNow($data)
{
  $data = str_replace(" ", "-", $data);
  $data = str_replace(".", "-", $data);
  return $data;
}

function kudiSms($phone, $messageTosend)
{

  $message = urlencode($messageTosend);
  $sender = "Fundwallet";
  // $sender="Fundwallet";  
  $receiver = $phone; //replace with phone number
  //format phone number
  $receiver_phone = str_replace('+', '', $receiver);
  $receiver_phone = str_replace(' ', '', $receiver_phone);
  if (strlen($receiver_phone) == 11 and substr($receiver_phone, 0, 1) == '0') {
    $receiver_phone = '234' . substr($receiver_phone, 1, 20);
  }
  //send sms
  $ch = @curl_init();
  @curl_setopt($ch, CURLOPT_URL, "http://account.kudisms.net/api/?username=admin@fundwallet.net&password=@admin100@&message={$message}&sender={$sender}&mobiles={$receiver_phone}");
  @curl_exec($ch);
  @curl_close($ch);
}


function findCountry($ip)
{
  $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
  //get country full name
  if (property_exists($ipdat, 'geoplugin_countryName')) {
    $country =  $ipdat->geoplugin_countryName;
  } else {
    $country = "Nigeria";
  }
  return $country;
}




function insertImagesNew($fileName, $transid, $id = 'dimg', $int = '')
{
  global $folder, $userid, $email, $filePath;
  @list(,, $imtype,) = getimagesize($fileName['tmp_name']);
  if ($imtype == 3 or $imtype == 2 or $imtype == 1) {
    $picid = $transid . $int;
    $foo = new Upload($fileName);
    include($filePath);
    runQuery("UPDATE dregister SET $id='$picid' WHERE userid='$userid' AND demail='$email'");
  }
}



function addline($text)
{
  $codesToConvert = array(
    ' '    =>  '-',
    '-'    =>  '-',
    '�'    =>  '-',
    '+'  =>  '',
    ' �'    =>  '-',
    '� '    =>  '-',
    ' � '    =>  '-',
    '- '    =>  '-',
    ' -'    =>  '-',
    '�'    =>  '-',
    '!'    =>  '',
    ' ,'    =>  '-',
    ', '    =>  '-',
    ':'    =>  '-',
    ': '    =>  '-',
    ' :'    =>  '-',
    '�'    =>  '-',
    '_'    =>  '-',
    '&ndash'    =>  '-',
    '&mdash'    =>  '-',
    '&frasl'    =>  '-',
    '/'    =>  '-',
    ';'    =>  '',
    '&#039'    =>  '',
    '&quot'    =>  '',
    '?'    =>  '',
    '�'    =>  '',
    '('    =>  '',
    ')'    =>  '',
    '['    =>  '',
    ']'    =>  '',
    '>'    =>  '',
    '<'    =>  '',
    '{'    =>  '',
    '}'    =>  '',
    '$'    =>  '',
    '&'    =>  '',
    '#'    =>  '',
    '@'    =>  '',
    '%'    =>  '',
    '*'    =>  '',
    '^'    =>  '',
    '�'    =>  '',
    '�'    =>  '',
    '�'    =>  '',
    '�'    =>  '',
    '�'    =>  '',
    '�'    =>  '',
    '.'    =>  '',
    '..'    =>  '',
    '...'    =>  '',
    '....'    =>  '',
    '�'    =>  '',
    '&acirc;��'    =>  '',
    '&acirc;��'    =>  '',
    ','    =>  '-'
  );
  return (strtr($text, $codesToConvert));
}


function userInfo($data, $email, $value)
{
  $data = runQuery("SELECT * FROM dregister WHERE userid='$data' AND demail='$email'");
  if (numRows($data) > 0) {
    $datas = fetchAssoc($data);
    $result = $datas[$value];
  } else {
    $result = ' ';
  }

  return $result;
}

function userHistory($data, $email, $value)
{
  $data = runQuery("SELECT * FROM dhistory WHERE userid='$data' AND demail='$email'");
  if (numRows($data) > 0) {
    $datas = fetchAssoc($data);
    $result = $datas[$value];
  } else {
    $result = ' ';
  }

  return $result;
}

function getInfo($tableName, $data, $email, $value)
{
  $data = runQuery("SELECT * FROM $tableName WHERE userid='$data' AND demail='$email'");
  if (numRows($data) > 0) {
    $datas = fetchAssoc($data);
    $result = $datas[$value];
  } else {
    $result = ' ';
  }

  return $result;
}

function getAmount($userId, $email, $value)
{
  $data = runQuery("SELECT SUM($value) as depositSum FROM ddeposit WHERE userid='$userId' AND demail='$email' AND dstatus='confirmed'");
  if (numRows($data) > 0) {
    $datas = fetchAssoc($data);
    $result = $datas['depositSum'];
  } else {
    $result = 0;
  }
  return $result;
}

function getCommission($userId, $email, $value)
{
  $data = runQuery("SELECT SUM($value) as commissionSum FROM dhistory WHERE userid='$userId' AND demail='$email' AND dstatus='paid' AND dtype='commission'");
  if (numRows($data) > 0) {
    $datas = fetchAssoc($data);
    $result = $datas['commissionSum'];
  } else {
    $result = 0;
  }
  return $result;
}

function getTrades($userId, $email)
{
  $data = runQuery("SELECT COUNT('drequest') as tradeSum FROM dtrade_request WHERE userid='$userId' AND demail='$email'");
  if (numRows($data) > 0) {
    $datas = fetchAssoc($data);
    $result = $datas['tradeSum'];
  } else {
    $result = 0;
  }
  return $result;
}

function getTotalProfit($userId, $email, $value)
{
  $data = runQuery("SELECT SUM($value) as totalProfit FROM dtrade_request WHERE userid='$userId' AND demail='$email'");
  if (numRows($data) > 0) {
    $datas = fetchAssoc($data);
    $result = $datas['totalProfit'];
  } else {
    $result = 0;
  }
  return $result;
}

function getGoldAssets($userId, $email, $value)
{
  $data = runQuery("SELECT SUM($value) as goldAssets FROM ddeposit WHERE userid='$userId' AND demail='$email' AND dcategory='Category 6' AND dstatus='confirmed'");
  if (numRows($data) > 0) {
    $datas = fetchAssoc($data);
    $result = $datas['goldAssets'];
    $result = $result/100;
  } else {
    $result = 0;
  }
  return $result;
}

// Transform hours like "1:45" into the total number of minutes, "105". 
function hoursToMinutes($hours)
{
  $minutes = 0;
  if (strpos($hours, ':') !== false) {
    // Split hours and minutes. 
    list($hours, $minutes) = explode(':', $hours);
  }
  return $hours * 60 + $minutes;
}

// Transform minutes like "105" into hours like "1:45". 
function minutesToHours($minutes)
{
  $hours = (int)($minutes / 60);
  $minutes -= $hours * 60;
  return sprintf("%d:%02.0f", $hours, $minutes);
}
function ratePerPeriod($id, $period, $km)
{
  $sql = runQuery("SELECT * FROM `dsettings_rates` WHERE dcategoryid='$id'")->fetch_assoc();
  return '&#8358; ' . number_format($sql[$period] * $km);
}

function hoursToMins($hours)
{
  $split = preg_split("/[^\w]*([\s]+[^\w]*|$)/", $hours, -1, PREG_SPLIT_NO_EMPTY);

  if ($split[0] >= 1 && $split[0] < 60 && $split[1] == 'min') {
    $duration = $split[0];
  } elseif ($split[0] >= 1 && $split[0] < 60 && $split[1] == 'mins') {
    $duration = $split[0];
  } else {
    $durationHours = $split[0] * 60;
    $durationMin = $split[2];
    $duration = $durationHours + $durationMin;
  }

  return $duration;
}

function replace($data)
{
  $data = str_replace(',', '', $data);
  $data = str_replace('$', '', $data);
  $data = str_replace('$ ', '', $data);
  return $data;
}

function loginUser($email, $pass, $tablename)
{

  $sql =  runQuery("SELECT * FROM $tablename WHERE demail='$email' AND dpass='$pass' AND dstatus='active' ");
  if (numRows($sql) > 0) {
    //user have info
    $row = fetchAssoc($sql);
    $_SESSION['email'] = $row['demail'];
    $_SESSION['userid'] = $row['userid'];

    if ($row['dlevel'] == 'admin' or $row['dlevel'] == 'staff') {
      $_SESSION['admin'] = true;
      header("Location: admin/dashboard");
    } else {
      $_SESSION['web'] = true;
      header("Location: user/dashboard");
    }
  } else {
    $_SESSION['msg'] = ' 
      <div class="uk-alert-danger" uk-alert>
          <a class="uk-alert-close" uk-close></a>
          <strong>Fail!</strong> <br>
          <p>Invalid login details or your account is yet to be verified, try again later!</p>
      </div>';
    header('Location:login');
  }
}

function logoutUser($return = '../home')
{
  session_start();
  session_destroy();
  setcookie("email", "");
  setcookie("password", "");
  header("Location: $return");
}

function changePassword($old, $pass, $email, $userid, $tableName = 'dlogin')
{
  $sql = runQuery("SELECT dpass FROM $tableName WHERE demail='$email' AND userid='$userid' AND dpass='$old' ");
  if (numRows($sql) > 0) {
    runQuery("UPDATE $tableName SET dpass='$pass' WHERE demail='$email' AND userid='$userid' ");
    //   $_SESSION['msgs'] = "Updated successfully!";
    $_SESSION['msg'] = '<div class="alert alert-success" role="alert">
                          <strong>Success!</strong> <br>
                          Updated successfully!!
                        </div>';
  } else {
    $_SESSION['msg'] = '<div class="alert alert-danger" role="alert">
                          <strong>Fail!</strong> <br>
                          Incorrect current password, try again later!
                        </div>';
  }
}

function universalImageUpload($fileName, $transid, $tableName, $position, $id = 'dimg', $int = '')
{
  global $folder, $filePath;
  @list(,, $imtype,) = getimagesize($fileName['tmp_name']);
  if ($imtype == 3 or $imtype == 2 or $imtype == 1) {
    $picid = $transid . $int;
    $foo = new Upload($fileName);
    include($filePath);
    runQuery("UPDATE $tableName SET $id='$picid' WHERE $position ");
  }
}

function deleteFire($tableName, $position)
{
  runQuery("DELETE FROM $tableName WHERE  $position ");
}

function updateFire($tableName, $rowSet, $position)
{
  runQuery("UPDATE $tableName SET $rowSet WHERE  $position ");
}

function selectFire($tableName, $position, $colResul)
{
  $sql = runQuery("SELECT * FROM $tableName WHERE  $position ");
  if (numRows($sql) > 0) {
    $row = fetchAssoc($sql);
    $result = $row[$colResul];
  } else {
    $result = '';
  }

  return $result;
}
