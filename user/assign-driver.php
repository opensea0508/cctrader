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
                      <li class="breadcrumb-item">Job Details</li> 
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php 
            
            $bookid = clean($_GET['booking']);

            $sql = runQuery("SELECT * FROM dbookings WHERE dbookingid='$bookid'");
            if(numRows($sql)>0){
              $row = fetchAssoc($sql);

              $pickupAddress = $row['dpickup_address'];
              $dropOffAddress = $row['ddropoff_address'];
              $triStatus = $row['dstatus_trip'];

              

             $upload = "Parcel Photo";
            //  $upload = (!is_null($row['ddelivery_photo']))? "Re-Capture Item":"Capture Item";
             $divCode = $row['ddriver_code'];
            
            ?>	
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="row "> 
                  <div class="col-xl-8 ">
                    <div class="card">
                      <div class="card-body">
                         
                      <div class="login-wrapper d-flex align-items-centerx justify-content-center">
                        <!-- <div class="container-fluid"> -->
                            <div class="row justify-content-center">

                            

                            <div class="col-12 ">
                    
                            <?php 

                                            echo isset($_SESSION['alert'])?$_SESSION['alert']:"";
                                            $_SESSION['alert']='';

                            if(!is_null($row['ddriver_code'])){ ?> 
                                <?php 
                                    $div = runQuery("SELECT * FROM ddrivers WHERE driver_code='$divCode'");
                                    if(numRows($div)>0){
                                        $divs = fetchAssoc($div);
                                        $driverId = $divs['driver_code'];
                                        // $image = !is_null($divs['dphoto'])? '../public/driver/'.$divs['dphoto']: "../mobile-customers/img/bg-img/user.jpg";

                                        $image = ($divs['dphoto']!="nopic.png")? '../app/public/driver/'.$divs['dphoto']: "../mobile-customers/img/bg-img/user.jpg";
                                
                                        $driveLat = $row['ddriver_latitude'];
                                        $driveLng = $row['ddriver_longitude'];
                                    ?>

                                    

                                    <!-- <hr> -->
                            <div class="origin">

                                <?php if($row['dstatus_trip']=="assigned" || $row['dstatus_trip']=="accepted"){ ?>
                                    <div class="container " >
                                        <input type="hidden" class="way_points" value="<?php echo $pickupAddress; ?>" >
                                        <input type="hidden" class="way_points" value="<?php echo getDriverAddress($driveLat, $driveLng); ?>" >
                                    </div>

                                    <div id="map"></div>
                                    <div class="origin-body"> 

                                            <div class="table-responsive shadow-smX">
                                            <table class="table">
                                                <tr>
                                                <td>
                                                <img src="<?php echo $image; ?>" style="height: 100px; width:100px; border-radius:50%; display:block;" alt="">
                                                </td>
                                                <td>
                                                <div class="mt-3">
                                                    <strong><?php echo $divs['dfname'].' '.$divs['dlname'] ?> <br>
                                                    <?php echo $divs['dphone'] ?></strong> <br>
                                                    <?php echo $divs['dride_desc'] ?> <br>
                                                    <small>

                                                    <?php

                                                    $let = runQuery("SELECT SUM(drating_points) as rate, SUM(drating_count) as tcount FROM drate WHERE ddriverid='$divCode'");
                                                    if(numRows($let)>0){
                                                    $lets = fetchAssoc($let);
                                                    $total = (INT)$lets['rate']/(INT)$lets['tcount'];
                                                    if($total == 1){?>

                                                    <i class="fa fa-star paceStart" ></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>

                                                    <?php }elseif($total==2){ ?>

                                                    <i class="fa fa-star paceStart" ></i>
                                                    <i class="fa fa-star paceStart" ></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>

                                                    <?php }elseif($total==3){?>
                                                        <i class="fa fa-star paceStart" ></i>
                                                        <i class="fa fa-star paceStart" ></i>
                                                        <i class="fa fa-star paceStart" ></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i> 
                                                        
                                                    <?php }elseif($total==4){ ?>
                                                        
                                                        <i class="fa fa-star paceStart" ></i>
                                                        <i class="fa fa-star paceStart" ></i>
                                                        <i class="fa fa-star paceStart" ></i>
                                                        <i class="fa fa-star paceStart" ></i>
                                                        <i class="fa fa-star"></i>
                                                        
                                                    <?php }elseif($total==5){ ?>
                                                        
                                                        <i class="fa fa-star paceStart" ></i>
                                                        <i class="fa fa-star paceStart" ></i>
                                                        <i class="fa fa-star paceStart" ></i>
                                                        <i class="fa fa-star paceStart" ></i>
                                                        <i class="fa fa-star paceStart" ></i>
                                                    <?php }
                                                    
                                                    }else{?>                               
                                                    <i class="fa fa-star" ></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <?php } ?>
                                                    </small>
                                                    
                                                    
                                                </div>

                                                </td>
                                                </tr>
                                                <tr>
                                                <td colspan="2">
                                                <div class="event d-flex justify-content-between">
                                                <!-- <a class="phonez btn btn-success btn-sm" href="/ph-<?php // echo $divs['dphone']; ?>"> <i class="fa fa-phone"></i> Call</a> -->
                                                    <!-- <a class="btn btn-info btn-sm" href="chat/<?php //echo $bookid; ?>/">Chat</a> -->
                                                    <a class="btn btn-danger btn-sm" data-driver="<?php echo $driverId; ?>" data-id="<?php echo $bookid; ?>" id="cancelTriped" href="javascript:void(0)">Cancel</a>
                                                    </div>
                                                </td>
                                                </tr>
                                            </table>
                                            </div>
                    
                                    </div>
                                    
                                    <?php }elseif($row['dstatus_trip']=="in-transit"){ ?>
                                    <div class="container " >
                                        <input type="hidden" class="way_points" value="<?php echo $dropOffAddress; ?>" >
                                        <input type="hidden" class="way_points" value="<?php echo getDriverAddress($driveLat, $driveLng); ?>" >
                                    </div>

                                    <div id="map"></div>
                                    <div class="origin-body">
                                    <!-- <h4><font color="#000"><b>Driver's Details </b></h4> -->
                                        
                                    

                                            <div class="table-responsive shadow-smX">
                                            <table class="table">
                                                <tr>
                                                <td>
                                                <img src="<?php echo $image; ?>" style="height: 100px; width:100px; border-radius:50%; display:block;" alt="">
                                                </td>
                                                <td>
                                                <div class="mt-3">
                                                    <strong><?php echo $divs['dfname'].' '.$divs['dlname'] ?> <br>
                                                    <?php echo $divs['dphone'] ?></strong> <br>
                                                    <?php echo $divs['dride_desc'] ?> <br>
                                                    
                                                    <small>

                                                    <?php

                                                    $let = runQuery("SELECT SUM(drating_points) as rate, SUM(drating_count) as tcount FROM drate WHERE ddriverid='$divCode'");
                                                    if(numRows($let)>0){
                                                    $lets = fetchAssoc($let);
                                                    $total = (INT)$lets['rate']/(INT)$lets['tcount'];
                                                    if($total == 1){?>

                                                    <i class="fa fa-star paceStart" ></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>

                                                    <?php }elseif($total==2){ ?>

                                                    <i class="fa fa-star paceStart" ></i>
                                                    <i class="fa fa-star paceStart" ></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>

                                                    <?php }elseif($total==3){?>
                                                        <i class="fa fa-star paceStart" ></i>
                                                        <i class="fa fa-star paceStart" ></i>
                                                        <i class="fa fa-star paceStart" ></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i> 
                                                        
                                                    <?php }elseif($total==4){ ?>
                                                        
                                                        <i class="fa fa-star paceStart" ></i>
                                                        <i class="fa fa-star paceStart" ></i>
                                                        <i class="fa fa-star paceStart" ></i>
                                                        <i class="fa fa-star paceStart" ></i>
                                                        <i class="fa fa-star"></i>
                                                        
                                                    <?php }elseif($total==5){ ?>
                                                        
                                                        <i class="fa fa-star paceStart" ></i>
                                                        <i class="fa fa-star paceStart" ></i>
                                                        <i class="fa fa-star paceStart" ></i>
                                                        <i class="fa fa-star paceStart" ></i>
                                                        <i class="fa fa-star paceStart" ></i>
                                                    <?php }
                                                    
                                                    }else{?>                               
                                                    <i class="fa fa-star" ></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <?php } ?>
                                                    </small>
                                                    
                                                </div>

                                                </td>
                                                </tr>
                                                <tr>
                                                <td colspan="2">
                                                <div class="event d-flex justify-content-between">
                                                <!-- <a class="phonez btn btn-success btn-sm" href="/ph-<?php //echo $drive['dphone']; ?>"> <i class="fa fa-phone"></i> Call</a> -->
                                                    <a class="btn btn-info btn-sm" href="javascript:void(0)">Report</a>
                                                    </div>
                                                </td>
                                                </tr>
                                            </table>
                                            </div>

                                            <!-- <hr> -->
                                        
                                    </div>
                                <?php } } ?>
                                
                                
                                    </div>


                                    <?php } ?> 



                                <?php if(!is_null($row['ddriver_code'])){
                                //check driver table for driver's phone number
                                $drive = runQuery("SELECT dphone, dlname, dfname FROM ddrivers WHERE driver_code='$divCode'")->fetch_assoc()
                                ?>
                                 
                                <?php } ?>
                                <!-- Register Form-->
                                <div class="register-form mt-4 px-4 apps">
                                <!-- <h4>Booking Summary</h4>
                                <hr> -->
                                <p> <font color="#000"><b>Receiver:</b></font> 
                                <br> <span style="font-size: 25px;"><?php echo $row['ddelivery_name']; ?></span>
                                <br> <span style="font-size: 18px;"><?php echo $row['dreceiver_phone']; ?></span>
                                </p>
                                
                                <hr>
                                <h5>Package Details</h5>
                                <hr>
                                <p> <font color="#000"><b>Parcel Description:</b></font> <?php echo $row['ddelivery_title']; ?></p>
                                <p> <font color="#000"><b>Parcel Category:</b></font> <?php echo $row['dparcel_category']; ?></p>
                                <p> <font color="#000"><b>Pick-Up Location: </b></font> <?php echo ucfirst($row['dpickup_address']); ?></p>
                                <p> <font color="#000"><b>Drop-Off Location: </b></font> <?php echo ucfirst($row['ddropoff_address']); ?></p>

                                <p> <font color="#000"><b>Distance: </b></font> <?php echo $row['dkm']; ?>km (<?php echo $row['dmin']; ?>)<br>
                                <font color="#000"><b>Pickup Date: </b></font>  <?php echo date("d M, Y", strtotime($row['dpickup_date'])); ?> (<?php echo date("h:ma", strtotime($row['dpickup_time'])); ?>)<br>
                                <font color="#000"><b>Ride: </b></font> <?php echo $row['dride_category']; ?> <br>
                                <?php if($row['dactual_fee'] != 0){ ?>
                                <font color="#000"><b>Trip Fare: </b></font>&#8358; <?php echo number_format($row['dactual_fee']); ?> <br>
                                <?php } 
                                
                                if($row['doffer_percentage']==0){
                                ?>

                                <font color="#000"><b>Estimate Fare: </b></font>&#8358; <?php echo number_format($row['destimate']); ?> <br>
                                <?php }else{
                                ?>
                                <font color="#000"><b>Actual Price: </b></font>&#8358; 
                                <?php echo number_format((INT)$row['destimate'] * ((INT)$row['doffer_percentage']/100)); ?> <br>
                                <?php }  ?>
                                <font color="#000"><b>Discount: </b></font> <?php echo number_format($row['doffer_percentage']); ?>% <br>

                                <font color="#000"><b>Trip Status: </b></font> <?php echo ucfirst($row['dstatus_trip']); ?> <br>
                                <font color="#000"><b>Payment Status: </b></font> <?php echo ucfirst($row['dstatus_payment']); ?> </p>
                                
                            
                                <hr>
                                
                                <div class="lap">  
                                <?php if($row['dstatus_trip']=="pending"){ ?>                              
                                    <u><a id="formSearchSubmitx" class=" " href="upload/<?php echo $bookid ?>/"><?php echo $upload ?></a></u> |
                                    <a href="javascript:void(0);" data-id="<?php echo $bookid; ?>" id="cancelTrip" class="">Cancel Booking</a>
                                <?php } ?>
                                </div>

                     
                                </div>
                            </div>
                            </div>
                        </div>
                        <!-- </div> -->

                        
    <div class="container mt-4" >
      <input type="hidden" value="<?php echo userInfo($token, $email, 'dlatitude') ?>" id="latt">
      <input type="hidden" value="<?php echo userInfo($token, $email, 'dlongitude') ?>" id="lngg">
    </div>
    
    <?php }  ?>

    <?php if($triStatus=="pending"){ ?>

      <script>
        $(document).ready(function(){

          setInterval(function () {
            $.ajax({
                  url: "ajax-process",
                  method: "POST",
                  data: { Message: "tracking", id: "<?php echo $bookid; ?>" },
                  success: function(data) { 
                    if(data=='yes'){
                      window.location.reload(); 
                    }
                  }
              });
        }, 3000);
          
        })
      </script>
    
    <?php }  ?>
    <!-- <script src="google-api.js"></script> -->
    
    <script async src="https://maps.googleapis.com/maps/api/js?key=<?php echo googleApiKey(); ?>&callback=initMap"></script>
                      
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
        include './mapScript.php' 
    ?>
    
     
  </body>
 
</html>