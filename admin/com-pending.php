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
                      <li class="breadcrumb-item">Pending Request</li> 
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
                     <h5>Pending Request</h5>
                     <hr>
              <div class="table-responsive">
                <table class="table">
                <thead>
                    <th>Date</th>
                    <th>Fullname</th>
                    <th>Amount($)</th>
                    <th>Status</th>
                    <th>---</th>
                </thead>
                <tbody>
                    <?php
                    $wal = runQuery("SELECT * FROM dhistory WHERE dtype='commission' AND dstatus='pending' LIMIT 50");
                    if(numRows($wal)>0){
                    while($wall=fetchAssoc($wal)){
                        $huser = $wall['userid'];
                        $hemail = $wall['demail'];
                        $dcommission = $wall['dcommission'];
                        $ddcommission = $dcommission * $wall['damount'] /100;
                    ?>
                    <tr>
                    <td><?php echo $wall['ddate']; ?></td>
                    <td><?php echo selectFire("dregister","userid='$huser' AND demail='$hemail'", "dfname"); ?></td>
                    <td><?php echo $ddcommission; ?></td>
                    <td><?php echo ucfirst($wall['dstatus']); ?></td>
                    <td>
                    <?php if($wall['dstatus']=="pending"){ ?>

                        <a href="com-details?tid=<?php echo $wall['tid']; ?>" class="btn btn-xs btn-info">Details</a>

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

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Payment Setting</h5>
            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="setting-process" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                <div class="form-group">
                    <label for="">USDT Wallet Address</label>
                    <input type="text" name="address" value="<?php echo $row['daddress'] ?>" placeholder="e.g 0x2jd5hk" id="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">USDT QR Code</label> <br>
                    <input type="file" required name="img" class="form-control-file">
                </div>
                <input type="hidden" name="himg" value="files/<?php echo $row['dimg'] ?>.jpg">
                <div class="">
                   <center>
                        <img src="files/<?php echo $row['dimg'] ?>.jpg" alt="" ="">
                   </center>
                    <p> <?php echo $row['daddress'] ?></p>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="button" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-secondary" name="saveWallet" type="submit">Save changes</button>
            </form>
            </div>
        </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModalx" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"> Setting</h5>
            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="controller" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Minimum Deposit($)</label>
                    <input type="text" name="depo" value="<?php echo selectFire("drate","id=1", "dminDepo") ?>" placeholder="e.g 1,000" id="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Minimum Withdrawal($)</label> <br>
                    <input type="text" required value="<?php echo selectFire("drate","id=1", "dminWith") ?>" name="with" class="form-control">
                </div> 
                 
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="button" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-secondary" name="saveRap" type="submit">Save changes</button>
            </form>
            </div>
        </div>
        </div>
        
  </body>
 
</html>