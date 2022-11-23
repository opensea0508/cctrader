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
                      <li class="breadcrumb-item">All Traders</li> 
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
                      
                      <h4>Assign Trander</h4> 

                      <hr>
                    <?php 
                    
                      $sql = runQuery("SELECT * FROM dregister WHERE dlevel='user' AND isTrader=1 ORDER BY id DESC LIMIT 200");
                      if(numRows($sql)>0){
                    ?>
                      <div class="table-responsive" style="min-height: 250px;">
                        <table class="table">
                          <tr>
                            <th>Date</th>
                            <th>Fullname</th>
                            <th>Phone</th>
                            <th>Country</th>
                            <th>Status</th>
                            <th>---</th>
                          </tr>

                          <?php while($row=fetchAssoc($sql)){?>
                            <tr>
                            <td><?php echo date("d M, Y", strtotime($row['ddate'])) ?></td>  
                            <td><?php echo $row['dfname']  ?></td>
                            <td><?php echo $row['dphone']  ?></td>
                            <td><?php echo $row['dcountry']  ?></td>
                            <td><?php echo ucfirst($row['dstatus'])  ?></td>
                            <td>
                            <a class="btn btn-primary btn-sm" data-id="<?php echo $row['id']  ?>" data-email="<?php echo $_GET['email']  ?>" data-userid="<?php echo $_GET['userid']?>" data-status="client1" id="setTrader"> SET</a>
                            </td>
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