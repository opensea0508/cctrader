
   <?php include 'head.php' ?>

  <body>
     
    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
      <!-- Page Header Start-->
   <?php include 'header.php' ?>
 
      <!-- Page Header Ends                              -->
      <!-- Page Body Start-->
      <div class="page-body-wrapper sidebar-icon">
        <!-- Page Sidebar Start-->
        <?php include 'aside.php' ?>

        <!-- Page Sidebar Ends-->
        <div class="page-body">
          <div class="container-fluid">
            <div class="page-header">
              <div class="row">
                <div class="col-sm-6">
                  <h3>Chat </h3>
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="home"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Chat</li> 
                  </ol>
                </div>
                <div class="col-sm-6">
                  <!-- Bookmark Start-->
                  
                  <!-- Bookmark Ends-->
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="row">
              <div class="col call-chat-sidebar">
                <div class="card">
                  <div class="card-body chat-body">
                    <div class="chat-box">
                      <!-- Chat left side Start-->
                      <div class="chat-left-aside">
                        <div class="media"><img class="rounded-circle user-image" src="./assets/images/user/12.png" alt="">
                          <div class="media-body">
                            <div class="about">
                              <div class="name f-w-600">Mark Jecno</div>
                              <div class="status">Status...</div>
                            </div>
                          </div>
                        </div>
                        <div class="people-list" id="people-list">
                           
                        </div>
                      </div>
                      <!-- Chat left side Ends-->
                    </div>
                  </div>
                </div>
              </div>
              <div class="col call-chat-body">
                <div class="card">
                  <div class="card-body p-0">
                    <div class="row chat-box">
                      <!-- Chat right side start-->
                      <div class="col chat-right-aside">
                        <!-- chat start-->
                        <div class="chat">
                          <!-- chat-header start-->
                           
                          <!-- chat-header end-->
                          <div class="chat-history mt-3 chat-msg-box custom-scrollbar">
                            <ul>
                              <li>
                                <div class="message my-message"><img class="rounded-circle float-start chat-user-img img-30" src="./assets/images/user/3.png" alt="">
                                  <div class="message-data text-end"><span class="message-data-time">10:12 am</span></div>                                                            Are we meeting today? Project has been already finished and I have results to show you.
                                </div>
                              </li>
                              
                            </ul>
                          </div>
                          <!-- end chat-history-->
                          <div class="chat-message clearfix">
                            <div class="row">
                              <div class="col-xl-12 d-flex">
                                <div class="smiley-box bg-primary">
                                  <div class="picker"><img src="./assets/images/smiley.png" alt=""></div>
                                </div>
                                <div class="input-group text-box">
                                  <input class="form-control input-txt-bx" id="message-to-send" type="text" name="message-to-send" placeholder="Type a message......">
                                  <button class="btn btn-primary input-group-text" type="button">SEND</button>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- end chat-message-->
                          <!-- chat end-->
                          <!-- Chat right side ends-->
                        </div>
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
        <div class="tap-top"><i class="icon-control-eject"></i></div>
        <!-- tap on tap ends-->
        <!-- footer start-->
        <?php include 'footer.php' ?>
        
      </div>
    </div>
    <!-- latest jquery-->
   <?php include 'script.php' ?>
    <!-- Plugin used-->
  </body>

  
</html>