<?php include 'head.php' ?>

  <body>
     
    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
      <!-- Page Header Start-->
    <?php include 'header.php' ?>
      
      <!-- Page Header Ends                              -->
      <!-- Page Body Start-->
      <div class="page-body-wrapper sidebar-icon">
        <!-- Page Sidebar Start-->
      <?php include 'aside.php' ?>

        
        <!-- Page Sidebar Ends-->
        <div class="page-body">
          <div class="container-fluid">
            <div class="page-header">
              <div class="row">
                <div class="col-sm-6">
                  <h3>Edit Profile</h3>
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="home"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Users</li>
                    <li class="breadcrumb-item active">Edit Profile</li>
                  </ol>
                </div>
                 
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="edit-profile">
              <div class="row">
                <div class="col-xl-4">
                <?php echo isset($_SESSION['msg'])? $_SESSION['msg']: '' ?>
                  <div class="card">
                     
                    <div class="card-body">    
                      <?php //echo isset($_SESSION['msg'])? $_SESSION['msg']:"" ?>                  
                        <div class="row mb-2">
                          <div class="profile-title">
                            <div class="media">
                             
                              <div class="media-body text-center">
                                <h3 class="mb-1 f-20 txt-primary"><?php echo userInfo($user, $email, 'dfname') ?></h3>
                                <p><?php echo userInfo($user, $email, 'dphone')  ?> <br> <?php echo userInfo($user, $email, 'demail')  ?></p>
                              </div>
                            </div>
                          </div>
                        </div>
                       
 

                      <h6>Update Bank Details</h6>
                      <hr>

                      <form action="controller" method="post">
                        <div class="form-group">
                          <label for="">Account Name</label>
                          <input type="text" name="name" value="<?php echo userInfo($user, $email, 'daccName')  ?>" placeholder="Enter Account Name" required class="form-control">
                        </div>

                        <div class="form-group">
                          <label for="">Account Nunmber</label>
                          <input type="text" value="<?php echo userInfo($user, $email, 'daccNum')  ?>" name="number" placeholder="Enter Account Nunmber" required class="form-control">
                        </div>

                        <div class="form-group">
                          <label for="">Bank Name</label>
                          <input type="text" value="<?php echo userInfo($user, $email, 'dbank')  ?>" name="bank" placeholder="Bank Name" required class="form-control">
                        </div>

                        <div class="form-group">
                          <label for="">Country</label>
                          <input type="text" value="<?php echo userInfo($user, $email, 'dcountry')  ?>" name="country" placeholder="Country" required class="form-control">
                        </div>

                        <div class="form-group">
                          <label for="">Sort Code</label>
                          <input type="text" value="<?php echo userInfo($user, $email, 'dsort')  ?>" name="sort" placeholder="Sort Code" required class="form-control">
                        </div>

                        <div class="form-footer">
                          <button name="saveBank" class="btn btn-primary w-100 btn-block">Save</button>
                        </div>
                      </form>


                    </div>
                  </div>
                </div>
                <div class="col-xl-8">
                  <form class="card" action="controller" method="POST">
                    <div class="card-header pb-0">
                      <h4 class="card-title mb-0">Edit Profile</h4>
                      <div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                    </div>
                    <div class="card-body">
                      <div class="row">
                         
                        <div class="col-sm-6 col-md-6">
                          <div class="mb-3">
                            <label class="form-label">First Name</label>
                            <input class="form-control" required name="fname" value="<?php echo userInfo($user, $email, 'dfname')  ?>" type="text" placeholder="First Name">
                          </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                          <div class="mb-3">
                            <label class="form-label">Phone Number</label>
                            <input class="form-control" name="phone" value="<?php echo userInfo($user, $email, 'dphone')  ?>" type="text" required placeholder="Phone Number">
                          </div>
                        </div>
                        
                        <div class="col-sm-6 col-md-6">
                          <div class="mb-3">
                            <label class="form-label">City</label>
                            <input class="form-control" type="text" required name="city" value="<?php echo userInfo($user, $email, 'dcity')  ?>" placeholder="City">
                          </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                          <div class="mb-3">
                            <label class="form-label">State</label>
                            <input class="form-control" name="state" required value="<?php echo userInfo($user, $email, 'dstate')  ?>" type="text" placeholder="State">
                          </div>
                        </div>
                         
                        <div class="col-md-12">
                          <div class="mb-3">
                            <label class="form-label">Address</label>
                            <input class="form-control" name="address" required value="<?php echo userInfo($user, $email, 'daddress')  ?>" type="text" placeholder="Address">
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="mb-3">
                            <label class="form-label">Wallet Address (USDT Recommended)</label>
                            <input class="form-control" name="waddress" required value="<?php echo userInfo($user, $email, 'dwalletAddress')  ?>" type="text" placeholder="•	Wallet Address (USDT Recommended)">
                          </div>
                        </div>
 
  
                      </div>
                    </div>
                    <div class="card-footer text-end pt-0">
                      <button class="btn btn-primary" name="saveProf" type="submit">Update Profile</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid Ends-->
        </div>
        <!-- footer start-->
        <?php include 'footer.php' ?>

      </div>
    </div>
    <!-- latest jquery-->
    <?php include 'script.php' ?>

    <!-- login js-->
    <!-- Plugin used-->
  </body>

<!-- Mirrored from admin.pixelstrap.com/wingo/theme/edit-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Apr 2022 11:02:08 GMT -->
</html>