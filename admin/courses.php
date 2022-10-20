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
                      <li class="breadcrumb-item">Courses</li> 
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
                      
                      <div class="row">
                        <div class="col-md-8">
                        <h4>Manage Courses</h4> 
                        </div>
                        <div class="col-md-4">
                            <a href="javascript:void(0)" data-bs-toggle="modal"  data-bs-target="#exampleModal" class="btn btn-primary">Create New Course</a>
                        </div>
                      </div>

                      <hr>
                    <?php 
                    
                      $sql = runQuery("SELECT * FROM dcourse ORDER BY id DESC LIMIT 200");
                      if(numRows($sql)>0){
                    ?>
                      <div class="table-responsive" style="min-height: 250px;">
                        <table class="table">
                          <tr>
                            <th>Date</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Fees</th> 
                            <th>---</th>
                          </tr>

                          <?php while($row=fetchAssoc($sql)){?>
                            <tr>
                            <!-- <td><?php //echo date("d M, Y", strtotime($row['ddate'])) ?></td>   -->
                            <td><img src="files/<?php echo $row['dimg']  ?>.png" style="max-width:140px" alt=""></td>
                            <td><?php echo $row['dtitle']  ?></td>
                            <td><?php echo $row['ddesc']  ?></td>
                            <td><?php echo $row['damount']  ?></td>                             <td>
                            <a class="btn btn-danger btn-sm" href="course-details?id=<?php echo $row['cid']  ?>"> <i class="fa fa-eye"></i> Details</a>
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
            <h5 class="modal-title" id="exampleModalLabel">Create New Course</h5>
            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="controller" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                 
                <div class="form-group">
                    <label for="">Course Title</label>
                    <input type="text" name="title" placeholder="Course Title" required id="" class="form-control">
                </div>
                 
                <div class="form-group">
                    <label for="">Course Description</label>
                    <input type="text" name="desc" placeholder="Course Description" required id="" class="form-control">
                </div>
                 
                <div class="form-group">
                    <label for="">Course Fee (&#8358;)</label>
                    <input type="text" name="amount" placeholder="e.g 1000" required id="" class="form-control">
                </div>
                 
                <div class="form-group">
                    <label class="d-block" for="">Cover Photo</label>
                    <input type="file" name="img" required class="form-control-file">
                </div>
               
               
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