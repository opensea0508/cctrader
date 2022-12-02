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
                  <!-- <h4>Deposit</h4>
                    <hr> -->
                  <?php

                  $id = $_GET['id'];
                  $cat = "Category " . $id;
                  $_SESSION['category'] = $cat;

                  ?>

                  <h5>Make deposit under <?php echo $cat ?></h5>
                  <hr>
                  <ul class="list-group list-group-flush">
                    <?php if ($id == 1) {
                      $min = 250
                    ?>
                      <li class="list-group-item"> Minimum Requirement $250</li>
                      <li class="list-group-item"> Top up anytime</li>
                      <li class="list-group-item"> Maximum Leverage 1.50</li>
                      <li class="list-group-item"> Instrument: - Few asset Class</li>
                      <li class="list-group-item"> Stop-out Protection 70% - 50%</li>
                      <li class="list-group-item"> Performance Fees 30%.</li>
                      <li class="list-group-item"> Management fees 5%</li>
                      <li class="list-group-item"> Minimum Duration 1Yr</li>
                      <li class="list-group-item"> Profit withdrawable anytime</li>
                      <li class="list-group-item"> Access to trading histories</li>
                      <li class="list-group-item"> Access to Monitor Room</li>
                    <?php } else if ($id == 2) {
                      $min = 5000 ?>
                        <li class="list-group-item"> Minimum Requirement $5,000</li>
                        <li class="list-group-item"> Suitable for B2I Client</li>
                        <li class="list-group-item"> Top up anytime</li>
                        <li class="list-group-item"> Maximum Leverage 1.50</li>
                        <li class="list-group-item"> Instrument: - Major assets class</li>
                        <li class="list-group-item"> Stop-out Protection 70% - 50%</li>
                        <li class="list-group-item"> Performance Fees 30%.</li>
                        <li class="list-group-item"> Management fees 5%</li>
                        <li class="list-group-item"> Minimum Duration 1Yr</li>
                        <li class="list-group-item"> Profit withdrawable anytime</li>
                        <li class="list-group-item"> Access to trading histories</li>
                        <li class="list-group-item"> Access to Monitor Room</li>
                    <?php } else if ($id == 3) {
                      $min = 20000 ?>
                        <li class="list-group-item"> Minimum Requirement $20,000</li>
                        <li class="list-group-item"> Suitable for B2B & B2I</li>
                        <li class="list-group-item"> Top up anytime</li>
                        <li class="list-group-item"> Maximum Leverage 1.30</li>
                        <li class="list-group-item"> Instrument: - All assets Class</li>
                        <li class="list-group-item"> Stop-out Protection 70% - 50%</li>
                        <li class="list-group-item"> Performance Fees 30%.</li>
                        <li class="list-group-item"> Management fees 5%</li>
                        <li class="list-group-item"> One Personal account Manager</li>
                        <li class="list-group-item"> Minimum Duration 1Yr</li>
                        <li class="list-group-item"> Profit withdrawable anytime</li>
                        <li class="list-group-item"> Access to trading histories</li>
                        <li class="list-group-item"> Access to Monitor Room</li>
                    <?php } else if ($id == 4) {
                      $min = 100000 ?>
                        <li class="list-group-item"> Minimum Requirement $100,000</li>
                        <li class="list-group-item"> Suitable for B2B & B2I</li>
                        <li class="list-group-item"> Maximum Leverage 1.30</li>
                        <li class="list-group-item"> Instrument: - All assets class</li>
                        <li class="list-group-item"> Stop-out Protection 70% - 50%</li>
                        <li class="list-group-item"> Performance Fees 25%.</li>
                        <li class="list-group-item"> No management fees</li>
                        <li class="list-group-item"> 3 Personal account Managers</li>
                        <li class="list-group-item"> Minimum Duration 1Yr</li>
                        <li class="list-group-item"> Profit withdrawable anytime</li>
                        <li class="list-group-item"> Access to trading histories</li>
                        <li class="list-group-item"> Access to Monitor Room</li>
                    <?php } else if ($id == 5) {
                      $min = 100000 ?>
                        <li class="list-group-item"> Minimum Requirement $100,000</li>
                        <li class="list-group-item"> Suitable for B2B</li>
                        <li class="list-group-item"> Top up anytime</li>
                        <li class="list-group-item"> Maximum Leverage 1.50</li>
                        <li class="list-group-item"> Instrument: - All assets Class</li>
                        <li class="list-group-item"> Stop-out Protection 70% - 50%</li>
                        <li class="list-group-item"> Performance Fees 20%.</li>
                        <li class="list-group-item"> No Management fees</li>
                        <li class="list-group-item"> 5 Personal account Managers</li>
                        <li class="list-group-item"> Minimum Duration 1Yr</li>
                        <li class="list-group-item"> Profit withdrawable anytime</li>
                        <li class="list-group-item"> Access to trading histories</li>
                        <li class="list-group-item"> Access to Monitor Room</li>
                    <?php } else if ($id == 6) {
                      $min = 1 ?>
                        <li class="list-group-item"> Minimum Purchase 1 Gram</li>
                        <li class="list-group-item"> 99.9% Purity </li>
                        <li class="list-group-item"> Minimum amount $100</li>
                        <li class="list-group-item"> Minimum Deliverable 50 Gram</li>
                        <li class="list-group-item"> Commission 5%</li>
                    <?php } ?>
                  </ul>
                  <hr>
                  <h5>Method of Payment</h5>
                  <hr>
                  <h6>Pay with Paystack</h6>

                  <div class="mt-2">
                    <form id="paymentForm">
                      <input type="hidden" value="<?php echo userInfo($user, $email, 'demail') ?>" id="email-address" />
                      <input type="hidden" value="<?php echo $rate['drate'] ?>" id="rate" />
                      <input type="hidden" value="" id="amount" />
                      <input type="hidden" value="" id="rand" />
                      <div class="form-group">
                        <!-- <label for="amount"><b style="color:#000">Enter Amount</b></label> -->
                        <label for="amount"><b style="color:#000">Enter Amount (<?php echo $rate['drate'] ?>/$)</b></label>
                        <input type="tel" placeholder="Enter amount e.g 500" id="current" class="form-control mt-2" data-min="<?php echo $min ?>" required />
                        <?php if($min > 1) {?>
                        <small>Minimum($<?php echo $min ?>)</small>
                        <?php } else { ?>
                          <small>Minimum($100)</small>
                        <?php } ?>
                        <div class="text-danger" id="err"></div>
                      </div>
                      <div class="text-center">
                        <button type="submit" id="btnPay" class="btn text-center btn-block w-100 btn-success" onclick="payWithPaystack()"> Make Payment </button>
                      </div>
                    </form>
                  </div>
                  <hr>

                  <div class="mt-4">
                    <h5>Pay with Crypto</h5>
                    <form action="controller" method="POST">
                      <div class="form-group">
                        <label for="amount"><b style="color:#000">Enter Amount </b></label>
                        <input type="tel" name="amount" placeholder="Enter amount e.g 500" id="currentx" class="form-control mt-2" data-min="<?php echo $min ?>" required />
                        <?php if($min > 1) {?>
                        <small>Minimum($<?php echo $min ?>)</small>
                        <?php } else { ?>
                          <small>Minimum($100)</small>
                        <?php } ?>
                        <div class="text-danger" id="errx"></div>
                      </div>

                      <div class="text-center">
                        <button type="submit" id="btnPayx" name="saveCrypto" class="btn text-center btn-block w-100 btn-info"> Make Payment </button>
                      </div>
                    </form>
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