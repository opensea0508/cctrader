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
              <div class="col-xl-9 xl-60">
                <div class="row">
                  <div class="col-xl-12 col-sm-6">
                    <div class="card">
                      <div class="card-body">
                      <h4> Trade Monitor</h4>
                      <hr>
                      <p>
                      You may keep tabs on a variety of account metrics, including your current balance, margin, leverage, equity, and open trades, in our trade monitoring station. Using the trade monitor station to open a position will result in an invalid position that will not be covered by our Liquidity. Losses will be your responsibility, even if the position closes with a profit <br><br>
                      To access our trade watch station, you will need the account that was sent to your email box.
                      </p>
                      

                      <hr>
                    <?php 
                    
                      $sql = runQuery("SELECT * FROM dtrade_request WHERE dtype='start' AND userid='$user' AND demail='$email' ORDER BY id DESC LIMIT 20");
                      if(numRows($sql)>0){
                    ?>
                      <div class="table-responsive">
                        <table class="table">
                          <tr>
                            <th>Date</th>
                            <th>Request</th>
                            <th>Status</th>
                          </tr>

                          <?php while($row=fetchAssoc($sql)){?>
                            <td><?php echo date("d M, Y", strtotime($row['ddate'])) ?></td>
                            <td><?php echo $row['drequest']  ?></td>
                            <td><?php echo $row['dstatus']  ?></td>
                            <?php } ?>



                        </table>
                      </div>

                      <?php } ?>








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
        <!-- tap on tap ends-->
        <!-- footer start-->
    <?php include 'footer.php' ?>
        
      </div>
    </div>
   
    <?php include 'script.php' ?> 


        
  </body>
 
</html>