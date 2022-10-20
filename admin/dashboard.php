<?php include 'head.php';
$ref = bin2hex(random_bytes(11));
?>

<body class="wide">

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
              <div class="col-6" style="text-align:right">
                <!-- <button id="sendTest" class="btn btn-primary">Margin Email Notification </button> -->
              </div>
            </div>
          </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
          <div class="row ">
            <div class="col-md-4 ">
              <div class="card ">
                <div class="card-body" onClick="window.location.href='users'">
                  <div class=" border-bottom mb-2 p-2 d-flex justify-content-between align-items-center ">
                    <span> <i class="fa fa-users fa-2x text-success"></i> </span>

                    <span><?php echo mysqli_num_rows(runQuery("SELECT * FROM dregister where dlevel='user'")) ?></span>
                  </div>
                  <h6>Manage Users</h6>

                </div>
              </div>

            </div>
            <div class="col-md-4">
              <div class="card">
                <div class="card-body" onClick="window.location.href='kyc-request'">
                  <div class=" border-bottom mb-2 p-2 d-flex justify-content-between align-items-center ">
                    <span> <i class="fa fa-recycle fa-2x text-danger"></i> </span>

                    <span><?php echo mysqli_num_rows(runQuery("SELECT * FROM dkyc WHERE dstatus='pending'")) ?></span>
                  </div>
                  <h6>KYC Request</h6>
                </div>
              </div>

            </div>
            <div class="col-md-4">
              <div class="card ">
                <div class="card-body" onClick="window.location.href='pending-verification'">
                  <div class=" border-bottom mb-2 p-2 d-flex justify-content-between align-items-center ">
                    <span> <i class="fa fa-users fa-2x text-dark"></i> </span>

                    <span><?php echo mysqli_num_rows(runQuery("SELECT * FROM dregister WHERE dvstatus='submitted'")) ?></span>
                  </div>
                  <h6>Manage Verification</h6>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card ">
                <div class="card-body" onClick="window.location.href='start-trade'">
                  <div class=" border-bottom mb-2 p-2 d-flex justify-content-between align-items-center ">
                    <span> <i class="fa fa-play fa-2x text-success"></i> </span>
                    <span><?php echo mysqli_num_rows(runQuery("SELECT * FROM dtrade_request WHERE dtype='start' and dstatus='pending'")) ?></span>
                  </div>
                  <h6>Start A Trade</h6>

                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card" onClick="window.location.href='stop-trade'">
                <div class="card-body">
                  <div class=" border-bottom mb-2 p-2 d-flex justify-content-between align-items-center ">
                    <span> <i class="fa fa-pause fa-2x text-danger"></i> </span>
                    <span><?php echo mysqli_num_rows(runQuery("SELECT * FROM dtrade_request WHERE dtype='stop' and dstatus='pending'")) ?></span>
                  </div>
                  <h6>Stop A Trade</h6>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <?php $rate = runQuery("SELECT * FROM drate WHERE id=1")->fetch_assoc() ?>
              <div class="card">
                <div class="card-body" data-bs-toggle="modal" data-bs-target="#exampleModal">
                  <div class=" border-bottom mb-2 p-2 d-flex justify-content-between align-items-center ">
                    <span> <i class="fa fa-user fa-2x text-info"></i> </span>
                    <span>&#8358;<?php echo $rate['drate'] ?>/$</span>
                  </div>
                  <h6>Dollar Rate</h6>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card ">
                <div class="card-body" onClick="window.location.href='settings'">
                  <div class=" border-bottom mb-2 p-2 d-flex justify-content-between align-items-center ">
                    <span> <i class="fa fa-cog fa-2x text-success"></i> </span>
                    <!-- <span>100,000</span> -->
                  </div>
                  <h6>Manage Settings</h6>

                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card" onClick="window.location.href='change-password'">
                <div class="card-body">
                  <div class=" border-bottom mb-2 p-2 d-flex justify-content-between align-items-center ">
                    <span> <i class="fa fa-lock fa-2x text-danger"></i> </span>
                    <!-- <span>100,000</span> -->
                  </div>
                  <h6>Change Password</h6>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card ">
                <div class="card-body" onClick="window.location.href='history'">
                  <div class=" border-bottom mb-2 p-2 d-flex justify-content-between align-items-center ">
                    <span> <i class="fa fa-user fa-2x text-info"></i> </span>
                    <span><?php echo numRows(runQuery("SELECT * FROM dtrading WHERE dstatus='pending'")) ?></span>
                  </div>
                  <h6>Trading History Request</h6>
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
          <h5 class="modal-title" id="exampleModalLabel">Dollar Rate</h5>
          <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="controller" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="form-group">
              <label for="">Dollar Rate</label>
              <input type="text" name="rate" value="<?php echo $rate['drate'] ?>" placeholder="e.g 450" id="" class="form-control">
            </div>

          </div>
          <div class="modal-footer">
            <button class="btn btn-primary" type="button" data-bs-dismiss="modal">Close</button>
            <button class="btn btn-secondary" name="saveRate" type="submit">Save changes</button>
        </form>
      </div>
    </div>
  </div>

</body>

</html>