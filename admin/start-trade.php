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
                      <li class="breadcrumb-item">Trade</li> 
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
                <div class="row">
                  <div class="col-xl-12 col-sm-6">
                    <div class="card">
                      <div class="card-body">
                      
                      <h4>Start A Trade</h4> 

                      <hr>
                    <?php 
                    
                      $sql = runQuery("SELECT * FROM dtrade_request WHERE dtype='start' ORDER BY id DESC LIMIT 200");
                      if(numRows($sql)>0){
                    ?>
                      <div class="table-responsive">
                        <table class="table">
                        <tr>
                            <th>Date</th>
                            <th>Position</th>
                            <th>Buy</th>
                            <th>Sell</th>
                            <th>Instrument</th>
                            <th>Stop Lose Price</th>
                            <th>Take Profit Price</th>
                            <th>Order Type</th>
                            <th>Price</th>
                            <th>Status</th>
                          </tr>

                          <?php while($row=fetchAssoc($sql)){?>
                            <tr>
                            <td><?php echo date("d M, Y", strtotime($row['ddate'])) ?></td>
                            <td><?php echo $row['dposition']  ?></td>
                            <td><?php echo $row['dbuy']  ?></td>
                            <td><?php echo $row['dsell']  ?></td>
                            <td><?php echo $row['dinstrument']  ?></td>
                            <td><?php echo $row['dstop']  ?></td>
                            <td><?php echo $row['dprofit']  ?></td>
                            <td><?php echo $row['drequest']  ?></td>
                            <td><?php echo $row['dprice']  ?></td>
                            <td><?php echo $row['dstatus']  ?></td>
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