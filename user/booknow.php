<?php include 'head.php';
$ref = bin2hex(random_bytes(11));
 ?>
  <body>
  
    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
    <?php include 'header.php' ?>
      
    
    <?php 
        $id = clean($_GET['id']);
        $km = 197;
        // $km = str_replace(",","",$_SESSION['distance']);
        $hour = date('H');
        $dayTerm = ($hour > 17) ? "dratekm_evening" : (($hour >= 12) ? "dratekm_noon" : "dratekm_morning");

        
        $row = runQuery("SELECT * FROM dsettings_categories WHERE dcategoryid='$id' ORDER BY id ASC")->fetch_assoc();
        $code = $row['dcategory'];
 

        $bookingid = clean($_GET['book']);
        $lap = runQuery("SELECT dpickup_latitude, dpickup_longitude from dbookings WHERE dbookingid='$bookingid' ")->fetch_assoc();
      
        $latMe = $lap['dpickup_latitude'];
        $longMe = $lap['dpickup_longitude'];
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
                      <li class="breadcrumb-item">Book Now</li> 
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="row learning-block">
              <div class="col-xl-9 xl-60">
                <div class="row">
                  <div class="col-xl-12 col-sm-6">
                    <div class="card">
                      <div class="card-body">
                     

                      <div class="register-form mt-4 px-4 app">
                        <div class="my-5" id="timeup">
                        <h4>Searching for a driver</h4>
                        
                            <div class="text-center">
                            <img src="../mobile-customers/img/ajax-loader.gif" alt="" srcset="">
                            <p class="mt-2">Search for driver...</p>
                            <div> <span id="time">00:00</span>!</div>
                            </div>
                            <hr>

                            
                        
                        </div>
                        <hr> 

                        <div class="d-flexm shadow-sm p-3 mt-2 align-content-center " style="border: 1px solid #eee;">
                            <center>
                            <img style="max-height: 100px;" src="../mobile-customers/webcontrol/icons/<?php echo $row['dicons1']; ?>.png" alt="">
                            </center>
                            <div class="contentv text-center">
                                <h3><?php echo $code; ?></h3>
                                <p>Carrriage size:  <?php echo $row['dsize']; ?></p>
                            </div>

                        </div>
            
                
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
    <?php include 'footer.php' ?>
        
      </div>
    </div>
   
    <?php include 'script.php' ?>
    <script>
      function startTimer(duration, display) {
        var timer = duration, minutes, seconds;
        var res, timeToClear;
        setInterval(function () {
            minutes = parseInt(timer / 60, 10);
            seconds = parseInt(timer % 60, 10);

            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            res = minutes > 0?"minutes":"seconds";
            display.textContent = minutes + ":" + seconds+" " + res;

            if (--timer < 0) {
                timer = 0.00;
                clearInterval();
            }
        }, 1000);
    }

    function yourFunction(){
      // do whatever you like here
      // console.log("working!");
        setTimeout(yourFunction, 10000);
      
    }
    window.onload = function () {
        var Minutes = 60 * 1,
            display = document.querySelector('#time'); 
            startTimer(Minutes, display); 
            timeToClear= 0;
            const interval = setInterval(function() { 
              //send ajax message
              $.ajax({
                  url: "ajax-process",
                  method: "POST",
                  data: { Message: "bookNow", id: "<?php echo $bookingid ?>"},
                  success: function(data) {
                    //send user to vehicle details
                    if(data=="yes"){
                      window.location.assign("assign/<?php echo $bookingid ?>/");
                    }
                  }
              });
              timeToClear += 10;
              if(timeToClear == 60){
                clearInterval(interval);
                $("#timeup").html('<div class="alert alert-danger" role="alert"> <strong>Oops!</strong> <br> No driver\'s available for pickup, kindly book for an appointment below </div><form name="f123" method="post" action="book-process"><div class="form-group mt-2 form-field"><label for="formSearchUpDate"><font color="#000"><b>*Pickup Date</b></font></label><input type="date" name="date" value="<?php echo gmdate('Y-m-d');?>" required placeholder="Pickup Date" id="dateID" class="form-control mt-2 form-field" min="<?php echo gmdate('Y-m-d');?>" max="2050-12-31"></div> <div class="form-group mt-2"><label for="formSearchUpDate"><font color="#000"><b>*Pickup Time</b></font></label><input type="time" name="time" value="<?php echo gmdate('H:i', strtotime("+1 hour"));?>" required placeholder="Pickup Time" id="" class="form-control mt-2 form-field"></div><input type="hidden"  name="id" value="<?php echo $bookingid ?>"><div class="row row-submit"> <div class="container-fluid"> <div class="col-md-12" ><p><button type="submit" name="btnbook" id="formSearchSubmit" class="btn nowPage btn-dangerx bg-orange text-white text-center btn-lg w-100"  > Submit Appointment </button></p><br> </div> </div> </div></form>')
              }
            }, 10000);
 
    };
    </script>
    <script>
    $(document).ready(function(){
      $(document).on("click", ".nowPage",function(e){ 
            $(this).html('<div class="spinner-border spinner-border-sm text-light" role="status"><span class="sr-only">Loading...</span></div> Submitting...')
          })
    })
</script>
    
   
  </body>
 
</html>