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
                      <p>Make a payment of <b>$<?php echo number_format($_SESSION['amount']) ?></b> to the wallet address below. Supported Network TRC20</p>
                    <?php 
                        $sql = runQuery("SELECT * FROM dsetting WHERE id=1");
                        $row = fetchAssoc($sql);
                        ?>
                    <!-- <h4>Deposit With Crypto</h4> -->
                    <hr>
                   
                 <center>
                <img style="max-width: 100%;" src="../admin/files/<?php echo $row['dimg'] ?>.jpg" alt="" ="">
                </center>
                <hr>
                <p><b>Wallet Adrress:</b> <?php echo $row['daddress'] ?></p>

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