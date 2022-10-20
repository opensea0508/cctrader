
    <?php include 'head.php' ?>

<body>
 
<?php include 'header.php' ?>
   
    
    <main>
      
        <!-- section content begin -->

        <section class="uk-margin-large-bottom mt-40">
        <div class="uk-container">
            <div class="uk-grid uk-margin-medium-top">
                <div class="uk-width-2-5@l uk-width-2-1@m uk-width-1-1@s  uk-margin-auto" >
                <?php echo isset($_SESSION['msg'])? $_SESSION['msg']: '' ?>
            
                <h3 class="block-title"><span>Reset Your Password</span></h3> 
                
                    <!-- login form begin -->
                    <form class="uk-grid uk-form" action="controller" method="post">
                        
                        <div class="uk-margin-small uk-width-1-1 uk-inline">
                            <span class="uk-form-icon uk-form-icon-flip fas fa-lock fa-sm"></span>
                            <input class="uk-input uk-border-rounded" id="password" value="" type="password" name="pass" placeholder="New Password">
                        </div>
                        
                        <div class="uk-margin-small uk-width-1-1 uk-inline">
                            <span class="uk-form-icon uk-form-icon-flip fas fa-lock fa-sm"></span>
                            <input class="uk-input uk-border-rounded" id="password" value="" type="password" name="cpass" placeholder="Confirm Password">
                        </div>
                        <input type="hidden" name="userid" value="<?php echo $_GET['key'] ?>">
                        <input type="hidden" name="hash" value="<?php echo $_GET['hash'] ?>">

                        <div class="uk-margin-small uk-width-1-1">
                            <button class="uk-button uk-width-1-1 uk-button-primary uk-border-rounded uk-float-left" type="submit" name="saveRes">Reset Password</button>
                        </div>
                    </form>
                                    


                 
            </div>
        </section>
       
        <!-- section content end -->
    </main>
   
    <?php include 'footer.php' ?>
    <?php include 'script.php' ?>
</body>

 
</html>