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
                      <li class="breadcrumb-item">Courses Details</li> 
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
                      
                       
                    <?php 
                        $id = clean($_GET['id']);
                      $sql = runQuery("SELECT * FROM dcourse WHERE cid ='$id'");
                      if(numRows($sql)>0){
                        $row=fetchAssoc($sql)
                    ?>
                       <div class="row">
                        <div class="col-md-5">
                            <img src="files/<?php echo $row['dimg']  ?>.png" style="max-width:100%" alt="">
                        </div>

                        <div class="col-md-7">

                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <th>Title</th>
                                    <td><?php echo $row['dtitle']  ?></td>
                                </tr>
                                <tr>
                                    <th>Description</th>
                                    <td><?php echo $row['ddesc']  ?></td>
                                </tr> 
                                <tr>
                                    <th>Fees</th>
                                    <td>&#8358; <?php echo number_format($row['damount'])  ?></td>
                                </tr>  
                                <tr>
                                    <td colspan="2">
                                        
                                        <a href="javascript:void(0)" data-bs-toggle="modal"  data-bs-target="#exampleModal" class="btn btn-primary">Edit Course</a>

                                        <a href="javascript:void(0)" data-id="<?php echo $row['cid']  ?>" data-img="<?php echo $row['dimg']  ?>" id="deleteCourse" class="btn btn-danger">Delete Course</a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                            
                        </div>
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
            <h5 class="modal-title" id="exampleModalLabel">Update Course</h5>
            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="controller" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                 
                <div class="form-group">
                    <label for="">Course Title</label>
                    <input type="text" name="title" placeholder="Course Title" required  value="<?php echo $row['dtitle'] ?>" class="form-control">
                </div>
                 
                <div class="form-group">
                    <label for="">Course Description</label>
                    <input type="text" name="desc" placeholder="Course Description"  value="<?php echo $row['ddesc'] ?>" required id="" class="form-control">
                </div>
                 
                <div class="form-group">
                    <label for="">Course Fee (&#8358;)</label>
                    <input type="text" name="amount" placeholder="e.g 1000"  value="<?php echo $row['damount'] ?>" required id="" class="form-control">
                </div>
                 
                <div class="form-group">
                    <label class="d-block" for="">Cover Photo</label>
                    <input type="file" name="img" class="form-control-file">
                </div>
               
                <input type="hidden" name="cid" value="<?php echo $row['cid'] ?>">
                <input type="hidden" name="himg" value="files/<?php echo $row['dimg'] ?>.png">
                <input type="hidden" name="link" value="course-details?id=<?php echo $row['cid']  ?>">
               
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="button" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-secondary" name="saveCourse" type="submit">Submit</button>
            </form>
            </div>
        </div>
        </div>


        
  </body>
 
</html>