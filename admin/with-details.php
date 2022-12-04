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
                      <li class="breadcrumb-item">Request Details</li> 
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="row ">
              <div class="col-xl-12">

             <div class="card">
                 <div class="card-body">
                     <h5>Request Details</h5>
                     <hr>
              <div class="table-responsive">
                <table class="table">
                <style>
                    th{
                        font-weight: bold !important;
                    }
                </style>
                <tbody>
                    <?php
                    $tid = clean($_GET['tid']);
                    $expectedAmount = clean($_GET['expectedAmount']);
                    $category = clean($_GET['category']);
                    $wal = runQuery("SELECT * FROM dhistory WHERE dtype='withdraw' AND tid='$tid'");
                    if(numRows($wal)>0){
                    $wall=fetchAssoc($wal);
                        $huser = $wall['userid'];
                        $hemail = $wall['demail'];
                        $status = $wall['dstatus'];
                    ?>
                    <tr>
                        <th>Date</th>
                        <td><?php echo $wall['ddate']; ?></td>
                    </tr>

                    <tr>
                        <th>Fullname</th>
                        <td><?php echo selectFire("dregister","userid='$huser' AND demail='$hemail'", "dfname"); ?></td>
                    </tr>
                    <tr>
                        <th>Phone</th>
                        <td><?php echo selectFire("dregister","userid='$huser' AND demail='$hemail'", "dphone"); ?></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td><?php echo selectFire("dregister","userid='$huser' AND demail='$hemail'", "demail"); ?></td>
                    </tr>

                    <tr>
                        <th>Category</th>
                        <td><?php echo $category; ?></td>
                    </tr>

                    <tr>
                        <th>Withdraw Amount</th>
                        <td>$<?php echo number_format($wall['damount']); ?></td>
                    </tr>

                    <tr>
                        <th>Expected Amount</th>
                        <td>$<?php echo $expectedAmount; ?></td>
                    </tr>

                    <tr>
                        <th colspan="2" class="text-center">Pay To</th>
                    </tr>

                    <?php if($wall['dpay']=='wallet'){ ?>
                    <tr>
                        <th>USDT Wallet Address</th>
                        <td> <?php echo selectFire("dregister","userid='$huser' AND demail='$hemail'", "dwalletAddress"); ?></td>
                    </tr>
                    <?php }else{ ?>
                        <tr>
                            <th>Account Details</th>
                            <td>
                                <b>Account Name:</b> <?php echo selectFire("dregister","userid='$huser' AND demail='$hemail'", "daccName"); ?><br>
                                <b>Account Number:</b> <?php echo selectFire("dregister","userid='$huser' AND demail='$hemail'", "daccNum"); ?><br>
                                <b>Bank:</b> <?php echo selectFire("dregister","userid='$huser' AND demail='$hemail'", "dbank"); ?><br>
                            </td>

                        </tr>
                    <?php } ?>

                    <tr>
                        <th>Status</th>
                        <td><?php echo ucfirst($wall['dstatus']); ?></td>                     
                    </tr>

                    <?php }else{?>
                    <tr>
                        <td colspan="4" class="text-danger">No result found</td>
                    </tr>
                    <?php } ?>
                </tbody>
                </table>
                
            </div>
            <div style="text-align:right" class="mt-3">
                    <?php if($status =="pending"){ ?>
                    <a href="javascript:void(0)" id="canReq" 
                    data-id="<?php echo $wall['tid']; ?>" 
                    data-user="<?php echo $wall['userid']; ?>" 
                    data-email="<?php echo $wall['demail']; ?>" 
                    data-amount="<?php echo $wall['damount']; ?>" 
                    class="btn  btn-danger">Mark As Cancel</a>

                    <a href="javascript:void(0)" id="paidReq" data-id="<?php echo $wall['tid']; ?>"data-user="<?php echo $wall['userid']; ?>" data-email="<?php echo $wall['demail']; ?>" data-amount="<?php echo $wall['damount']; ?>" class="btn  btn-primary"> Mark As Paid</a>
                    <?php } ?>

                </div>
            </div>
             </div>
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

   
        
  </body>
 
</html>