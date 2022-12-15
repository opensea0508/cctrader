<?php include 'head.php';
$ref = bin2hex(random_bytes(11));
 ?>

  <body class="wide" >
   
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
                <div class="card">
                    <div class="card-body">

                    <h4>Withdraw</h4>
                    <hr>
                    <u><b class="text-danger">Note:</b></u>
                    <p>Withdrawals are processed from our Prime Brokers (Who are responsible for financial Transactions) into your trading dashboard.  Before sending a request for withdrawal, we recommend you check your balance, equity, and Margin from your trade monitor room, or through your recent trading histories</p>

                    <p>If you have an open trade, (especially negative trade) we recommend you send us a request to close the trade first before initiating a withdrawal.</p>
                    </div>
                </div>
 
                <?php 

                    //check depo
                    $sql = runQuery("SELECT * FROM ddeposit WHERE userid='$user'  AND demail='$email' ORDER BY id DESC LIMIT 1");
                    if(numRows($sql)>0){
                      $fall = fetchAssoc($sql);
                      $amount = $fall['damount'];
                      $cat = $fall['dcategory'];
                      ?>
                    <div class="card">
                    <div class="card-body">
                    <h5>You're on <?php echo $cat; ?></h5>
                    <hr>
                     
                      <div class="">
                        <?php 
                        $id = userInfo($user, $email, 'id');
                        $traderQuery = runQuery("SELECT trader FROM dregister WHERE id='$id'")->fetch_assoc();
                        $trader = $traderQuery['trader'];
                          $upliner = [];
                          for($i=0; $i<4; $i++) {
                            if($i == 0) {
                              $id = userInfo($user, $email, 'id');
                            } else {
                              $id = $upliner[$i-1];
                            }
                            $wall = runQuery("SELECT upliner, dwallet, userid, demail FROM dregister WHERE id='$id'")->fetch_assoc();
                            if($wall['upliner']) {
                              $upliner[$i] = $wall['upliner'];
                            } else {
                              break;
                            }
                          }
                          $len = count($upliner);
                        ?>

                        <ul class="list-group list-group-flush">
                        <?php if(($cat == 'Category 1') || ($cat == 'Category 2')) {
                            
                            ?>
                          <li class="list-group-item" id="expectedAmount">Expected amount: 65%</li> 
                          <li class="list-group-item" id="performanceFee">
                          <?php if(($trader == null) && $len ==0) { ?>Performance fees: 30%
                            <?php } elseif((($trader != null) && $len == 0)) { ?>Performance fees: 20%
                            <?php } elseif(($trader != null) && $len == 1) {?>Performance fees: 10%
                            <?php } elseif(($trader != null) && $len == 2) {?>Performance fees: 12%
                            <?php } elseif(($trader != null) && $len == 3) {?>Performance fees: 10.5%
                            <?php } elseif(($trader != null) && $len == 4) {?>Performance fees: 10%
                            <?php } elseif(($trader == null) && $len == 1) {?>Performance fees: 20%
                            <?php } elseif(($trader == null) && $len == 2) {?>Performance fees: 22%
                            <?php } elseif(($trader == null) && $len == 3) {?>Performance fees: 20.5%
                            <?php } else {?>Performance fees: 20%
                            <?php } ?>
                          </li> 
                          <?php if($trader) {?>
                          <li class="list-group-item" id="tradersCommission">Trader commission: 10%</li> 
                          <?php } ?>
                          <?php if($len >= 1){ ?>
                          <li class="list-group-item" id="firstUplinerCommission">
                            <?php if($len == 1) {?>
                            First up liner commission: 10%
                            <?php } else {?>
                              First up liner commission: 5%
                            <?php } ?>
                          </li>
                          <?php } ?>

                          <?php if($len >= 2){ ?>
                          <li class="list-group-item" id="secondUplinerCommission">Second up liner commission: 3%</li> 
                          <?php } ?>

                          <?php if($len >= 3){ ?>
                          <li class="list-group-item" id="thirdUplinerCommission">Third up liner commission: 1.5%</li> 
                          <?php } ?>

                          <?php if($len >= 4){ ?>
                          <li class="list-group-item" id="fourthUplinerCommission">Fourth up liner commission: 0.5%</li> 
                          <?php } ?>

                          <li class="list-group-item" id="managementFee">Management fees: 5%</li> 
                        <?php }?>
                        <?php if(($cat == 'Category 3')) {
                            
                            ?>
                          <li class="list-group-item" id="expectedAmount">Expected amount: 70%</li> 
                          <li class="list-group-item" id="performanceFee">
                            <?php if(($trader == null) && $len ==0) { ?>Performance fees: 30%
                            <?php } elseif(($trader != null) && $len == 0) { ?>Performance fees: 20%
                            <?php } elseif(($trader != null) && $len == 1) {?>Performance fees: 10%
                            <?php } elseif(($trader != null) && $len == 2) {?>Performance fees: 12%
                            <?php } elseif(($trader != null) && $len == 3) {?>Performance fees: 10.5%
                            <?php } elseif(($trader != null) && $len == 4) {?>Performance fees: 10%
                            <?php } elseif(($trader == null) && $len == 1) {?>Performance fees: 20%
                            <?php } elseif(($trader == null) && $len == 2) {?>Performance fees: 22%
                            <?php } elseif(($trader == null) && $len == 3) {?>Performance fees: 20.5%
                            <?php } else {?>Performance fees: 20%
                            <?php } ?>
                          </li> 
                          <?php if($trader) {?>
                          <li class="list-group-item" id="tradersCommission">Trader commission: 10%</li> 
                          <?php } ?>
                          <?php if($len >= 1){ ?>
                          <li class="list-group-item" id="firstUplinerCommission">
                            <?php if($len == 1) {?>
                            First up liner commission: 10%
                            <?php } else {?>
                              First up liner commission: 5%
                            <?php } ?>
                          </li>
                          <?php } ?>

                          <?php if($len >= 2){ ?>
                          <li class="list-group-item" id="secondUplinerCommission">Second up liner commission: 3%</li> 
                          <?php } ?>

                          <?php if($len >= 3){ ?>
                          <li class="list-group-item" id="thirdUplinerCommission">Third up liner commission: 1.5%</li> 
                          <?php } ?>

                          <?php if($len >= 4){ ?>
                          <li class="list-group-item" id="fourthUplinerCommission">Fourth up liner commission: 0.5%</li> 
                          <?php } ?>
                          <li class="list-group-item" id="managementFee">Management fees: 5%</li> 

                        <?php }?>
                        <?php if(($cat == 'Category 4')) {
                            
                            ?>
                          <li class="list-group-item" id="expectedAmount">Expected amount: 75%</li> 
                          <li class="list-group-item" id="performanceFee">
                            <?php if(($trader == null) && $len ==0) { ?>Performance fees: 25%
                            <?php } elseif((($trader != null) && $len == 0)) { ?>Performance fees: 15%
                            <?php } elseif(($trader != null) && $len == 1) {?>Performance fees: 5%
                            <?php } elseif(($trader != null) && $len == 2) {?>Performance fees: 7%
                            <?php } elseif(($trader != null) && $len == 3) {?>Performance fees: 5.5%
                            <?php } elseif(($trader != null) && $len == 4) {?>Performance fees: 5%
                            <?php } elseif(($trader == null) && $len == 1) {?>Performance fees: 15%
                            <?php } elseif(($trader == null) && $len == 2) {?>Performance fees: 17%
                            <?php } elseif(($trader == null) && $len == 3) {?>Performance fees: 15.5%
                            <?php } else {?>Performance fees: 15%
                            <?php } ?>
                          </li> 
                          <?php if($trader) {?>
                          <li class="list-group-item" id="tradersCommission">Trader commission: 10%</li> 
                          <?php } ?>
                          <?php if($len >= 1){ ?>
                          <li class="list-group-item" id="firstUplinerCommission">
                            <?php if($len == 1) {?>
                            First up liner commission: 10%
                            <?php } else {?>
                              First up liner commission: 5%
                            <?php } ?>
                          </li>
                          <?php } ?>

                          <?php if($len >= 2){ ?>
                          <li class="list-group-item" id="secondUplinerCommission">Second up liner commission: 3%</li> 
                          <?php } ?>

                          <?php if($len >= 3){ ?>
                          <li class="list-group-item" id="thirdUplinerCommission">Third up liner commission: 1.5%</li> 
                          <?php } ?>

                          <?php if($len >= 4){ ?>
                          <li class="list-group-item" id="fourthUplinerCommission">Fourth up liner commission: 0.5%</li> 
                          <?php } ?>

                        <?php }?>
                        <?php if(($cat == 'Category 5')) {
                            
                            ?>
                          <li class="list-group-item" id="expectedAmount">Expected amount: 80%</li> 
                          <li class="list-group-item" id="performanceFee">
                            <?php if(($trader == null) && $len ==0) { ?>Performance fees: 20%
                            <?php } elseif((($trader != null) && $len == 0)) { ?>Performance fees: 15%
                            <?php } elseif(($trader != null) && $len == 1) {?>Performance fees: 13.5%
                            <?php } elseif(($trader != null) && $len == 2) {?>Performance fees: 12%
                            <?php } elseif(($trader != null) && $len == 3) {?>Performance fees: 11%
                            <?php } elseif(($trader != null) && $len == 4) {?>Performance fees: 10%
                            <?php } elseif(($trader == null) && $len == 1) {?>Performance fees: 18.5%
                            <?php } elseif(($trader == null) && $len == 2) {?>Performance fees: 17%
                            <?php } elseif(($trader == null) && $len == 3) {?>Performance fees: 16%
                            <?php } else {?>Performance fees: 15%
                            <?php } ?>
                          </li> 
                          <?php if($trader) {?>
                          <li class="list-group-item" id="tradersCommission">Trader commission: 5%</li> 
                          <?php } ?>
                          <?php if($len >= 1){ ?>
                          <li class="list-group-item" id="firstUplinerCommission">
                            <?php if($len == 1) {?>
                            First up liner commission: 5%
                            <?php } else {?>
                              First up liner commission: 1.5%
                            <?php } ?>
                          </li>
                          <?php } ?>

                          <?php if($len >= 2){ ?>
                          <li class="list-group-item" id="secondUplinerCommission">Second up liner commission: 1.5%</li> 
                          <?php } ?>

                          <?php if($len >= 3){ ?>
                          <li class="list-group-item" id="thirdUplinerCommission">Third up liner commission: 1%</li> 
                          <?php } ?>

                          <?php if($len >= 4){ ?>
                          <li class="list-group-item" id="fourthUplinerCommission">Fourth up liner commission: 1%</li> 
                          <?php } ?>

                        <?php }?>

                      
                        </ul>
    
                      </div>
                    </div>
                    </div>
                  <?php } ?>
                    <div class="card">
                    <div class="card-body">
                      <h5>Request for withdrawal</h5>
                    <hr>
                    <form action="controller" method="post">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group"> 
                          <small class="text-danger">Minimum request for withdrawal is $<?php echo selectFire("drate", "id=1", "dminWith") ?></small>
                          <div class="input-group mb-2">
                          <div class="input-group-prepend">
                            <div class="input-group-text">$</div>
                          </div>
                          <input type="text" id="amountX" data-wallet="<?php echo userInfo($user, $email, 'dwallet')?>" data-min="<?php echo selectFire("drate", "id=1", "dminWith") ?>" name="amount" class="form-control" required id="inlineFormInputGroup" placeholder="Enter amount here">
                        </div>

                        <span class="text-danger" id="errE"></span>
                        
                        </div>
                        <div class="form-group">
                          <small class="text-danger"><b>Note:</b> Make sure your bank account details and USDT wallet address are up to date before choosing where to pay to</small>                          
                          <select name="method" required class="form-control" id="">
                            <option value="">Pay to</option>
                            <option value="bank">My Bank Account</option>
                            <option value="wallet">My USDT Address</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-12" style="text-align:right">
                        <button type="submit"  id="btnReq" name="saveRequest" class="btn btn-primary">Submit Request</button>
                      </div>
                    </div>
                    </form>
                    <hr>

                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <td>Date</td>
                          <td>Amount($)</td>
                          <td>Status</td>
                          <td>---</td>
                        </thead>
                        <tbody>
                          <?php
                          $wal = runQuery("SELECT * FROM dhistory WHERE dtype='withdraw' AND userid='$user' AND demail='$email'");
                          if(numRows($wal)>0){
                            while($wall=fetchAssoc($wal)){
                          ?>
                          <tr>
                            <td><?php echo $wall['ddate']; ?></td>
                            <td>$<?php echo number_format($wall['damount']); ?></td>
                            <td><?php echo ucfirst($wall['dstatus']); ?></td>
                            <td>
                            <?php if($wall['dstatus']=="pending"){ ?>

                              <a href="javascript:void(0)" id="canReq" data-id="<?php echo $wall['tid']; ?>" data-amount="<?php echo $wall['damount']; ?>" class="btn btn-xs btn-danger">Cancel</a>

                              <?php } ?>

                            </td>
                          </tr>
                          <?php }}else{?>
                            <tr>
                              <td colspan="4" class="text-danger">No result found</td>
                            </tr>
                          <?php } ?>
                        </tbody>
                      </table>
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
        </div>
        <!-- tap on top starts--> 
        <!-- tap on tap ends-->
        <!-- footer start-->
    <?php include 'footer.php' ?>
        
      </div>
    </div>
   
    <?php include 'script.php' ?> 
  
