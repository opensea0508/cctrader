<?php include 'head.php' ?>
<body>
<?php include 'header.php' ?>

    <!-- breadcrumb content begin -->
    <div class="uk-section uk-padding-remove-vertical">
        <div class="uk-container">
            <div class="uk-grid">
                <div class="uk-width-1-1 in-breadcrumb">
                    <ul class="uk-breadcrumb uk-float-right">
                        <li><a href="#">Home</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb content end -->
    <main>
        <!-- section content begin -->
        <div class="uk-section">
            <div class="uk-container">
                <div class="uk-grid">
                <div class="uk-width-1-1 uk-flex uk-flex-center">
                    <div class="uk-width-3-5@m uk-text-center">
                        <h2 class="uk-margin-remove">Avaliable Courses.</h2> 
                        <hr>
                    </div>
                </div>
                    <div class="uk-width-1-1">
                        <table class="uk-table uk-table-middle uk-table-divider uk-table-responsive">
                            <tbody>
                                <?php 
                                $sql = runQuery("SELECT * FROM dcourse ");
                                if(numRows($sql)>0){
                                    while($row=fetchAssoc($sql)){
                                
                                ?>
                                <tr>
                                    <td class="uk-width-1-2@m">
                                        <div class="uk-grid uk-grid-small uk-flex uk-flex-middle">
                                            <div class="uk-width-expand">
                                                <h3><?php echo $row['dtitle'] ?></h3>
                                            </div>
                                        </div>
                                    </td>
                                    <td><?php echo $row['ddesc'] ?></td>
                                    <td class="uk-width-1-5@m uk-text-right@m">
                                        <a href="courses/<?php echo $row['cid'] ?>/" class="uk-button uk-button-text">Buy Courses <i class="fas fa-chevron-right fa-xs uk-margin-small-left"></i></a>
                                    </td>
                                </tr>
                                <?php } }?>
                                
                            </tbody>
                        </table>
                         
                    </div>
                </div>
            </div>
        </div>
        <!-- section content end -->
      
      
    </main>
     
    <?php include 'footer.php' ?>
    <?php include 'script.php' ?>
</body>

 
</html>