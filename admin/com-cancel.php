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
                      <li class="breadcrumb-item">Cancelled Request</li> 
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
                     <h5>Cancelled Request</h5>
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
                    $wal = runQuery("SELECT * FROM dhistory WHERE dtype='commission' AND dstatus='Cancelled' ORDER BY id DESC LIMIT 150");
                    if(numRows($wal)>0){
                    while($wall=fetchAssoc($wal)){
                        $huser = $wall['userid'];
                        $hemail = $wall['demail'];
                    ?>
                    <tr>
                    <td><?php echo $wall['ddate']; ?></td>
                    <td><?php echo selectFire("dregister","userid='$huser' AND demail='$hemail'", "dfname"); ?></td>
                    <td><?php echo $wall['damount']; ?></td>
                    <td><?php echo ucfirst($wall['dstatus']); ?></td>
                    <td>

                        <a href="com-details?tid=<?php echo $wall['tid']; ?>" class="btn btn-xs btn-info">Details</a>


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
 
        
  </body>
 
</html>