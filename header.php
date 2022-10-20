<header>
    <!-- header content begin -->
    <div class="uk-section uk-padding-small in-profit-ticker">
        <div class="uk-container">
            <div class="uk-grid">
                <div class="uk-width-1-1">
                    <div data-uk-slider="autoplay: true; autoplay-interval: 5000">
                        <ul class="uk-grid-large uk-slider-items uk-child-width-1-3@s uk-child-width-1-6@m uk-text-center" data-uk-grid>
                            <li>
                                <i class="fas fa-angle-up in-icon-wrap small circle up"></i> XAUUSD <span class="uk-text-success">1478.81</span>
                            </li>
                            <li>
                                <i class="fas fa-angle-down in-icon-wrap small circle down"></i> GBPUSD <span class="uk-text-danger">1.3191</span>
                            </li>
                            <li>
                                <i class="fas fa-angle-down in-icon-wrap small circle down"></i> EURUSD <span class="uk-text-danger">1.1159</span>
                            </li>
                            <li>
                                <i class="fas fa-angle-up in-icon-wrap small circle up"></i> USDJPY <span class="uk-text-success">109.59</span>
                            </li>
                            <li>
                                <i class="fas fa-angle-up in-icon-wrap small circle up"></i> USDCAD <span class="uk-text-success">1.3172</span>
                            </li>
                            <li>
                                <i class="fas fa-angle-up in-icon-wrap small circle up"></i> USDCHF <span class="uk-text-success">0.9776</span>
                            </li>
                            <li>
                                <i class="fas fa-angle-down in-icon-wrap small circle down"></i> AUDUSD <span class="uk-text-danger">0.67064</span>
                            </li>
                            <li>
                                <i class="fas fa-angle-up in-icon-wrap small circle up"></i> GBPJPY <span class="uk-text-success">141.91</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="uk-section uk-padding-remove-vertical">
        <!-- module navigation begin -->
        <nav class="uk-navbar-container uk-navbar-transparent" data-uk-stickyx="show-on-up: true; top: 80; animation: uk-animation-fade;">
            <div class="uk-container" data-uk-navbar>
                <div class="uk-navbar-left uk-width-auto">
                    <div class="uk-navbar-item">
                        <!-- module logo begin -->
                        <a class="uk-logo" href="home">
                            <img class="in-offset-top-10" src="img/dlogo.png" data-src="img/dlogo.png" alt="logo" width="190" height="56" data-uk-img><br>
                            <small>Trading Since 2008.</small>
                        </a>
                        <!-- module logo begin -->
                    </div>
                </div>
                <div class="uk-navbar-right uk-width-expand uk-flex uk-flex-right">
                    <ul class="uk-navbar-nav uk-visible@m">

                        <li class="<?php basePage('home') ?>"> <a href="home">Home</a></li>
                        <li class="<?php basePage('market') ?>"><a href="market">Market</a></li>
                        <li class="<?php basePage('company') ?>"><a href="company">Company</a></li>
                        <li class="<?php basePage('about') ?>"><a href="about">About Us</a></li>
                        <li class="<?php basePage('education') ?>"><a href="education">Education</a></li>
                        <li class="<?php basePage('contact') ?>"><a href="contact">Contact Us</a></li>


                    </ul>
                    <div class="uk-navbar-item uk-visible@m in-optional-nav">
                        <div>
                            <?php if (isset($_SESSION['web'])) { ?>
                                <a href="user/dashboard" class="uk-button uk-button-text">My Dashboard</a>
                            <?php } else { ?>
                                <a href="login" class="uk-button uk-button-text">Login</a>
                                <a href="register" class="uk-button uk-button-text">Sign up</a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <!-- module navigation end -->
    </div>
    <!-- header content end -->
</header>