<?php include 'head.php';
$ref = bin2hex(random_bytes(11));
 ?>
  <body>
  
    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
    <?php include 'header.php' ?>
      
    
    <?php 
            
            $bookid = clean($_GET['booking']);

            $sql = runQuery("SELECT * FROM dbookings WHERE dbookingid='$bookid'");
            if(numRows($sql)>0){
              $row = fetchAssoc($sql);

             $upload = (!is_null($row['ddelivery_photo']))? "RE-CAPTURE ITEM":"CAPTURE ITEM";
            
            ?>	

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
                      <li class="breadcrumb-item">Upload Photo</li> 
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
                     

                        <!-- Register Form-->
                        <div class="register-form mt-4 px-4 appxs">
                        <h4>Booking Image</h4>
                        <hr> 
                        <?php $img = !is_null($row['ddelivery_photo'])? $row['ddelivery_photo']:"img/default"  ?>  
                        <div class=" mb-3">
                        <a href="image/<?php echo $bookid ?>/">
                            <img style="width: 100%;" class="img-thumbnail" src="../mobile-customers/<?php echo $img ?>.jpg" alt="">
                            </a>
                        </div>
                        <?php if($row['dstatus_trip']=="pending"){ ?>

                        <form action="item-process" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="file" required name="img" capture="camera" accept="image" class="form-control-file">
                        </div>
                        <input type="hidden" name="save">
                        <input type="hidden" name="booking" value="<?php echo $bookid ?>">
                        <input type="hidden" name="img" value="<?php echo $row['ddelivery_photo']?>.jpg">

                        <button type="submit" class="btn bg-orange text-white w-100x" id="formSearchSubmit">Upload Image</button>
                        
                        </form>
                        
                        
                        <?php } ?>
                    
                
                        </div>

                      
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
    <?php } include 'footer.php' ?>
        
      </div>
    </div>
   
    <?php include 'script.php' ?>
  
    
   
  </body>
 
</html>