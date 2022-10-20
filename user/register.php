<?php include 'head.php' ?>
  <body>
    
    <!-- page-wrapper Start-->
    <section>         
      <div class="container-fluid p-0"> 
        <div class="row m-0">
          <div class="col-xl-5"><img class="bg-img-cover bg-center" src="./assets/images/login/1.jpg" alt="looginpage"></div>
          <div class="col-xl-7 p-0"> 
            <div class="login-card">
              
              <form class="theme-form login-form" action="register-process" method="POST">
                <?php echo isset($_SESSION['msg'])? $_SESSION['msg']: '' ?>
                <div class="login-header text-center">
                  <h4>Create your account</h4>
                  <h6>Enter your personal details to create account</h6>
                </div>
                 
                <div class="login-social-title">                
                  <h5>Sign up with Email</h5>
                </div>
                <div class="form-group">
                  <label>Your Name</label>
                  <div class="small-group">
                    <div class="input-group"><span class="input-group-text"><i class="fa text-orange fa-user"></i></span>
                      <input class="form-control" type="text" name="fname" required="" placeholder="First Name">
                    </div>
                    <div class="input-group"><span class="input-group-text"><i class="fa text-orange fa-user"></i></span>
                      <input class="form-control" type="text" name="lname" required="" placeholder="Last Name">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label>Phone Number</label>
                  <div class="input-group"><span class="input-group-text"><i class="text-orange fa fa-phone"></i></span>
                    <input class="form-control" type="tel" name="phone" required placeholder="Phone Number">
                  </div>
                </div>
                <div class="form-group">
                  <label>Email Address</label>
                  <div class="input-group"><span class="input-group-text"><i class="text-orange fa fa-envelope"></i></span>
                    <input class="form-control" type="email" name="email" required placeholder="Test@gmail.com">
                  </div>
                </div>
                

                <div class="form-group">
                  <label>Password</label>
                  <div class="small-group">
                     
                      <div class="input-group"><span class="input-group-text"><i class="text-orange fa fa-lock"></i></span>
                        <input class="form-control" name="pass" id="pass" type="password" required placeholder="Password">
                        <div class="show-hide"><span class="shows"> </span></div>
                      </div> 
                    
                    
                      <div class="input-group"><span class="input-group-text"><i class="text-orange fa fa-lock"></i></span>
                        <input class="form-control" name="cpass" id="cpass" type="password" required placeholder="Confirm Password">
                        <div class="show-hide"><span class="shows"></span></div>
                      </div> 
                      
                    </div> 
                  </div>
                  <p id="err"></p>

                 
                <div class="form-group">
                  <button name="save" class="btn btn-primary btn-block border-orange bg-orange w-100 text-white" type="submit" id="btnSave">Create Account</button>
                </div>
                <p>Already have an account?<a class="ms-2" href="login">Sign in</a></p>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- page-wrapper end   -->
   
<?php include 'script.php' ?>
<script>
		$(document).ready(function(){
			$(document).on("keyup", "#cpass", function(){
			// alert("yes")
				//check if is not empty
				const pass = $("#pass").val()
				const cpass = $(this).val()
				// console.log(pass, cpass)
				$("#cpass").css({
							"border":"1px solid #eee"
						})
						$("#err").html("")
						
            $("#btnSave").prop('disabled', false)
				if(cpass !=''){					
					// check if password is match 
					if(pass != cpass){
						$("#cpass").css({
							"border":"1px solid red"
						})
						$("#err").html("Password do not match!")
            $("#btnSave").prop('disabled', true)
					}
				}

			})
		})
	</script>
    <!-- Plugin used-->
  </body>
 
</html>