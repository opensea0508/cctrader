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
                          $traderQuery = runQuery("SELECT trader FROM dregister WHERE id='$id'")->fetch_assoc();
                          $trader = $traderQuery['trader'];
                        ?>

                        <ul class="list-group list-group-flush">
                          <li class="list-group-item" id="withdrawalAmount">Withdrawal amount $ </li> 
                          <li class="list-group-item" id="expectedAmount">Expected amount $</li> 
                          <li class="list-group-item" id="performanceFee">Performance fees $</li> 
                          <li class="list-group-item" id="tradersCommission">Trader commission $</li> 
                          <li class="list-group-item" id="firstUplinerCommission">First up liner commission $</li> 
                          <li class="list-group-item" id="secondUplinerCommission">Second up liner commission $</li> 
                          <li class="list-group-item" id="thirdUplinerCommission">Third up liner commission $</li> 
                          <li class="list-group-item" id="fourthUplinerCommission">Fourth up liner commission $</li> 
                          <li class="list-group-item" id="managementFee">Management fees $</li> 

                      
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
      var len = <?php echo $len ?>;
      $("#withdrawalAmount").html("Withdrawal amount $" + amount);
      $("#expectedAmount").html("Expected amount $" + (amount*0.68));
      $("#performanceFee").html("Performance fees $" + (amount*0.1));
      $("#managementFee").html("Management fees $" + (amount*0.02));
      if(len == 0) {
        $("#tradersCommission").html("Traders commission $" + (amount*0.2));
      } else if(len == 1) {
        $("#tradersCommission").html("Traders commission $" + (amount*0.1));
        $("#firstUplinerCommission").html("First up liner commission $" + (amount*0.1));
      } else if(len == 2) {
        $("#tradersCommission").html("Traders commission $" + (amount*0.1));
        $("#firstUplinerCommission").html("First up liner commission $" + (amount*0.05));
        $("#secondUplinerCommission").html("Second up liner commission $" + (amount*0.05));
      } else if(len == 3) {
        $("#tradersCommission").html("Traders commission $" + (amount*0.1));
        $("#firstUplinerCommission").html("First up liner commission $" + (amount*0.05));
        $("#secondUplinerCommission").html("Second up liner commission $" + (amount*0.03));
        $("#thirdUplinerCommission").html("Third up liner commission $" + (amount*0.2));
      } else {
        $("#tradersCommission").html("Traders commission $" + (amount*0.1));
        $("#firstUplinerCommission").html("First up liner commission $" + (amount*0.05));
        $("#secondUplinerCommission").html("Second up liner commission $" + (amount*0.03));
        $("#thirdUplinerCommission").html("Third up liner commission $" + (amount*0.015));
        $("#fourthUplinerCommission").html("Fourth up liner commission $" + (amount*0.005));
      }
    })
  })
</script>
        
  </body>
 
</html>