<?php include 'head.php' ?>
  <body>
  
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
                      <li class="breadcrumb-item">Change Password</li> 
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid ">
            <div class="row ">
                              
              <div class="col-md-7 m-auto">
                <div class="card ">
                   
                  <div class="card-body">
                    
                    <form class="theme-form login-form" method="post" action="change-password-process">
                     <?php echo isset($_SESSION['msg'])? $_SESSION['msg']: '' ?>
                      <h4 class="mb-3">Create Your Password</h4>
                      <div class="form-group">
                        <label>Current Password</label>
                        <div class="input-group"><span class="input-group-text"><i class="text-orange fa fa-lock"></i></span>
                          <input class="form-control" type="password" name="old" required="" placeholder="*********"> 
                        </div>
                      </div>

                      <div class="form-group">
                        <label>New Password</label>
                        <div class="input-group"><span class="input-group-text"><i class="text-orange fa fa-lock"></i></span>
                          <input class="form-control" type="password" name="pass" required="" placeholder="*********">
                        </div>
                      </div>

                      <div class="form-group">
                        <label>Confirm Password</label>
                        <div class="input-group"><span class="input-group-text"><i class="text-orange fa fa-lock"></i></span>
                          <input class="form-control" type="password" name="cpass" required="" placeholder="*********">
                        </div>
                      </div>
                       
                      <div class="form-group">
                        <button name="change" class="btn border-orange btn-primary btn-block w-100 bg-orange" type="submit">Done</button>
                      </div> 
                    </form>
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid Ends-->
        </div>
        <!-- tap on top starts-->
        <div class="tap-top"><i class="icon-control-eject"></i></div>
        <!-- tap on tap ends-->
        <!-- footer start-->
    <?php include 'footer.php' ?>
<?php if(isset($_SESSION['msg'])){ unset($_SESSION['msg']);} ?>
        
      </div>
    </div>
   
    <?php include 'script.php' ?>
  </body>
 
</html>