<header class="main-nav">
          <div class="logo-wrapper">
              <a href="https://ccitraders.com/">
                  <img class="img-fluid" src="../img/dlogo.png" alt="">
                </a>
            </div>
          <div class="logo-icon-wrapper">
                <a href="https://ccitraders.com/">
                  <img class="img-fluid" src="../img/dlogo.png" alt="">
                </a>
            </div>
            <div class="morden-logo">
                <a href="https://ccitraders.com/">
                    <img class="img-fluid" src="../img/dlogo.png" alt="">
                </a>
            </div>
          <nav>
            <div class="main-navbar">
              <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
              <div id="mainnav">
                <ul class="nav-menu custom-scrollbar">
                  <li class="back-btn">
                    <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                  </li>
                  

                  <li class="dropdown"><a class="nav-link menu-title link-nav" href="dashboard"><i data-feather="home"> </i><span>Dashboard</span></a></li>

                  
                  <?php if(userInfo($user, $email, 'dlimited')=='yes' AND userInfo($user, $email, 'dvastatus')=='Verified' AND userInfo($user, $email, 'driskName')!='' AND userInfo($user, $email, 'dbank')!=''){?>
                  <li class="dropdown"><a class="nav-link menu-title link-nav" href="deposit">
                  <i data-feather="briefcase"></i><span> Deposit </span></a></li> 

                  <li class="dropdown"><a class="nav-link menu-title link-nav" href="withdraw">
                  <i data-feather="briefcase"></i><span> Withdraw </span></a></li> 
                  <?php } ?>

                  <li class="dropdown"><a class="nav-link menu-title link-nav" href="kyc"><i data-feather="grid"> </i><span>KYC Legibility </span></a></li>
                  <li class="dropdown"><a class="nav-link menu-title link-nav" href="risk-disclosure"><i data-feather="grid"> </i><span>Risk Disclosure</span></a></li>
                  <li class="dropdown"><a class="nav-link menu-title link-nav" href="limited-power"><i data-feather="grid"> </i><span>Limited Power </span></a></li>

                  <li class="dropdown"><a class="nav-link menu-title link-nav" href="verification"><i data-feather="lock"></i><span>Verification</span></a></li> 

                  <li class="dropdown"><a class="nav-link menu-title link-nav" href="ref"><i data-feather="grid"></i><span>Partnership</span></a></li> 

                  <li class="dropdown"><a class="nav-link menu-title link-nav" href="start-trade"> 
                      <i data-feather="truck"></i>
                      <span >Request for a trade</span></a></li> 

                  <li class="dropdown"><a class="nav-link menu-title link-nav" href="stop-trade"> 
                      <i data-feather="truck"></i>
                      <span >Stop A Trade</span></a></li> 

                  <li class="dropdown"><a class="nav-link menu-title link-nav" <?php echo userInfo($user, $email,'turl') !=''? 'target="_blank"':"" ?> href="trade-monitor">
                  <i data-feather="briefcase"></i><span> Trade monitor </span></a></li>

                  <!-- <li class="dropdown"><a class="nav-link menu-title link-nav" <?php //echo userInfo($user, $email,'turl') !=''? 'target="_blank"':"" ?> href="<?php //echo userInfo($user, $email,'turl') !=''? userInfo($user, $email,'turl'):"javascript:void(0)" ?>">
                  <i data-feather="briefcase"></i><span> Trade monitor </span></a></li> -->

                  <li class="dropdown"><a class="nav-link menu-title link-nav" href="history">
                  <i data-feather="briefcase"></i><span> Trading History </span></a></li> 
                  <!-- <i data-feather="briefcase"></i><span> Transaction History </span></a></li>  -->
  
    <hr>
                  <li class="dropdown"><a class="nav-link menu-title link-nav" href="profile"><i data-feather="user"> </i><span>My Profile</span></a></li> 

                  <li class="dropdown"><a class="nav-link menu-title link-nav" href="change-password"><i data-feather="lock"> </i><span>Change Password</span></a></li> 
 

                  <hr>
                 
                  
                  <li class="dropdown"><a class="nav-link menu-title link-nav" href="../home"><i data-feather="home"> </i><span>Home Page</span></a></li> 

                  <li class="dropdown"><a class="nav-link menu-title link-nav" href="../contact"><i data-feather="list"> </i><span>Contacts</span></a></li> 
                  
                    
                   
                   
                  <li class="dropdown"><a class="nav-link menu-title link-nav" href="../faq"><i data-feather="help-circle"></i><span>FAQ</span></a></li>

                  <li class="dropdown"><a class="nav-link menu-title link-nav" href="logout"><i data-feather="log-in"> </i><span>Logout</span></a></li>
                    
                </ul> 
              </div>
              <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
            </div>
          </nav>
        </header>