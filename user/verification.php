<?php include 'head.php';
$ref = bin2hex(random_bytes(11));
 ?>
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
                      <li class="breadcrumb-item">Verification</li> 
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
           	
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="row "> 
                  <div class="col-xl-8 ">
                    <div class="card">
                      <div class="card-body">
                        <h3>ACCOUNT VERIFICATION</h3>
                        <hr>
                        <p>
                          <b>Fullname</b> : <?php echo userInfo($user, $email,'dfname') ?> <br>
                          <b>Verification Status</b> : <?php echo ucfirst(userInfo($user, $email,'dvstatus')) ?> 
                        </p>
                        <hr>

                        <?php if(userInfo($user, $email,'dvstatus')=="pending" || userInfo($user, $email,'dvstatus')=="Rejected"){ ?>
                        <form method="post" action="controller" enctype="multipart/form-data">
								 
											   <p style="color:#FF0000">Note: accepted file formats: .jpg, .png</p>
											   <p>*Utility Bill or Bank Statement:
											   <input type="file" name="img" class="form-control" required>
											   <input type="hidden" name="himg" value="files/<?php echo userInfo($user, $email,'dutility') ?>.jpg">
											   <input type="hidden" name="himg1" value="files/<?php echo userInfo($user, $email,'dfront') ?>.jpg">
											   <input type="hidden" name="himg2" value="files/<?php echo userInfo($user, $email,'dback') ?>.jpg">
											   </p>
											   
											   <p>*Government Issued ID:
											   <input type="file" name="img1" class="form-control" required>
											   </p>
								
												<p>Government Issued ID (Back - For National ID or Drivers Licence holders):
											   <input type="file" name="img2" class="form-control">
											   </p>
											   
											   
											   
										<br />
									<div style="text-align:right">
                  <button type="submit" name="upDocs" class="btn btn-primary">Upload Documents</button>
                  </div>
									
									</form><hr>
                    <?php } ?>
                  <div class="">
                    <center>
                      <?php if(!is_null(userInfo($user, $email,'dutility'))){ ?>
                        
                        <p>
                          <img src="files/<?php echo userInfo($user, $email,'dutility') ?>.jpg" alt="">
                        </p>
                        <?php }  if(!is_null(userInfo($user, $email,'dfront'))){ ?>
                        <p>
                          <img src="files/<?php echo userInfo($user, $email,'dfront') ?>.jpg" alt="">
                        </p>

                        <?php }  if(!is_null(userInfo($user, $email,'dback'))){ ?>
                        <p>
                          <img src="files/<?php echo userInfo($user, $email,'dback') ?>.jpg" alt="">
                        </p>
                        <?php } ?>
                    </center>
                  </div>
                     
                      </div>
                    </div>
                  </div>


                  <div class="col-md-4">
                      <?php include 'asider.php' ?>
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
   
    <?php     
        include 'script.php';  
    ?>
    
     
  </body>
 
</html>