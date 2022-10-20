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
                      <li class="breadcrumb-item">All Investment Plans</li> 
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
                  <div class="col-xl-12 ">
                    <div class="card">
                      <div class="card-body">
                      <div class="row">
                          <div class="col-md-9">
                           <h4>Newsletter</h4> </div>
                          <div class="col-md-3">
                            <a href="javascript:void(0)" data-bs-toggle="modal"  data-bs-target="#exampleModal" class="btn btn-primary">Send Newsletter</a>
                          </div>
                      </div>

                      <hr>
                    <?php 
                    
                      $sql = runQuery("SELECT * FROM dnews  ORDER BY id DESC");
                      if(numRows($sql)>0){
                          $num=1
                    ?>
                      <div class="table-responsive" style="min-height: 250px;">
                        <table class="table">
                          <tr>
                            <th>S/N</th>
                            <th>Newsletter</th>
                            <th>---</th>
                          </tr>

                          <?php while($row=fetchAssoc($sql)){?>
                            <tr>
                                <td><?php echo date("d M, Y", strtotime($row['ddate'])) ?></td> 
                                <td style="width:65% ;">
                                    <div class="">
                                        <b>Subject:</b>  <?php echo ($row['dsubject'])  ?><br>
                                        <b>Message:</b> <br>
                                        <?php echo ($row['dmsg'])  ?>
                                    </div>
                                </td> 
                                <td>
                                <a class="btn btn-danger btn-sm" id="deleteNid" data-id="<?php echo $row['nid']  ?>"  href="javascript:void(0)"> <i class="fa fa-trash"></i> Delete</a>
                                </td>
                            </tr>

                            
                            
                            <?php } ?>



                        </table>
                      </div>

                      <?php } ?>




                      
                      </div>
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
            <h5 class="modal-title" id="exampleModalLabel">Newletter</h5>
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
                
                </div>
               
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="button" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-secondary" name="sendNew" type="submit">Send Newletter</button>
            </form>
            </div>
        </div>
        </div>

        
  </body>
 
</html>