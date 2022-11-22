<?php include 'head.php';
$ref = bin2hex(random_bytes(11));
 ?>

  <body class="wide" >
   
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
                      <li class="breadcrumb-item">User Details</li> 
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="row ">
              <div class="col-xl-12">
                <div class="row">
                  <div class="col-xl-12 col-sm-6">
                    <div class="card">
                      <div class="card-body">
                        <?php echo isset($_SESSION['msg'])?$_SESSION['msg']:"" ?>
                        <div class="row">

                        <div class="col-md-6"> <h4>User Details</h4></div>
                        <div class="col-md-6 mb-2 " style="text-align:right">
                            <a href="javascript:void(0)" data-bs-toggle="modal"  data-bs-target="#exampleModalx" class="btn btn-info">Send Mail</a>
                        </div>
                         
                       
                      <hr>
                      <?php 
                        $id = clean($_GET['id']);
                        $email = clean($_GET['email']);
                        $sql = runQuery("SELECT * FROM dregister WHERE dlevel='user' AND userid='$id' AND demail='$email' ORDER BY id DESC LIMIT 200");
                        if(numRows($sql)>0){
                    ?>
                          <div class="col-md-6">
                              
                   
                      <div class="table-responsives" style="min-height: 250px;">
                        <table class="table">
                          
                            

                          <?php  $row=fetchAssoc($sql);
                           $userid = $row['userid'];
                           $wallet = $row['dwallet'];
                           $name = $row['dfname'];
                          ?>
                            <tr> 
                                <th>Fullname</th>
                                <td><?php echo $row['dfname']  ?></td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td><?php echo $row['dphone']  ?></td>
                            </tr>
                            <tr>
                                <th>Phone</th>
                                <td><?php echo $row['dphone']  ?></td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td><?php echo $row['demail']  ?></td>
                            </tr>
                            <tr>
                                <th>Country</th>
                                <td><?php echo $row['dcountry']  ?></td>
                            </tr>
                            <tr>
                                <th>State</th>
                                <td><?php echo $row['dstate']  ?></td>
                            </tr>
                            <tr>
                                <th>City</th>
                                <td><?php echo $row['dcity']  ?></td>
                            </tr>

                            <tr>
                                <th>Wallet Balance</th>
                                <td>$<?php echo number_format($row['dwallet'])  ?></td>
                            </tr>
                            <tr>
                                <th>Wallet Address</th>
                                <td><?php echo $row['dwalletAddress']  ?></td>
                            </tr>

                            <tr>
                                <th colspan="2" class="text-center">Account Details</th>
                            </tr>
                                
                            <tr>
                                <th>Account Name</th>
                                <td><?php echo $row['daccName']  ?></td>
                            </tr>

                            <tr>
                                <th>Account Number</th>
                                <td><?php echo $row['daccNum']  ?></td>
                            </tr>

                            <tr>
                                <th>Bank Name</th>
                                <td><?php echo $row['dbank']  ?></td>
                            </tr>
                                
 
                        </table>
                      </div>

 

                      </div>
                        <div class="col-md-6">
                            <h6>Document Upload</h6>
                            <p>Vesrification Status: <?php echo ucfirst($row['dvastatus'])  ?></p>
                            <hr>

                            <?php  if(!empty($row['dutility'])){  ?>
                                <img src="../user/files/<?php echo $row['dutility']  ?>.jpg" alt="">
                                <hr>
                            <?php } if(!empty($row['dfront'])){  ?>
                                <img src="../user/files/<?php echo $row['dfront']  ?>.jpg" alt="">
                                <hr>
                            <?php } if(!empty($row['dback'])){  ?>
                                <img src="../user/files/<?php echo $row['dback']  ?>.jpg" alt="">
                                <hr>
                            <?php }  ?>

                            <form action="updatelink" method="post">
                                <div class="form-group">
                                    <label for="">Trade Monitor Room link. </label>
                                    <input type="text" value="<?php echo $row['turl']  ?>" name="link" required placeholder="Enter Trade Monitor Room link. " class="form-control">
                                </div>
                                <input type="hidden" name="id" value="<?php echo $row['userid']  ?>">
                                <input type="hidden" name="email" value="<?php echo $row['demail']  ?>">
                                <button type="submit" name="linkSave" class="btn-primary btn w-100" >Submit Link</button>
                            </form>
                                <hr>
                        </div>
                        <div class="col-md-12" style="text-align:right ;"> 

                            <?php if($row['dvastatus']=='pending'){ ?>
                            <a class="btn btn-info" data-id="<?php echo $row['userid']  ?>" data-email="<?php echo $row['demail']  ?>" id="verifyAccount" href="javascript:void(0)">Verify Account</a>
                            <?php } ?>

                                <?php if($row['dstatus']=='active'){ ?>
                                  <button id="sendTest" 
                                    data-name="<?php echo $row['dfname']  ?>"  
                                    data-email="<?php echo $row['demail']  ?>" 
                                    class="btn btn-primary">Margin Email Notification </button>

                                  <a href="javascript:void(0)" data-bs-toggle="modal"  data-bs-target="#exampleModal" class="btn btn-dark mt-2b">Topup Wallet</a>
                                  <?php if($row['isTrader']==false){ ?>
                                    <a class="btn btn-primary" data-id="<?php echo $row['userid']  ?>" data-email="<?php echo $row['demail']  ?>" data-status="client" id="setAsTrader">Set As Trader</a>
                                    <?php }else{ ?>
                                    <a class="btn btn-primary" data-id="<?php echo $row['userid']  ?>" data-email="<?php echo $row['demail']  ?>" data-status="trader" id="setAsTrader">Set As Not Trader</a>
                                    <?php } ?>
                                <a class="btn btn-danger" data-id="<?php echo $row['userid']  ?>" data-email="<?php echo $row['demail']  ?>" data-status="banned" id="banUser" href="javascript:void(0)">Ban User</a>
                                <?php }else{ ?>
                                <a class="btn btn-danger" data-id="<?php echo $row['userid']  ?>" data-email="<?php echo $row['demail']  ?>" data-status="active" id="banUser" href="javascript:void(0)">Unban User</a>
                                <?php } ?>
                        </div>
                        <?php if(isset($_GET['tid'])){ ?>
                        <div class="col-md-12">
                          <h4>Trading Request</h4>
                          <hr>
                          <?php 
                          $tid = clean($_GET['tid']);
                          $sql = runQuery("SELECT * FROM dtrading WHERE userid='$id' AND demail='$email' AND tid='$tid' ORDER BY id DESC LIMIT 10 ");
                                if(numRows($sql)>0){
                                   $row=fetchAssoc($sql);
                                   $file = $row['dfile'] !=''?'<a href="files/'.$row['dfile'].'" download>Download File</a>':"";
                                   ?>
                          <div class="">
                            <p>
                              <b> From: </b><?php echo $row['dfrom'] ?> <br>
                              <b> To: </b><?php echo $row['dto'] ?>  <br>
                              <b> Status: </b><?php echo $row['dstatus'] ?>  <br>
                              <b> Download Link: </b><?php echo $file; ?>  <br>
                            </p>
                            
                            <hr>
                            <form action="controller" method="post" enctype="multipart/form-data">
                              <input type="hidden" name="tid" value="<?php echo $tid ?> ">
                              <input type="hidden" name="id" value="<?php echo $row['userid']  ?>">
                                <input type="hidden" name="email" value="<?php echo $row['demail']  ?>">
                              <label for="">Only PDF, DOC and DOCX is allow</label><br>
                              <input type="file" required name="file" id="" class="form-control-file">
                              <button name="saveUpload" class="btn btn-primary">Upload History</button>
                            </form>
                          </div>
                          <?php } ?>
                        </div>
                        <?php } ?>
                      </div>

                      
                      </div>
                      <?php } ?>
                    </div>
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
   
    <?php include 'script.php' ?> 

    
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Topup Wallet</h5>
            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="controller" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Choose</label>
                    <select name="type" id="" class="form-control">
                      <option value="add">+ Add to wallet</option>
                      <option value="minu">- Minu from wallet</option>
                    </select>
                    <input type="hidden" name="wallet" value="<?php echo $wallet ?>">
                    <input type="hidden" name="id" value="<?php echo $userid ?>">
                    <input type="hidden" name="email" value="<?php echo $email ?>">
                </div>
                <div class="form-group">
                    <label for="">Amount</label>
                    <input type="text" name="amount" placeholder="e.g 1000" required id="" class="form-control">
                </div>
               
               
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="button" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-secondary" name="saveTop" type="submit">Submit</button>
            </form>
            </div>
        </div>
        </div>
        </div>

        

    
        <div class="modal fade" id="exampleModalx" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Send Message</h5>
            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="controller" method="post" enctype="multipart/form-data">
            <div class="modal-body"> 
                <div class="modal-body">

                <div class="form-group">
                        <label for="">Subject </label>
                    <input type="text" placeholder="Subject" name="title" class="form-control">
                </div>
                   
                    <div class="form-group">
                        <label for="">Message </label>
                        <textarea name="msg" placeholder="Enter message here..." cols="30" rows="10" class="form-control"></textarea>
                            
                    </div>
                    <input type="hidden" name="email" value="<?php echo $email ?>">
                    <input type="hidden" name="name" value="<?php echo $name ?>">
                    <input type="hidden" name="id" value="<?php echo $userid ?>">
                
                </div>
               
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="button" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-secondary" name="sendNewUser" type="submit">Send </button>
            </form>
            </div>
        </div>
        </div>

        

        
  </body>
 
</html>