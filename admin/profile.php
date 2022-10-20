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