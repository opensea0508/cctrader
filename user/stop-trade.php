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
                      
                      <h4>Stop A Trade</h4>
                      <hr>
                         
                      <span class="text-danger mb-3">Note:- Request can take up to 24 trading hours to be process.</span>
                      <form action="controller" method="post">
                        <div class="form-group">
                          <label for="">Request to start a trade</label>
                          <select name="request" id="" required class="form-control">
                            <option value="">Choose Resquest</option>
                            <option value="Profitable Trades">Profitable Trades</option>
                            <option value="Losing Trades">Losing Trades</option>
                            <option value="Stop all trades">Stop all trades</option>
                          </select>
                        </div>

                        <input type="hidden" name="link" value="stop-trade">

                        <div style="text-align:right">
                          <button type="submit" name="startTrade" class="btn btn-primary">Submit Request</button>
                        </div>

                         
                      </form>

                      <hr>
                    <?php 
                    
                      $sql = runQuery("SELECT * FROM dtrade_request WHERE dtype='stop' AND userid='$user' AND demail='$email'  ORDER BY id DESC LIMIT 20");
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
                            <tr>
                            <td><?php echo date("d M, Y", strtotime($row['ddate'])) ?></td>
                            <td><?php echo $row['drequest']  ?></td>
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