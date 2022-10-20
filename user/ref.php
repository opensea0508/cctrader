<?php include 'head.php';
$ref = bin2hex(random_bytes(11));
$reff = userInfo($user, $email,'drefCode');
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
                      
                      <h4>Partnership</h4>
                      <hr>
                         <p>
                         Our partnership program is designed for experienced business leaders, as an independent consultant, you drive your goal to your financial freedom. Earn 10% commission from every Profitable trade close under your client base
                         </p>
                         <p><b>Refferal Link:</b> </p>
                            <input type="text" class="form-control" id="btc" value="https://www.ccitraders.com?ref=<?php echo $reff ?>">
                                <hr>
                    <?php 
                    
                      $sql = runQuery("SELECT * FROM dregister WHERE dreferral='$reff' ORDER BY id DESC LIMIT 200");
                      if(numRows($sql)>0){
                    ?>
                      <div class="table-responsive">
                        <table class="table">
                          <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                          </tr>

                          <?php while($row=fetchAssoc($sql)){?>
                            <tr>
                            <td><?php echo $row['dfname']  ?></td>
                            <td><?php echo $row['demail']  ?></td>
                            <td><?php echo $row['dphone']  ?></td>
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