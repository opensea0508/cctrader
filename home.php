<?php include 'head.php' ?>

<body>

  <?php include 'header.php' ?>

  <main>
    <!-- slideshow content begin -->
    <div class="uk-section uk-padding-remove-vertical">
      <div class="in-slideshow uk-visible-toggle" data-uk-slideshow>
        <ul class="uk-slideshow-items">
          <li>
            <div class="uk-container">
              <div class="uk-grid" data-uk-grid>
                <div class="uk-width-1-2@m">
                  <div class="uk-overlay">
                    <h1>Discover the impact of financial technology on institutional trading</h1>
                    <p class="uk-text-lead uk-visible@m">Become an Institutional investor with just $200.</p>
                    <div class="in-slideshow-button">
                      <?php if (isset($_SESSION['web'])) { ?>
                        <a href="user/dashboard" class="uk-button uk-button-primary uk-border-rounded">My Dashboard</a>
                      <?php } else { ?>
                        <a href="register" class="uk-button uk-button-primary uk-border-rounded">Register Now</a>
                      <?php } ?>
                    </div>
                    <p class="uk-text-small"><span class="uk-text-primary">*</span>Trading since 2008. Best execution</p>
                  </div>
                </div>
                <div class="uk-position-center">
                  <img class="uk-animation-slide-top-small" src="img/in-lazy.svg" data-src="img/in-slideshow-image-1.png" alt="slideshow-image" width="862" height="540" data-uk-img>
                </div>
              </div>
            </div>
          </li>
          <li>
            <div class="uk-container">
              <div class="uk-grid" data-uk-grid>
                <div class="uk-width-1-2@m">
                  <div class="uk-overlay">

                    <h1>We are closer, <span class="in-highlight">Bigger,</span> and Stronger than you think</h1>
                    <p class="uk-text-lead uk-visible@m">We build our bridges through the firms that you know</p>
                    <div class="in-slideshow-button">
                      <?php if (isset($_SESSION['web'])) { ?>
                        <a href="user/dashboard" class="uk-button uk-button-primary uk-border-rounded">My Dashboard</a>
                      <?php } else { ?>
                        <a href="register" class="uk-button uk-button-primary uk-border-rounded">Register Now</a>
                      <?php } ?>
                    </div>
                  </div>
                </div>
                <div class="uk-position-center">
                  <img class="uk-animation-slide-top-small" src="img/in-lazy.svg" data-src="img/in-slideshow-image-2.png" alt="slideshow-image" width="862" height="540" data-uk-img>
                </div>
              </div>
            </div>
          </li>
          <li>
            <div class="uk-container">
              <div class="uk-grid" data-uk-grid>
                <div class="uk-width-1-2@m">
                  <div class="uk-overlay">
                    <h1>Experience innovation in a new light. Connecting to the worldwide oil and gas business, commodities, precious metals, and others</h1>
                    <!-- <h1>Get more <span class="in-highlight">freedom</span> in the markets.</h1> -->
                    <p class="uk-text-lead uk-visible@m">Trade Cryptocurrencies, Stock Indices, Commodities and Forex from a single account</p>
                    <div class="in-slideshow-button">
                      <?php if (isset($_SESSION['web'])) { ?>
                        <a href="user/dashboard" class="uk-button uk-button-primary uk-border-rounded">My Dashboard</a>
                      <?php } else { ?>
                        <a href="register" class="uk-button uk-button-primary uk-border-rounded">Register Now</a>
                      <?php } ?>
                    </div>
                    <p class="uk-text-small"><span class="uk-text-primary">*</span>Trading since 2008. Best execution</p>
                  </div>
                </div>
                <div class="uk-position-center">
                  <img class="uk-animation-slide-top-small" src="img/in-lazy.svg" data-src="img/in-slideshow-image-3.png" alt="slideshow-image" width="862" height="540" data-uk-img>
                </div>
              </div>
            </div>
          </li>

          <li>
            <div class="uk-container">
              <div class="uk-grid" data-uk-grid>
                <div class="uk-width-1-2@m">
                  <div class="uk-overlay">
                    <h1>$5,000,000 profit target for 2023. Let’s build a stronger 2023</h1>
                    <p class="uk-text-lead uk-visible@m">Covesting allows you to automatically copy top performing traders and achieve the returns</p>
                    <div class="in-slideshow-button">
                      <?php if (isset($_SESSION['web'])) { ?>
                        <a href="user/dashboard" class="uk-button uk-button-primary uk-border-rounded">My Dashboard</a>
                      <?php } else { ?>
                        <a href="register" class="uk-button uk-button-primary uk-border-rounded">Register Now</a>
                      <?php } ?>
                    </div>
                    <!-- <p class="uk-text-small"><span class="uk-text-primary">*</span>Trading since 2008. Best execution</p> -->
                  </div>
                </div>
                <div class="uk-position-center">
                  <img class="uk-animation-slide-top-small" src="img/in-lazy.svg" data-src="img/in-slideshow-image-2.png" alt="slideshow-image" width="862" height="540" data-uk-img>
                </div>
              </div>
            </div>
          </li>
        </ul>
        <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" data-uk-slidenav-previous data-uk-slideshow-item="previous"></a>
        <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" data-uk-slidenav-next data-uk-slideshow-item="next"></a>
        <div class="uk-container in-slideshow-feature uk-visible@m">
          <div class="uk-grid uk-flex uk-flex-center">
            <div class="uk-width-3-4@m">
              <div class="uk-child-width-1-4" data-uk-grid>
                <div class="uk-flex uk-flex-middle">
                  <div class="uk-margin-small-right">
                    <i class="fas fa-drafting-compass in-icon-wrap small circle uk-box-shadow-small"></i>
                  </div>
                  <div>
                    <p class="uk-text-bold uk-margin-remove">Enhanced Tools</p>
                  </div>
                </div>
                <div class="uk-flex uk-flex-middle">
                  <div class="uk-margin-small-right">
                    <i class="fas fa-book in-icon-wrap small circle uk-box-shadow-small"></i>
                  </div>
                  <div>
                    <p class="uk-text-bold uk-margin-remove">Trading Guides</p>
                  </div>
                </div>
                <div class="uk-flex uk-flex-middle">
                  <div class="uk-margin-small-right">
                    <i class="fas fa-bolt in-icon-wrap small circle uk-box-shadow-small"></i>
                  </div>
                  <div>
                    <p class="uk-text-bold uk-margin-remove">Fast execution</p>
                  </div>
                </div>
                <div class="uk-flex uk-flex-middle">
                  <div class="uk-margin-small-right">
                    <i class="fas fa-percentage in-icon-wrap small circle uk-box-shadow-small"></i>
                  </div>
                  <div>
                    <p class="uk-text-bold uk-margin-remove">0% Commission</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- slideshow content end -->
    <!-- section content begin -->
    <div class="uk-section uk-section-muted in-padding-large-vertical@s in-profit-1">
      <div class="uk-container">
        <div class="uk-grid-divider" data-uk-grid>
          <div class="uk-width-expand@m in-margin-top-20@s">
            <h2>Why CCI is a Trusted trading Firm</h2>
            <p>With our extensive knowledge of the worldwide market and other instruments like as oil and gas, commodities, precious metals, Algro commodities, CFDs, indices, and others, we provide prospective clients with a competitive advantage that they will not find elsewhere.</p>
          </div>
          <div class="uk-width-2-3@m">
            <div class="uk-child-width-1-2@s uk-child-width-1-2@m" data-uk-grid>
              <div class="uk-flex uk-flex-middle">
                <div class="uk-margin-right">
                  <img src="img/in-lazy.svg" data-src="img/in-profit-icon-1.svg" alt="profit-icon" width="72" height="72" data-uk-img>
                </div>
                <div>
                  <p class="uk-text-bold">Wide Range of Trading Instruments</p>
                </div>
              </div>
              <div class="uk-flex uk-flex-middle">
                <div class="uk-margin-right">
                  <img src="img/in-lazy.svg" data-src="img/in-profit-icon-2.svg" alt="profit-icon" width="72" height="72" data-uk-img>
                </div>
                <div>
                  <p class="uk-text-bold">Unparalleled Trading Conditions</p>
                </div>
              </div>
              <div class="uk-flex uk-flex-middle">
                <div class="uk-margin-right">
                  <img src="img/in-lazy.svg" data-src="img/in-profit-icon-3.svg" alt="profit-icon" width="72" height="72" data-uk-img>
                </div>
                <div>
                  <p class="uk-text-bold">Globally Licensed &amp; Regulated</p>
                </div>
              </div>
              <div class="uk-flex uk-flex-middle">
                <div class="uk-margin-right">
                  <img src="img/in-lazy.svg" data-src="img/in-profit-icon-4.svg" alt="profit-icon" width="72" height="72" data-uk-img>
                </div>
                <div>
                  <p class="uk-text-bold">Committed to Forex Education</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- section content end -->
    <!-- section content begin -->
    <div class="uk-section uk-padding-large in-padding-large-vertical@s uk-background-contain in-profit-2" data-src="img/in-profit-decor-3.svg" data-uk-img>
      <div class="uk-container">
        <div class="uk-grid uk-flex uk-flex-center">
          <div class="uk-width-1-2@m uk-text-center">
            <h2>Experience more than Trading.</h2>
            <p class="uk-text-lead">We are a private institutional trading firm, Registered in St. Vincent under the Financial Services Authority. We are not a financial institution and do not offer a retail trading firm. </p>
          </div>
          <div class="uk-width-5-6@m">
            <div class="uk-child-width-1-2@s uk-child-width-1-2@m uk-margin-medium-top" data-uk-grid>
              <!-- <div>
                <div class="in-pricing-1">
                  <div class="uk-card uk-card-default uk-box-shadow-medium">
                    <div class="uk-card-media-top">
                      <img class="uk-width-1-1 uk-align-center" src="img/in-lazy.svg" data-src="img/in-profit-content-1.jpg" data-width data-height alt="sample-image" data-uk-img>
                      <span></span>
                    </div>
                    <div class="uk-card-body">
                      <div class="in-heading-extra in-card-decor-1">
                        <h2 class="uk-margin-remove-bottom">Category 1</h2>
                      </div>
                      <p class="uk-margin-small-top">
                        Minimum Requirement $250 <br>
                        Maximum Leverage 1.50<br>
                        Instrument: - Few asset Class<br>
                        Stop-out Protection 50% <br>
                        Performance Fees 30%.<br>
                        Management fees 5%<br>
                        Access to trading histories<br>
                        Access to Monitor Room<br>

                      </p>
                    </div>
                  </div>
                </div>
              </div>
              <div>
                <div class="in-pricing-1">
                  <div class="uk-card uk-card-default uk-box-shadow-medium">
                    <div class="uk-card-media-top">
                      <img class="uk-width-1-1 uk-align-center" src="img/in-lazy.svg" data-src="img/in-profit-content-2.jpg" data-width data-height alt="sample-image" data-uk-img>
                      <span></span>
                    </div>
                    <div class="uk-card-body">
                      <div class="in-heading-extra in-card-decor-2">
                        <h2 class="uk-margin-remove-bottom">Category 2</h2>
                      </div>
                      <p class="uk-margin-small-top">
                        Minimum Requirement $5000 <br>
                        Maximum Leverage 1.30<br>
                        Instrument: - All assets class<br>
                        Stop-out Protection 50% <br>
                        Performance Fees 20%.<br>
                        No management fees<br>
                        Access to trading histories<br>
                        Access to Monitor Room<br>

                      </p>
                    </div>
                  </div>
                </div>
              </div> -->
              <div class="uk-width-1-1">
                <div class="uk-card uk-card-default uk-card-body in-profit-appcard">
                  <div class="uk-child-width-1-2@m" data-uk-grid>
                    <div>
                      <div data-uk-margin>
                        <a href="https://play.google.com/store/apps/details?id=com.xoh.xohtrader" target="_blank" class="uk-button in-button-app uk-margin-small-right">
                          <i class="fab fa-google-play fa-2x"></i>
                          <span class="wrapper">Download from<span>Play Store</span></span>
                        </a>
                        <a href="https://xs5.xopenhub.pro/real-ccitraders-real/desktop/mac/CCI%20Traders-Setup.dmg" target="_blank" class="uk-button in-button-app">
                          <i class="fab fa-apple fa-2x"></i>
                          <span class="wrapper">Download from<span>App Store</span></span>
                        </a>
                      </div>
                      <hr>
                      <p>Trade on <span class="uk-text-bold uk-text-primary">world class platform</span> without a doubt.</p>
                    </div>
                    <div class="uk-visible@m">
                      <img src="img/in-lazy.svg" data-src="img/in-profit-mockup-1.png" width="450" height="203" alt="profit-mockup" data-uk-img>
                    </div>
                  </div>
                </div>
              </div>
              <div class="uk-width-1-1">
                <div class="uk-grid uk-grid-divider uk-grid-match in-profit-tradestatus" data-uk-grid>
                  <h1>
                  $2,000,000+ Traded on Profit
                  </h1>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- section content end -->
    <!-- section content begin -->
    <div class="uk-section uk-section-secondary uk-padding-large uk-background-contain uk-background-bottom-center in-padding-large-vertical@s in-profit-3" data-src="img/in-section-profit-3.png" data-uk-img>
      <div class="uk-container uk-margin-small-bottom">
        <div class="uk-grid-large" data-uk-grid>
          <div class="uk-width-1-2@m">
            <h2>We are committed to meeting your trading needs through innovative technology.</h2>
            <!-- <p class="uk-text-lead">Excepteur occaeca cupidata non proident fugiat nulla pariatur quasi architecto beatae, sunt in culpa quila officia deserunt mollit anim id est aute laborum.</p> -->
          </div>
        </div>
      </div>
    </div>
    <!-- section content end -->
    <!-- section content begin -->
    <div class="uk-section uk-padding-large in-padding-large-vertical@s in-profit-4">
      <div class="uk-container uk-margin-small-top uk-margin-medium-bottom">
        <div class="uk-grid uk-flex uk-flex-center " data-uk-grid>
          <div class="uk-width-5-6@m">
            <div class="uk-grid uk-flex-middle" data-uk-grid>
              <div class="uk-width-expand@m">
                <h2>Connect to global capital markets</h2>
              </div>
              <div class="uk-width-3-5@m">
                <p class="uk-text-lead">Access 40,000+ trading instruments and professional asset management on award-winning platforms.</p>
              </div>
            </div>
          </div>
          <!-- <div class="uk-width-1-1">
                        <div class="uk-child-width-1-2@s uk-child-width-1-5@m in-profit-stockprice" data-uk-grid>
                            <div>
                                <div class="uk-card uk-card-body uk-card-small uk-card-default uk-border-pill">
                                    <span class="uk-float-left">
                                        <img src="img/in-lazy.svg" data-src="img/in-profit-ticker-1.svg" alt="profit-ticker" width="77" height="20" data-uk-img>
                                    </span>
                                    <span class="uk-float-right down">
                                        <i class="fas fa-arrow-down"></i>1,526.05
                                    </span>
                                </div>
                            </div>
                            <div>
                                <div class="uk-card uk-card-body uk-card-small uk-card-default uk-border-pill">
                                    <span class="uk-float-left">
                                        <img src="img/in-lazy.svg" data-src="img/in-profit-ticker-2.svg" alt="profit-ticker" width="77" height="20" data-uk-img>
                                    </span>
                                    <span class="uk-float-right down">
                                        <i class="fas fa-arrow-down"></i>205.37
                                    </span>
                                </div>
                            </div>
                            <div>
                                <div class="uk-card uk-card-body uk-card-small uk-card-default uk-border-pill">
                                    <span class="uk-float-left">
                                        <img src="img/in-lazy.svg" data-src="img/in-profit-ticker-3.svg" alt="profit-ticker" width="77" height="20" data-uk-img>
                                    </span>
                                    <span class="uk-float-right down">
                                        <i class="fas fa-arrow-down"></i>267.97
                                    </span>
                                </div>
                            </div>
                            <div>
                                <div class="uk-card uk-card-body uk-card-small uk-card-default uk-border-pill">
                                    <span class="uk-float-left">
                                        <img src="img/in-lazy.svg" data-src="img/in-profit-ticker-4.svg" alt="profit-ticker" width="77" height="20" data-uk-img>
                                    </span>
                                    <span class="uk-float-right up">
                                        <i class="fas fa-arrow-up"></i>59,230
                                    </span>
                                </div>
                            </div>
                            <div class="uk-visible@m">
                                <div class="uk-card uk-card-body uk-card-small uk-card-default uk-border-pill">
                                    <span class="uk-float-left">
                                        <img src="img/in-lazy.svg" data-src="img/in-profit-ticker-5.svg" alt="profit-ticker" width="77" height="20" data-uk-img>
                                    </span>
                                    <span class="uk-float-right up">
                                        <i class="fas fa-arrow-up"></i>78.98
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div> -->
          <div class="uk-width-5-6@m">
            <div class="uk-grid-large uk-flex-middle" data-uk-grid>
              <div class="uk-width-auto@m">
                <h4 class="uk-margin-remove-bottom uk-text-primary">Ready to trade?</h4>
                <p class="uk-margin-remove-top">Get started with your trading account today.</p>
              </div>
              <div class="uk-width-expand@m">
                <form class="uk-grid-small" data-uk-grid>
                  <div class="uk-width-1-1 uk-width-expand@m">
                    <input class="uk-input uk-border-rounded" type="text" placeholder="Email address...">
                  </div>
                  <div class="uk-width-1-1 uk-width-expand@m">
                    <input class="uk-input uk-border-rounded" type="text" placeholder="Phone number...">
                  </div>
                  <div class="uk-width-1-1 uk-width-auto@m">
                    <button class="uk-button uk-button-primary uk-border-rounded uk-width-expand">Open Account</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </main>


  <?php include 'footer.php' ?>
  <?php include 'script.php' ?>
</body>

</html>