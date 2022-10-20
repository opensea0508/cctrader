<?php include 'head.php';
$ref = bin2hex(random_bytes(11));
 ?>
  <body>
  
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
                      <li class="breadcrumb-item">Trading History</li> 
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="row learning-block">
              <div class="col-xl-9 xl-60">
                <div class="row">
                  <div class="col-xl-12 col-sm-6">
                    <div class="card">
                      <div class="card-body">
                        <?php echo isset($_SESSION['msg'])?$_SESSION['msg']:"" ?>
                         <h4>Trading History</h4>
                         <hr> 
                         <form action="controller" method="post">
                           <small>Send a request to the admin for trading history</small>
                           <div class="row">
                             <div class="col-md-6">
                               <div class="form-group">
                                 <label for="">From</label>
                                 <input type="date" name="from" required value="<?php echo date("Y-m-d", strtotime("-7 days")) ?>" id="" class="form-control">
                               </div>
                             </div>
                             <div class="col-md-6">
                               <div class="form-group">
                                 <label for="">To</label>
                                 <input type="date" name="to" max="<?php echo date('Y-m-d') ?>" required value="<?php echo date('Y-m-d') ?>" id="" class="form-control">
                               </div>
                             </div>
                             <div class="col-md-12">
                               <button type="submit" name="saveTradeReq" class="btn btn-primary w-100">Submit Request</button>
                              </div>
                           </div>
                         </form>
<hr>
                         <div class="table-responsive">
                           <table class="table">
                              <thead>
                                <th>From</th>
                                <th>To</th>
                                <th>File</th>
                                <th>--</th>
                              </thead>
                              <tbody>
                                <?php $sql = runQuery("SELECT * FROM dtrading WHERE userid='$user' AND demail='$email' ORDER BY id DESC LIMIT 10 ");
                                if(numRows($sql)>0){
                                  while($row=fetchAssoc($sql)){
                                    $file = $row['dfile'] !=''?'<a href="../admin/files/'.$row['dfile'].'" download>Download File</a>':"";
                                     ?>
                                <tr>
                                  <td><?php echo $row['dfrom'] ?></td>
                                  <td><?php echo $row['dto'] ?></td>
                                  <td><?php echo $file ?></td>
                                  <td><?php echo $row['dstatus'] ?></td>
                                </tr>
                                <?php }} else{ ?>
                                  <tr>
                                    <td colspan="5" class="text-danger">No request found!</td>
                                  </tr>
                                <?php }?>
                              </tbody>
                           </table>
                         </div>
                       
                      
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
        </div>
        <!-- tap on top starts-->
        <div class="tap-top"><i class="icon-control-eject"></i></div>
        <!-- tap on tap ends-->
        <!-- footer start-->
    <?php include 'footer.php' ?>
        
      </div>
    </div>
   
    <?php include 'script.php'; if(isset($_SESSION['msg'])){ unset($_SESSION['msg']); } ?>
    
   
  </body>
 
</html>