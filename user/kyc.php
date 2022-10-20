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
                      <!-- <li class="breadcrumb-item"></li>  -->
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="row ">
              <div class="col-xl-9 xl-60">
                <div class="row">
                  <div class="col-xl-12 col-sm-6">
                    <div class="card">
                      <div class="card-body">
                      <?php echo isset($_SESSION['msg'])?$_SESSION['msg']:"" ?>

                      <h4>KYC Legibility </h4>
                        <hr>
                        <p>
                          <b>Fullname</b> : <?php echo userInfo($user, $email,'dfname') ?> <br>
                          <b>Email</b> : <?php echo userInfo($user, $email,'demail') ?> <br>
                          <b>Phone</b> : <?php echo userInfo($user, $email,'dphone') ?> <br>
                          <b>KYC Status</b> : <?php echo ucfirst(getInfo('dkyc',$user, $email,'dstatus')) ?> 
                        </p>
                        <?php 
                        $kyc = runQuery("SELECT * FROM dkyc WHERE userid='$user' AND demail='$email' ");
                        if(numRows($kyc)>0){
                            $row = fetchAssoc($kyc);
                            $statusx = $row['dstatus'];
                        }else{
                            $statusx = '';
                        }

                        if($statusx =='' or $statusx=='rejected'){
                         ?> 
                        <hr>
                      <p class="text-danger">Answer a few questions to determine if you are qualified to do business with us based on our client eligibility assessment. Our compliance team will review your application, if you pass our client eligibility assessment, you will receive an offer letter from our compliance. </p>

                      <hr>
                      
                         <form action="controller" method="post">
                            <div class="form-group">
                                <label for="">Principal Occupation:</label>
                                <input type="text" placeholder="Principal Occupation" name="occupation" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="">What is your total estimated annual income?</label>
                                <select name="annual" id="" class="form-control">
                                    <option value="">Choose Annual Income</option>
                                    <option value="$10,000-$19,999">$10,000-$19,999</option>
                                    <option value="$20,000 - $49,999">$20,000 - $49,999</option>
                                    <option value="$50,000 - $99,999">$50,000 - $99,999</option>
                                    <option value="$100,000 Above">$100,000 Above</option>
                                </select>
                            </div> 
                            <div class="form-group">
                                <label for="">The total estimated Monthly income?</label>
                                <select name="monthly" id="" class="form-control">
                                    <option value="">Choose Monthly Income</option>
                                    <option value="$500-$999">$500-$999</option>
                                    <option value="$1,000 - $4,999">$1,000 - $4,999</option>
                                    <option value="$5,000 - $9,999">$5,000 - $9,999</option>
                                    <option value="$10,000 Above">$10,000 Above</option>
                                </select>
                            </div> 


                            <div class="form-group">
                                <label for="">Source of Trading funds:</label>
                                <select name="funds" id="" class="form-control">
                                    <option value="">Choose Source</option>
                                    <option value="Personal saving">Personal saving</option>
                                    <option value="Loan">Loan</option>
                                    <option value="Collective investment scheme">Collective investment scheme</option>
                                    <option value="Salary">Salary</option>
                                    <option value="Pension">Pension</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div> 
                            <div class="form-group">
                                <label for="">What is your current employment status?</label>
                                <select name="employment" id="" class="form-control">
                                    <option value="">Choose Monthly Income</option>
                                    <option value="Self-Employed">Self-Employed</option>
                                    <option value="Employed">Employed</option> 
                                </select>
                            </div> 


                            <div class="">
                                <label for="">Do you have any trading experience? </label>
                                <div class="form-group m-t-15 m-checkbox-inline mb-0 custom-radio-ml">
                                    <div class="radio radio-primary">
                                        <input id="radioinline1" type="radio" name="exp" value="yes">
                                        <label class="mb-0" for="radioinline1">Yes</label>
                                    </div>
                                    <div class="radio radio-danger">
                                        <input id="radioinline2" type="radio" name="exp" value="no">
                                        <label class="mb-0" for="radioinline2">No</label>
                                    </div> 
                                </div>
                                <div class="form-group mt-4" id="rest"> </div> 
                            </div>

                            <div class="form-group">
                                <label for="">Which of the trading and Investment objective defined your objective? </label>
                                <select name="goal" id="" class="form-control">
                                    <option value="">Choose objective</option>
                                    <option value="Short Term goal">Short Term goal</option>
                                    <option value="long term goal">long term goal</option> 
                                </select>
                            </div> 
                            

                            <div class="">
                                <label for="">Have you ever participated in trading education or have experience/qualifications which would assist your understanding of our services?  </label>
                                <div class="form-group m-t-15 m-checkbox-inline mb-0 custom-radio-ml">
                                    <div class="radio radio-primary">
                                        <input id="radioinline1x" type="radio" name="qty" value="yes">
                                        <label class="mb-0" for="radioinline1x">Yes</label>
                                    </div>
                                    <div class="radio radio-danger">
                                        <input id="radioinline2x" type="radio" name="qty" value="no">
                                        <label class="mb-0" for="radioinline2x">No</label>
                                    </div> 
                                </div> 
                            </div>

                            <div class="form-group mt-3">
                                <label for="">When trading or investing with Leverage which one of the following applies? </label>
                                <select name="app" id="" class="form-control">
                                    <option value="">Choose </option>
                                    <option value="High-profit return or loses">High-profit return or loses</option>
                                    <option value="Low-profit return or loses">Low-profit return or loses</option> 
                                    <option value="Leverage product does not have any risk">Leverage product does not have any risk</option> 
                                </select>
                            </div> 
                            <div class="form-group mt-3">
                                <label for="">If you are trading or investing with 50:1 leverage and you have $1,000 in your account, what is the maximum-size position you can open? </label>
                                <select name="leverage" id="" class="form-control">
                                    <option value="">Choose </option>
                                    <option value="$500,000">$500,000</option>
                                    <option value="$50,000">$50,000</option> 
                                    <option value="<$5,000"><$5,000</option> 
                                </select>
                            </div> 
                             

                            <div class="">
                                <label for="">My open position may be closed automatically when </label>
                                <div class="form-group ">
                                   
                                    <div class="radio radio-primary " style="margin-left: 15px;">
                                        <input id="radio11" type="radio" name="position" value="The market price is moving against me and I don’t have enough equity to maintain the position">
                                        <label for="radio11">The market price is moving against me and I don’t have enough equity to maintain the position</label>
                                    </div>
                                    <div class="radio radio-secondary">
                                        <input id="radio22" type="radio" name="position" value="When the market price is moving in my favor with enough equity and profit">
                                        <label for="radio22">When the market price is moving in my favor with enough equity and profit</label>
                                    </div>
                                </div> 
                            </div>

                            <div class="">
                                <label for=""> Which of these general risk warnings is True? </label>
                                <div class="form-group ">
                                   
                                    <div class="radio radio-primary " style="margin-left: 15px;">
                                        <input id="radio111" type="radio" name="risk" value="Trading Futures/Derivatives, FX, and Options come with a risk of losing money due to leverage.">
                                        <label for="radio111">Trading Futures/Derivatives, FX, and Options come with a risk of losing money due to leverage.</label>
                                    </div>
                                    <div class="radio radio-secondary"  style="margin-left: 15px;">
                                        <input id="radio221" type="radio" name="risk" value="Trading Futures/Derivatives, FX, and Options do not have any risk of losing money due to leverage, it always produces a guaranteed profit">
                                        <label for="radio221">Trading Futures/Derivatives, FX, and Options do not have any risk of losing money due to leverage, it always produces a guaranteed profit</label>
                                    </div>
                                </div> 

                                <div class="form-group">
                                    <label for="">How often do you want execution?</label>
                                    <select name="exec" id="" class="form-control">
                                        <option value="">Choose </option>
                                        <option value="Very Aggressive ">Very Aggressive </option>
                                        <option value="Weekly">Weekly</option> 
                                        <option value="Monthly">Monthly</option> 
                                    </select>
                                </div> 

                                <div class="form-group">
                                    <label for="">What is your Expected Amount of Deposit ?</label>
                                    <input type="text" name="amtDepo" class="form-control">
                                </div>

                               <div style="text-align:right">
                               <button type="submit" class="btn btn-primary" name="saveKyc">Submit</button>
                               </div>
                            </div>



                         </form>
                      <?php } else {  
                    
                         $sql = runQuery("SELECT * FROM dkyc WHERE userid='$user' and demail='$email' ");
                         if(numRows($sql)>0){
                           $row=fetchAssoc($sql);
                           $status = $row['dstatus'];
                       ?>
                          <hr>
                           
                           <div class="table-responsive" >
                             <table class="table">
                                 <thead>
                                     <th>Question</th>
                                     <th>Answer</th>
                                 </thead> 
                                 <tr> 
                                     <td>Principal Occupation:</td> 
                                     <td><?php echo ucfirst($row['doccupation'])  ?></td>
                                 </tr>
                                 <tr> 
                                     <td>What is your total estimated annual income?</td> 
                                     <td><?php echo ucfirst($row['dannual'])  ?></td>
                                 </tr>
                                 <tr> 
                                     <td>The total estimated Monthly income?</td> 
                                     <td><?php echo ucfirst($row['dmonthly'])  ?></td>
                                 </tr>
                                 <tr> 
                                     <td>Source of Trading funds</td> 
                                     <td><?php echo ucfirst($row['dfunds'])  ?></td>
                                 </tr>
                                 <tr> 
                                     <td>What is your current employment status?</td> 
                                     <td><?php echo ucfirst($row['demployment'])  ?></td>
                                 </tr>
                                 <tr> 
                                     <td>Do you have any trading experience?</td> 
                                     <td><?php echo ucfirst($row['dexperience']) ." (".ucfirst($row['dspecify']).")"  ?></td>
                                 </tr>
                                 <tr> 
                                     <td>Which of the trading and Investment objective defined your objective?</td> 
                                     <td><?php echo ucfirst($row['dgoal'])  ?></td>
                                 </tr>
                                 <tr> 
                                     <td>Have you ever participated in trading education or have experience/qualifications which would assist your understanding of our services?</td> 
                                     <td><?php echo ucfirst($row['dqty'])  ?></td>
                                 </tr>
                                 <tr> 
                                     <td>When trading or investing with Leverage which one of the following applies?</td> 
                                     <td><?php echo ucfirst($row['dapp'])  ?></td>
                                 </tr>
                                 <tr> 
                                     <td>If you are trading or investing with 50:1 leverage and you have $1,000 in your account, what is the maximum-size position you can open? </td> 
                                     <td><?php echo ucfirst($row['dleverage'])  ?></td>
                                 </tr>
                                 <tr> 
                                     <td>My open position may be closed automatically when ? </td> 
                                     <td><?php echo ucfirst($row['dposition'])  ?></td>
                                 </tr>
                                 <tr> 
                                     <td> Which of these general risk warnings is True? </td> 
                                     <td><?php echo ucfirst($row['drisk'])  ?></td>
                                 </tr>
                                  
     
                                 <tr> 
                                     <td>How often do you want execution?</td> 
                                     <td><?php echo ucfirst($row['dexec'])  ?></td>
                                 </tr>
                                 <tr> 
                                     <td>What is your Expected Amount of Deposit ?</td> 
                                <td>$<?php echo number_format($row['damtDepo'])  ?></td>
                                 </tr>
                                  
     
     
     
                             </table>
                           </div>

                           <?php } }?>
                      </div>
                    </div>
                  </div>
                  
                
                  
                </div>
              </div>
              <div class="col-xl-3 xl-40">                 
                
              <?php include 'asider.php' ?>
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
       $(document).on("click", "#radioinline1", function(){
           $("#rest").html('<select name="specify" id="" class="form-control"> <option value="">Choose Speccification</option> <option value="0-1 Year">0-1 Year</option> <option value="1-2 Years">1-2 Years</option>  <option value="2-5 Years">2-5 Years</option>  <option value="5Years above">5Years above</option>  </select>')
       })

       $(document).on("click", "#radioinline2", function(){
           $("#rest").html('')
       })
    })
</script>
        
  </body>
 
</html>