<script>
  $(document).ready(function(){
    var len = <?php echo $len ?>;
    if(len == 0) {
        $("#firstUplinerCommission").remove();
        $("#secondUplinerCommission").remove();
        $("#thirdUplinerCommission").remove();
        $("#fourthUplinerCommission").remove();
      } else if(len == 1) {
        $("#secondUplinerCommission").remove();
        $("#thirdUplinerCommission").remove();
        $("#fourthUplinerCommission").remove();
      } else if(len == 2) {
        $("#thirdUplinerCommission").remove();
        $("#fourthUplinerCommission").remove();
      } else {
        $("#fourthUplinerCommission").remove();
      }
      if($("#expectedAmount").length) {
        var expectedAmountContent = $("#expectedAmount").text();
        var expectedPercent = expectedAmountContent.substring(expectedAmountContent.lastIndexOf(" ")+1, expectedAmountContent.lastIndexOf("%"));
      }
      if($("#performanceFee").length) {
        var performanceFeeContent = $("#performanceFee").text();
        var performanceFeePercent = performanceFeeContent.substring(performanceFeeContent.lastIndexOf(": ")+1, performanceFeeContent.lastIndexOf("%"));
      }
      if($("#tradersCommission").length) {
        var tradersCommissionContent = $("#tradersCommission").text();
        var tradersCommissionPercent = tradersCommissionContent.substring(tradersCommissionContent.lastIndexOf(": ")+1, tradersCommissionContent.lastIndexOf("%"));
      }
      if($("#firstUplinerCommission").length) {
        var firstUplinerCommissionContent = $("#firstUplinerCommission").text();
        var firstUplinerCommissionPercent = firstUplinerCommissionContent.substring(firstUplinerCommissionContent.lastIndexOf(": ")+1, firstUplinerCommissionContent.lastIndexOf("%"));
      }
      if($("#secondUplinerCommission").length) {
        var secondUplinerCommissionContent = $("#secondUplinerCommission").text();
        var secondUplinerCommissionPercent = secondUplinerCommissionContent.substring(secondUplinerCommissionContent.lastIndexOf(": ")+1, secondUplinerCommissionContent.lastIndexOf("%"));
      }
      if($("#thirdUplinerCommission").length) {
        var thirdUplinerCommissionContent = $("#thirdUplinerCommission").text();
        var thirdUplinerCommissionPercent = thirdUplinerCommissionContent.substring(thirdUplinerCommissionContent.lastIndexOf(": ")+1, thirdUplinerCommissionContent.lastIndexOf("%"));
      }
      if($("#fourthUplinerCommission").length) {
        var fourthUplinerCommissionContent = $("#fourthUplinerCommission").text();
        var fourthUplinerCommissionPercent = fourthUplinerCommissionContent.substring(fourthUplinerCommissionContent.lastIndexOf(": ")+1, fourthUplinerCommissionContent.lastIndexOf("%"));
      }
      if($("#managementFee").length) {
        var managementFeeContent = $("#managementFee").text();
        var managementFeePercent = managementFeeContent.substring(managementFeeContent.lastIndexOf(": ")+1, managementFeeContent.lastIndexOf("%"));
      }
    $(document).on("keyup", "#amountX", function(){
      var amount = Number($("#amountX").val());
      var balance = Number($(this).attr('data-wallet'));
      var minWith = Number($(this).attr('data-min'));

      $("#errE").html("");
      $("#btnReq").prop("disabled", false);
      var isError = false;
      if(amount > balance){
        $("#btnReq").prop("disabled", true);
        $("#errE").html("Invalid amount entered");
      }
      if(amount < minWith){
        $("#btnReq").prop("disabled", true);
        $("#errE").html("Minimum request for withdrawal is $"+minWith)
      }
      if($("#expectedAmount").length) {
        var expectedAmount = amount * expectedPercent / 100;
        $("#expectedAmount").html("Expected amount: $" + expectedAmount);
      }
      if($("#performanceFee").length) {
        var performanceFee = amount * performanceFeePercent / 100;
        $("#performanceFee").html("Performance fees: $" + performanceFee);
      }
      if($("#tradersCommission").length) {
        var tradersCommission = amount * tradersCommissionPercent / 100;
        $("#tradersCommission").html("Traders commission: $" + tradersCommission);
      }
      if($("#firstUplinerCommission").length) {
        var firstUplinerCommission = amount * firstUplinerCommissionPercent / 100;
        $("#firstUplinerCommission").html("First up liner commission: $" + firstUplinerCommission);
      }
      if($("#secondUplinerCommission").length) {
        var secondUplinerCommission = amount * secondUplinerCommissionPercent / 100;
        $("#secondUplinerCommission").html("Second up liner commission: $" + secondUplinerCommission);
      }
      if($("#thirdUplinerCommission").length) {
        var thirdUplinerCommission = amount * thirdUplinerCommissionPercent / 100;
        $("#thirdUplinerCommission").html("Third up liner commission: $" + thirdUplinerCommission);
      }
      if($("#fourthUplinerCommission").length) {
        var fourthUplinerCommission = amount * fourthUplinerCommissionPercent / 100;
        $("#fourthUplinerCommission").html("Fourth up liner commission: $" + fourthUplinerCommission);
      }
      if($("#managementFee").length) {
        var managementFee = amount * managementFeePercent / 100;
        $("#managementFee").html("Management fees: $" + managementFee);
      }
    })
  })
</script>
        
  </body>
 
</html>