
    <?php include 'head.php' ?>

<body>
 
<?php include 'header.php' ?>
   
 
    <main>
      
        <!-- section content begin -->

        <section class="uk-margin-large-bottom  mt-40">
        <div class="uk-container">
            <div class="uk-grid uk-margin-medium-top">
                <div class="uk-width-2-5@l uk-width-2-1@m uk-width-1-1@s  uk-margin-auto" >
                  
                <?php echo isset($_SESSION['msg'])? $_SESSION['msg']: '' ?>
                <h3 class="block-title"><span>Forgot Password</span></h3> 
                <form action="controller" class="form-login" method="post" name="fpost">
                    <div class="row">
                       
                        <p>
                            Email Address:
                            <input class="uk-input" name="email" type="text" placeholder="Email Address" value="" required>
                        </p>
                          
                        <p>  
                            <input type="submit" class="uk-button uk-width uk-button-secondary uk-align-right" value="Submit " name="saveFor">
                        </p>
                    </div>
                </form> 
                
            </div>
        </section>
       
    </main>
   
    <?php include 'footer.php' ?>
    <?php include 'script.php' ?>
</body>

 
</html>