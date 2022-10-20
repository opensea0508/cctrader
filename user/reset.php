<?php include 'head.php' ?>
  <body>
    
    <!-- page-wrapper Start-->
    <div class="container-fluid">
      <div class="row">
        <div class="col-xl-5"><img class="bg-img-cover bg-center" src="./assets/images/login/3.jpg" alt="looginpage"></div>
        <div class="col-xl-7 p-0">
          <div class="login-card">
            <form class="theme-form login-form needs-validation" novalidate="" action="reset-process" method="POST">
                <?php echo isset($_SESSION['msg'])? $_SESSION['msg']: '' ?>
              <div class="login-header text-center">
                <h4>Reset Password</h4> 
              </div>
               
              <div class="login-social-title">                
                <h5>Reset password</h5>
              </div>
              <div class="form-group">
                <label>New Password</label>
                <div class="input-group"><span class="input-group-text"><i class="fa fa-lock text-orange"></i></span>
                  <input class="form-control" type="password" name="pass" required="" placeholder="New Password">
                  <!-- <div class="invalid-tooltip">Please enter proper email.</div> -->
                </div>
              </div>

              <div class="form-group">
                <label>Confirm New Password</label>
                <div class="input-group"><span class="input-group-text"><i class="fa fa-lock text-orange"></i></span>
                  <input class="form-control" type="password" name="cpass" required="" placeholder="Confirm New Password">
                  <!-- <div class="invalid-tooltip">Please enter proper email.</div> -->
                </div>
              </div>
               
              <div class="form-group">
                <button name="save" class="btn btn-block w-100 text-white bg-orange" type="submit">Reset Password</button>
              </div> 
            </form>
          </div>
        </div>
      </div>
    </div>
    <script>
      (function() {
      'use strict';
      window.addEventListener('load', function() {
      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.getElementsByClassName('needs-validation');
      // Loop over them and prevent submission
      var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
      if (form.checkValidity() === false) {
      event.preventDefault();
      event.stopPropagation();
      }
      form.classList.add('was-validated');
      }, false);
      });
      }, false);
      })();
    </script>
   
   <?php include 'script.php' ?>
    <!-- login js-->
    <!-- Plugin used-->
  </body>
 
</html>