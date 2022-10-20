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
                      <li class="breadcrumb-item">Trade</li> 
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
                  <div class="col-xl-8 ">
                    <div class="card">
                      <div class="card-body">
                        <?php echo isset($_SESSION['msg'])?$_SESSION['msg']:"" ?>
                      <h4>Request for a Trade</h4>
                      <hr>
                      <span class="text-danger mb-3">Note:- If you have done Your analysis and wish to execute any trade using your analysis, kindly use this form to send us the request</span>

                      <form action="controller" class="row mt-5" method="post">

                        <div class="form-group col-md-6">
                          <label for="">Position type</label>
                          <input type="text" name="position" placeholder="Position type" class="form-control">
                        </div>

                        <div class="form-group col-md-6">
                          <label for="">Buy</label>
                          <input type="text" name="buy" placeholder="Buy" class="form-control">
                        </div>

                        <div class="form-group col-md-6">
                          <label for="">Sell</label>
                          <input type="text" name="sell" placeholder="Sell" class="form-control">
                        </div>

                        <div class="form-group col-md-6">
                          <label for="">Instrument</label>
                          <input type="text" name="instrument" placeholder="Instrument" class="form-control">
                        </div>

                        <div class="form-group col-md-6">
                          <label for="">Stop lose price</label>
                          <input type="text" name="stop" placeholder="Stop lose price" class="form-control">
                        </div> 

                        <div class="form-group col-md-6">
                          <label for="">Take Profit Price</label>
                          <input type="text" name="profit" placeholder="Take Profit Price" class="form-control">
                        </div> 

                        <div class="form-group col-md-6">
                          <label for="">order type </label>
                          <select name="request" id="methodx" required class="form-control">
                            <option value="">Choose Resquest</option>
                            <option value="Instant ">Instant </option> 
                            <option value="Pending">Pending</option>
                          </select>
                        </div>

                        <div class="form-group col-md-6" id="pen"></div>

                        <div class=" col-md-12">
                          <input type="hidden" name="link" value="start-trade">

                          <div style="text-align:right">
                            <button type="submit" name="startTrade" class="btn btn-primary">Submit Request</button>
                        </div>
                        </div>
                         
                      </form>

                   








                      </div>
                    </div>
                  </div>

                  <div class="col-xl-4 ">                 
                
                 <?php include 'asider.php' ?>
                 </div>

                 <div class="col-xl-12">
                    <div class="card">
                      <div class="card-body">
                        <hr>
                        <?php 
                        
                          $sql = runQuery("SELECT * FROM dtrade_request WHERE dtype='start' AND userid='$user' AND demail='$email' ORDER BY id DESC LIMIT 20");
                          if(numRows($sql)>0){
                        ?>
                          <div class="table-responsive">
                            <table class="table">
                              <tr>
                                <th>Date</th>
                                <th>Position</th>
                                <th>Buy</th>
                                <th>Sell</th>
                                <th>Instrument</th>
                                <th>Stop Lose Price</th>
                                <th>Take Profit Price</th>
                                <th>Order Type</th>
                                <th>Price</th>
                                <th>Status</th>
                              </tr>

                              <?php while($row=fetchAssoc($sql)){?>
                                <tr>
                                <td><?php echo date("d M, Y", strtotime($row['ddate'])) ?></td>
                                <td><?php echo $row['dposition']  ?></td>
                                <td><?php echo $row['dbuy']  ?></td>
                                <td><?php echo $row['dsell']  ?></td>
                                <td><?php echo $row['dinstrument']  ?></td>
                                <td><?php echo $row['dstop']  ?></td>
                                <td><?php echo $row['dprofit']  ?></td>
                                <td><?php echo $row['drequest']  ?></td>
                                <td><?php echo $row['dprice']  ?></td>
                                <td><?php echo $row['dstatus']  ?></td>
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


        
<script>
        $(document).ready(function(){
           

           $(document).on("change", "#methodx", function(){
            var option = $(this).find('option:selected');
            var value = option.val();
            $("#pen").html('');

            if(value !="" && value=="Pending"){{
              $("#pen").html(' <label for="">Price</label><input type="text" name="price" placeholder="Price" class="form-control">');
            }
                             
            }
           })
        })
    </script>
  </body>
 
</html>