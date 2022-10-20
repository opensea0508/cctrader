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
                      <li class="breadcrumb-item">Booking</li> 
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
                       
                      <div class="register-form  app">
                                <!-- <h4>Deliver A Package</h4> -->
                                
                                
                                
                            <?php 


                                $idx = clean($_GET['id']);
                                $sqlx = runQuery("SELECT * FROM dsettings_categories WHERE dcategoryid='$idx' ORDER BY id ASC");
                                if($sqlx->num_rows>0){ $num = 1;
                                    while($row=fetchAssoc($sqlx)){
                                        //check the user enable currency
                                        $codeId = $row['dcategoryid'];
                                        $code = $row['dcategory'];
                                        $id = $row['id'];?>

                                

                                    <div class="d-flexm shadow-sm p-3 mt-2 align-content-center " style="border: 1px solid #eee;">
                                        <center>
                                        <img style="max-height: 100px;" src="../mobile-customers/webcontrol/icons/<?php echo $row['dicons1']; ?>.png" alt="">
                                        </center>
                                        <div class="contentv text-center">
                                            <h3><?php echo $code; ?></h3>
                                            <p>Carrriage size:  <?php echo $row['dsize']; ?></p>
                                        </div>

                                    </div>

                                    
                                    <?php  $num++;  } } ?>
                    
                                <hr>
                                        <form name="f123" method="post" action="book-ride-process"> 
                                        <input type="hidden" name="id" value="<?php echo $idx; ?>" />
                                        <!-- <input type="hidden" name="status" value="<?php //echo $_GET['status']; ?>" /> -->
                                    
                                        <div class="row row-inputs">
                                                <!-- <div class="container-fluid"> -->

                                                    <div class="form-group mt-2">
                                                        <label for="formSearchUpDate"><font color="#000"><b>Sender's Name?</b></font></label>
                                                        <input type="text" name="sname" required placeholder="Sender's Name" id="" class="form-control mt-2 form-field" value="<?php echo userInfo($token, $email, 'dfname') ?>">
                                                    </div>

                                                    <div class="form-group mt-2">
                                                        <label for="formSearchUpDate"><font color="#000"><b>Sender's Phone?</b></font></label>
                                                        <input type="number" step="all" name="sphone" required placeholder="Sender's Phone" id="" class="form-control mt-2 form-field" value="<?php echo userInfo($token, $email, 'dphone') ?>">
                                                    </div>

                                                    <div class="form-group mt-2">
                                                        <label for="formSearchUpDate"><font color="#000"><b>Reciever's Name?</b></font></label>
                                                        <input type="text" name="rname" required placeholder="Receiver's Name" id="" class="form-control mt-2 form-field">
                                                    </div>

                                                    <div class="form-group mt-2">
                                                        <label for="formSearchUpDate"><font color="#000"><b>*Receiver's Phone</b></font></label>
                                                        <input type="number" step="all" name="rphone" required placeholder="Receiver's Phone" id="" class="form-control mt-2 form-field">
                                                    </div>

                                                    <div class="form-group mt-2">
                                                        <label for="formSearchUpDate"><font color="#000"><b>*Parcel Category</b></font></label>
                                                        <select name="pcategory" id="" class="form-control mt-1 form-field">
                                                        <option value="">Choose Parcel Category</option>
                                                        <?php 
                                                        $pal = runQuery("SELECT * FROM `dpacel_category` ORDER BY dname ASC");
                                                        if(numRows($pal)>0){
                                                            while($pals=fetchAssoc($pal)){?>
                                                            <option value="<?php echo $pals['dname'] ?>"><?php echo $pals['dname'] ?></option>

                                                        <?php  } } ?>
                                                        </select>
                                                    </div>
                                                
                                                    <div class="form-group has-icon has-label ui-widget">
                                                        <label for="txtSourcem"><font color="#000"><b>*Parcel Description</b></font></label>
                                                        <textarea name="desc" class="form-control mt-2 form-field" style="min-height: 60px !important;" id="" placeholder="Delivery note here..." required></textarea>
                                                
                                                    </div>

                                                    <div class="form-group mt-2">
                                                        <label for="formSearchUpDate"><font color="#000"><b>Weight(kg)</b></font></label>
                                                        <input type="number" step="all" name="weight" placeholder="Weight (optional)" id="" class="form-control mt-2 form-field">
                                                    </div>

                                                    <div class="form-group mt-2">
                                                        <label for="formSearchUpDate"><font color="#000"><b>Length(cm)</b></font></label>
                                                        <input type="number" step="all" name="length" placeholder="Length (optional)" id="" class="form-control mt-2 form-field">
                                                    </div>

                                                    <div class="form-group mt-2">
                                                        <label for="formSearchUpDate"><font color="#000"><b>Bredth(cm)</b></font></label>
                                                        <input type="number" step="all" name="bredth" placeholder="Bredth (optional)" id="" class="form-control mt-2 form-field">
                                                    </div>

                                                    <div class="form-group mt-2">
                                                        <label for="formSearchUpDate"><font color="#000"><b>Height(cm)</b></font></label>
                                                        <input type="number" step="all" name="height" placeholder="Height (optional)" id="" class="form-control mt-2 form-field">
                                                    </div>



                                                    <div class="form-group mt-2">
                                                        <label for="formSearchUpDate"><font color="#000"><b>*No of Persenger</b></font></label>
                                                        <select name="persenger" id="" required class="form-control mt-1">
                                                        <!-- <option value="">No of Persenger</option> -->
                                                        <?php  
                                                            for($i=0; $i<=10; $i++){?>
                                                            <option value="<?php echo $i ?>"><?php echo $i ?></option>

                                                        <?php  }  ?>
                                                        </select>
                                                    </div>

                                                    
                                                    <label for="formSearchUpDate"><font color="#000"><b>*Is Fragile?</b></font></label><br>

                                                    <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="fragile" id="inlineRadio1" value="Yes">
                                                    <label class="form-check-label" for="inlineRadio1">Yes</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="fragile" id="inlineRadio2" value="No" checked>
                                                    <label class="form-check-label" for="inlineRadio2">No</label>
                                                    </div>
                                                    
                                                    <?php if($_GET['status']=="Appointment"){ ?>
                                                    <div class="form-group mt-2">
                                                        <label for="formSearchUpDate"><font color="#000"><b>*Pickup Date</b></font></label>
                                                        <input type="date" name="date" value='<?php echo gmdate('Y-m-d');?>' required placeholder="Pickup Date" id="dateID" class="form-control mt-2 form-field" min="<?php echo gmdate('Y-m-d');?>" max="2050-12-31">
                                                    </div>

                                                    <div class="form-group mt-2">
                                                        <label for="formSearchUpDate"><font color="#000"><b>*Pickup Time</b></font></label>
                                                        <input type="time" name="time" value='<?php echo gmdate('H:i', strtotime("+1 hour"));?>' required placeholder="Pickup Time" id="" class="form-control mt-2 form-field">
                                                    </div>
                                                    <?php } ?>
                                                    <hr>
                                                    <div class="form-group mt-2">
                                                        <label for="formSearchUpDate"><font color="#000"><b>Coupon Code(Optional)</b></font></label>
                                                        <input type="text" name="coupon" placeholder="Coupon Code(Optional)" id="cupon" class="form-control my-2 form-field">
                                                        <span class="mt-2" id="result"></span>
                                                    </div>
                                                    <hr>

                                                    <!-- <div class="col-sm-6"><b><div id="dvDistance"></div></b></div> -->
                                                    <div class="col-sm-12 mt-2" id="defaultBtn" >
                                                        <p><button type="submit" name="<?php echo $_GET['status']; ?>" data-id="<?php echo $id ?>" id="formSearchSubmit"  class="btn btn-dangerx btn-lg w-100 proceedn bg-orange text-white" >Proceed...</button>
                                                    </p>
                                                            
                                                    </div>
                                                <!-- </div> -->
                                        </div>
                                        
                                         
                                </form>

                                <!-- <hr> -->
                                                                   
                        
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
        <div class="tap-top"><i class="icon-control-eject"></i></div>
        <!-- tap on tap ends-->
        <!-- footer start-->
    <?php include 'footer.php' ?>
        
      </div>
    </div>
   
    <?php include 'script.php' ?>
    
   
  </body>
 
</html>