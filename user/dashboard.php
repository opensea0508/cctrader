<?php include 'head.php';
$ref = bin2hex(random_bytes(11));



?>

<body class="wide">

  <!-- page-wrapper Start-->
  <div class="page-wrapper compact-wrapper" id="pageWrapper">
    <?php include 'header.php' ?>

    <!-- Page Body Start-->
    <div class="page-body-wrapper sidebar-icon">
      <!-- Page Sidebar Start-->
      <?php include 'aside.php' ?>

      <!-- Page Sidebar Ends-->
      <div class="page-body porject-dash">
        <div class="container-fluid">
          <div class="page-header dash-breadcrumb">
            <div class="row">
              <div class="col-6"> </div>
              <div class="col-6">
                <div class="breadcrumb-sec">
                  <ul class="breadcrumb">
                    <li class="breadcrumb-item">Dashboard</li>
                    <!-- <li class="breadcrumb-item"></li>  -->
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
          <div class="row ">
            <div class="col-xl-9 xl-60">
              <div class="row">
                <div class="col-xl-12 col-sm-6">
                  <?php if (userInfo($user, $email, 'dvastatus') == 'pending') { ?>
                    <div class="alert alert-warning" role="alert">
                      <strong>Welcome <?php echo userInfo($user, $email, 'dfname')  ?></strong> <br>
                      kindly verify your account <b><u><a href="verification" class="alert-link text-white">here</a></u></b> before you can have full access to your dashboard.
                    </div>
                  <?php } ?>

                  <?php if (userInfo($user, $email, 'dlimited') == 'no') { ?>
                    <div class="alert alert-danger" role="alert">
                      <strong>Welcome <?php echo userInfo($user, $email, 'dfname')  ?></strong> <br>
                      kindly <b><u><a href="risk-disclosure" class="alert-link text-white">click here</a></u></b> to submit your risk disclosure before you can make a deposit to your account
                    </div>
                  <?php } ?>

                  <?php if (is_null(userInfo($user, $email, 'driskName'))) { ?>
                    <div class="alert alert-info" role="alert">
                      <strong>Welcome <?php echo userInfo($user, $email, 'dfname')  ?></strong> <br>
                      kindly <b><u><a href="limited-power" class="alert-link text-white">click here</a></u></b> to agree to the LIMITED POWER OF ATTORNEY
                    </div>
                  <?php } ?>
                  <div class="card">
                    <div class="card-body">
                      <?php if (is_null(userInfo($user, $email, 'dstate')) || is_null(userInfo($user, $email, 'dbank'))) { ?>
                        <div class="text-danger">
                          <b>NOTE:</b> It is mandatory you update your profile details like (Address, State, Bank details, Wallet address (USDT wallet address is mandatory) before you can have full access to your account. <u><b><a href="profile">Update profile here</a></b></u>
                          <hr>
                        </div>
                      <?php } ?>


                      <!-- <div>
                        <a class="donate-with-crypto"
                          href="https://commerce.coinbase.com/checkout/6da189f179bc31">
                          <span>Donate with Crypto</span>
                        </a>
                        <script src="https://commerce.coinbase.com/v1/checkout.js">
                        </script>
                      </div> -->
                      <?php
                      $hour = gmdate('H', strtotime("+1 hour"));
                      $dayTerm = ($hour > 17) ? "Good Evening" : (($hour > 12) ? "Good Afternoon" : "Good Morning");
                      ?>

                      <h5> <?php echo $dayTerm . ' ' . userInfo($user, $email, 'dfname') ?>!</h5>
                      <hr>

                      <style>
                        .list li {
                          margin-bottom: 10px;
                        }
                      </style>

                      <ul class="list">
                        <li><b>Phone Number:</b> <?php echo userInfo($user, $email, 'dphone') ?></li>
                        <li><b>Email Address:</b> <?php echo userInfo($user, $email, 'demail') ?></li>
                        <li><b>Wallet Address:</b> <?php echo userInfo($user, $email, 'dwalletAddress') ?></li>
                        <li><b>Address:</b> <?php echo userInfo($user, $email, 'daddress') ?></li>
                        <li><b>Country:</b> <?php echo userInfo($user, $email, 'dcountry') ?></li>
                        <li><b>State:</b> <?php echo userInfo($user, $email, 'dstate') ?></li>
                        <li><b>City:</b> <?php echo userInfo($user, $email, 'dcity') ?></li>
                        <li><b>Varification:</b> <?php echo ucfirst(userInfo($user, $email, 'dvastatus')) ?></li>
                        <li><b>Is Trader:</b> <?php if(userInfo($user, $email, 'isTrader')==true){ ?>Yes<?php } else { ?>Not Yet<?php }?></li>
                        <hr>
                        <b>Bank Details</b>
                        <hr>
                        <li><b>Bank Name:</b> <?php echo userInfo($user, $email, 'dbank') ?></li>
                        <li><b>Account Name:</b> <?php echo userInfo($user, $email, 'daccName') ?></li>
                        <li><b>Account Number:</b> <?php echo userInfo($user, $email, 'daccNum') ?></li>
                      </ul>
                    </div>
                  </div>


                  <div class="card">
                    <div class="card-body">
                      <!-- <?php if (is_null(userInfo($user, $email, 'dstate')) || is_null(userInfo($user, $email, 'dbank'))) { ?>
                        <div class="text-danger">
                          <b>NOTE:</b> It is mandatory you update your profile details like (Address, State, Bank details, Wallet address (USDT wallet address is mandatory) before you can have full access to your account. <u><b><a href="profile">Update profile here</a></b></u>
                          <hr>
                        </div>
                      <?php } ?> -->
                      <h5>Details</h5>
                      <hr>

                      <style>
                        .list li {
                          margin-bottom: 10px;
                        }
                      </style>

                      <ul class="list">
                        <li><b>Deposit Amount:</b> $<?php echo getAmount($user, $email, 'damount') ?></li>
                        <li><b>Number of Trades:</b> <?php echo getTrades($user, $email) ?></li>
                        <li><b>Total Profit:</b> <?php echo getTotalProfit($user, $email, 'dprofit') ?></li>
                        <!-- <li><b>Profit Ratio:</b> <?php echo  number_format(getTotalProfit($user, $email, 'dprofit') * 100 / getAmount($user, $email, 'damount'), 2) ?>%</li> -->
                        <li><b>Total gold assets Holding:</b> 0</li>
                        <li><b>Commission:</b> 3%</li>
                        <!-- <li><b>Number of Trades:</b> <?php echo userInfo($user, $email, 'demail') ?></li>
                        <li><b>Total Profit:</b> <?php echo userInfo($user, $email, 'dwalletAddress') ?></li>
                        <li><b>Profit Ratio:</b> <?php echo userInfo($user, $email, 'daddress') ?></li>
                        <li><b>Total gold assets Holding:</b> <?php echo userInfo($user, $email, 'dcountry') ?></li>
                        <li><b>Commission:</b> <?php echo userInfo($user, $email, 'dstate') ?></li> -->
                      </ul>
                    </div>
                  </div>

                </div>
              </div>
            </div>
            <div class="col-xl-3 xl-40">
              <?php include 'asider.php' ?>
            </div>
          </div>
        </div>
        <!-- Container-fluid Ends-->
        <!-- Container-fluid starts-->
        <?php 
          $isTrader = userInfo($user, $email, 'isTrader');
          $traderId = userInfo($user, $email, 'id');
          if($isTrader){
        ?>
        <div class="container-fluid">
          <div class="row ">
            <div class="col-xl-12">
              <div class="row">
                <div class="col-xl-12 col-sm-6">
                  <div class="card">
                    <div class="card-body">
                    
                    <h4>Assigned Client</h4> 

                    <hr>
                  <?php 
                  
                    $sql = runQuery("SELECT dregister.dfname AS dfname, dtrading.ddate AS ddate, dtrading.tid AS tid, dtrading.dfrom AS dfrom, dtrading.dto AS dto FROM dregister LEFT JOIN dtrading ON dregister.userid=dtrading.userid WHERE trader=$traderId ORDER BY dregister.id DESC LIMIT 200");
                    if(numRows($sql)>0){
                  ?>
                    <div class="table-responsive" style="min-height: 250px;">
                      <table class="table">
                        <tr>
                          <th>Date</th>
                          <th>Fullname</th>
                          <th>Trading ID</th>
                          <th>From</th>
                          <th>To</th>
                        </tr>

                        <?php while($row=fetchAssoc($sql)){?>
                          <tr>
                          <td><?php echo date("d M, Y", strtotime($row['ddate'])) ?></td>  
                          <td><?php echo $row['dfname']  ?></td>
                          <td><?php echo $row['tid']  ?></td>
                          <td><?php echo date("d M, Y", strtotime($row['dfrom'])) ?></td>
                          <td><?php echo date("d M, Y", strtotime($row['dto'])) ?></td>
                          </tr>
                          <?php } ?>



                      </table>
                    </div>

                    <?php } ?>




                    
                    </div>
                  </div>
                </div>
                
              
                
              </div>
            </div>
            
          </div>
        </div>
        <?php } ?>
        <!-- Container-fluid Ends-->
      </div>
      <!-- tap on top starts-->
      <!-- tap on tap ends-->
      <!-- footer start-->
      <?php include 'footer.php' ?>

    </div>
  </div>

  <?php include 'script.php' ?>
  <?php
  $kyc = runQuery("SELECT * FROM dkyc WHERE userid='$user' AND demail='$email' ");
  if (numRows($kyc) > 0) {
    $row = fetchAssoc($kyc);
    $statusx = $row['dstatus'];
  } else {
    $statusx = '';
  }

  if ($statusx == '' or $statusx == 'rejected') {
  ?>
    <?php if (userInfo($user, $email, 'dkyc') == 'no') { ?>

      <script>
        $(document).ready(function() {
          $('#myModal').modal('show')


          $(document).on("click", "#radioinline1", function() {
            $("#rest").html('<select name="specify" id="" class="form-control"> <option value="">Choose Speccification</option> <option value="0-1 Year">0-1 Year</option> <option value="1-2 Years">1-2 Years</option>  <option value="2-5 Years">2-5 Years</option>  <option value="5Years above">5Years above</option>  </select>')
          })

          $(document).on("click", "#radioinline2", function() {
            $("#rest").html('')
          })
        })
      </script>


      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">KYC Legibility</h5>
              <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

              <p class="text-danger">Answer a few questions to determine if you are qualified to do business with us based on our client eligibility assessment. Our compliance team will review your application, if you pass our client eligibility assessment, you will receive an offer letter from our compliance. </p>

              <hr>
              <?php echo isset($_SESSION['msg']) ? $_SESSION['msg'] : "" ?>

              <form action="controller" method="post">

                <div class="form-group">
                  <label for="">Principal Occupation:</label>
                  <input type="text" placeholder="Principal Occupation" name="occupation" class="form-control">
                </div>

                <div class="form-group">
                  <label for="">What is your total estimated annual income?</label>
                  <select name="annual" id="" class="form-control">
                    <option value="">Choose Annual Income</option>
                    <option value="$10,000-$19,999">$10,000-$19,999</option>
                    <option value="$20,000 - $49,999">$20,000 - $49,999</option>
                    <option value="$50,000 - $99,999">$50,000 - $99,999</option>
                    <option value="$100,000 Above">$100,000 Above</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="">The total estimated Monthly income?</label>
                  <select name="monthly" id="" class="form-control">
                    <option value="">Choose Monthly Income</option>
                    <option value="$500-$999">$500-$999</option>
                    <option value="$1,000 - $4,999">$1,000 - $4,999</option>
                    <option value="$5,000 - $9,999">$5,000 - $9,999</option>
                    <option value="$10,000 Above">$10,000 Above</option>
                  </select>
                </div>


                <div class="form-group">
                  <label for="">Source of Trading funds:</label>
                  <select name="funds" id="" class="form-control">
                    <option value="">Choose Source</option>
                    <option value="Personal saving">Personal saving</option>
                    <option value="Loan">Loan</option>
                    <option value="Collective investment scheme">Collective investment scheme</option>
                    <option value="Salary">Salary</option>
                    <option value="Pension">Pension</option>
                    <option value="Other">Other</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="">What is your current employment status?</label>
                  <select name="employment" id="" class="form-control">
                    <option value="">Choose Monthly Income</option>
                    <option value="Self-Employed">Self-Employed</option>
                    <option value="Employed">Employed</option>
                  </select>
                </div>

                <div class="">
                  <label for="">Do you have any trading experience? </label>
                  <div class="form-group m-t-15 m-checkbox-inline mb-0 custom-radio-ml">
                    <div class="radio radio-primary">
                      <input id="radioinline1" type="radio" name="exp" value="yes">
                      <label class="mb-0" for="radioinline1">Yes</label>
                    </div>
                    <div class="radio radio-danger">
                      <input id="radioinline2" type="radio" name="exp" value="no">
                      <label class="mb-0" for="radioinline2">No</label>
                    </div>
                  </div>
                  <div class="form-group mt-4" id="rest"> </div>
                </div>

                <div class="form-group">
                  <label for="">Which of the trading and Investment objective defined your objective? </label>
                  <select name="goal" id="" class="form-control">
                    <option value="">Choose objective</option>
                    <option value="Short Term goal">Short Term goal</option>
                    <option value="long term goal">long term goal</option>
                  </select>
                </div>


                <div class="">
                  <label for="">Have you ever participated in trading education or have experience/qualifications which would assist your understanding of our services? </label>
                  <div class="form-group m-t-15 m-checkbox-inline mb-0 custom-radio-ml">
                    <div class="radio radio-primary">
                      <input id="radioinline1x" type="radio" name="qty" value="yes">
                      <label class="mb-0" for="radioinline1x">Yes</label>
                    </div>
                    <div class="radio radio-danger">
                      <input id="radioinline2x" type="radio" name="qty" value="no">
                      <label class="mb-0" for="radioinline2x">No</label>
                    </div>
                  </div>
                </div>

                <div class="form-group mt-3">
                  <label for="">When trading or investing with Leverage which one of the following applies? </label>
                  <select name="app" id="" class="form-control">
                    <option value="">Choose </option>
                    <option value="High-profit return or loses">High-profit return or loses</option>
                    <option value="Low-profit return or loses">Low-profit return or loses</option>
                    <option value="Leverage product does not have any risk">Leverage product does not have any risk</option>
                  </select>
                </div>
                <div class="form-group mt-3">
                  <label for="">If you are trading or investing with 50:1 leverage and you have $1,000 in your account, what is the maximum-size position you can open? </label>
                  <select name="leverage" id="" class="form-control">
                    <option value="">Choose </option>
                    <option value="$500,000">$500,000</option>
                    <option value="$50,000">$50,000</option>
                    <option value="<$5,000">
                      <$5,000< /option>
                  </select>
                </div>

                <div class="">
                  <label for="">My open position may be closed automatically when </label>
                  <div class="form-group ">
                    <div class="radio radio-primary " style="margin-left: 15px;">
                      <input id="radio11" type="radio" name="position" value="The market price is moving against me and I don’t have enough equity to maintain the position">
                      <label for="radio11">The market price is moving against me and I don’t have enough equity to maintain the position</label>
                    </div>
                    <div class="radio radio-secondary">
                      <input id="radio22" type="radio" name="position" value="When the market price is moving in my favor with enough equity and profit">
                      <label for="radio22">When the market price is moving in my favor with enough equity and profit</label>
                    </div>
                  </div>
                </div>

                <div class="">
                  <label for=""> Which of these general risk warnings is True? </label>
                  <div class="form-group ">
                    <div class="radio radio-primary " style="margin-left: 15px;">
                      <input id="radio111" type="radio" name="risk" value="Trading Futures/Derivatives, FX, and Options come with a risk of losing money due to leverage.">
                      <label for="radio111">Trading Futures/Derivatives, FX, and Options come with a risk of losing money due to leverage.</label>
                    </div>
                    <div class="radio radio-secondary" style="margin-left: 15px;">
                      <input id="radio221" type="radio" name="risk" value="Trading Futures/Derivatives, FX, and Options do not have any risk of losing money due to leverage, it always produces a guaranteed profit">
                      <label for="radio221">Trading Futures/Derivatives, FX, and Options do not have any risk of losing money due to leverage, it always produces a guaranteed profit</label>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="">How often do you want execution?</label>
                  <select name="exec" id="" class="form-control">
                    <option value="">Choose </option>
                    <option value="Very Aggressive ">Very Aggressive </option>
                    <option value="Weekly">Weekly</option>
                    <option value="Monthly">Monthly</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="">What is your Expected Amount of Deposit ?</label>
                  <input type="text" name="amtDepo" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
              <button class="btn btn-primary" type="button" data-bs-dismiss="modal">Close</button>
              <button class="btn btn-secondary" name="saveKyc" type="submit">Submit</button>
              </form>
            </div>
          </div>
        </div>
      </div>

  <?php }
  } ?>


</body>

</html>


<!--
Paystack  
sk_test_1923d7245b5c9a402912e9da318108837e8554c7

pk_test_70f7d298ee15a1f38790be65436348b895208703 -->