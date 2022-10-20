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
                      <li class="breadcrumb-item">Risk Disclosure</li> 
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
                <div class="card">
                    <div class="card-body">

                    <?php echo isset( $_SESSION['msg'])? $_SESSION['msg']:"" ?>
                    <h4>Risk Disclosure</h4>
                    <hr>
                   <b class="text-danger">Please carefully read our Risk Disclosure Document.</b>
                    <ol style="list-style-type:decimal;">
                    <li>Leveraged and Margin trading in Fx, derivatives, precious metals, Contracts for
                    Difference “CFDs”, or other off-exchange products (also known as “over-the-counter”
                    or “OTC derivative products”) carries a high level of risk to your Money. And this type
                    of business is not suitable for everyone. The prices of these instruments can change
                    very fast, and no one can 100% predict or analyze the movement correctly, In most
                    cases, it can be very difficult to understand the price movement due to a lot of factors.</li>

                    <li>“Derivative” means You do not own the underlying assets or buy or sell the underlying
                    asset, or have any rights to, the underlying assets. Trading is not suitable for everyone,
                    the price of any asset class ( Fx, commodities, Crypto, etc,) you are holding may go
                    against your position and may result in the total loss of your trading capital if you are
                    a retail client and possibly greater in the case of a professional-client.</li>

                    <li>You should only deposit any money you can afford to lose. This statement provides
                    you with a non-exhaustive overview of the key risks that you should consider when
                    deciding whether to invest in this type of business with us. This statement does not
                    explain all the risks involved in trading or how the risks relate to your personal
                    circumstances. It is important that you read the relevant legal documentation to fully
                    understand the risks involved considering your personal circumstances before
                    deciding to trade with us. We recommend that you seek independent advice if you’re
                    unsure.</li>

                    <li>We are also required to assess whether our products and services are appropriate for
                    you and to warn you if, based on the information you provide, any product or service
                    is not appropriate. It’s your responsibility to understand the risks involved with our
                    products or services. Any decision to trade your account or do business with us is
                    entirely yours. If we warn you that any product or service may not be appropriate for
                    you based on your knowledge and experience, then you should refrain from doing
                    business with us. If you still wish to trade with us, you should only do so once you’ve
                    sufficiently familiarised yourself with our products and services through different
                    educational materials and understand the risks involved. It is up to you to assess
                    whether your financial resources are adequate for your trading activity with us.</li>

                    <li>We are not financial advisors, nor do we provide any regulatory, tax or legal advice.
                    Sometimes we will provide you with general information about the market and how
                    our various products and services work. Any information and analysis provided by us
                    is general in nature and does not consider your or your client’s personal objectives,
                    financial situation, or needs. You should not regard any of the information that we
                    provide to you as an investment recommendation or an offer to make a transaction.
                    We recommend that you seek specialist advice if you are uncertain about any of these
                    matters.</li>

                    <li>Derivative products and OTC markets are highly liquid. Trading in OTC or “nontransferable” derivatives may involve greater risk than investing in on-exchange
                    derivatives because there’s no exchange market on which to close out an open
                    position. It may not be possible to liquidate an existing position, to assess the value of
                    the position arising from an OTC derivative transaction or to assess the exposure to
                    risk. Bid and offer prices don’t need to be quoted, and, even where they are, they’ll
                    be established by dealers in these instruments. Consequently, it may be difficult to
                    establish what a fair price is. You should not invest in OTC derivative products unless
                    you understand their nature and the extent of your exposure to risk. You should also
                    be satisfied that the product is suitable for you in the light of your circumstances and
                    financial position.</li>

                    <li>Margin FX Contracts. The price of a Margin FX Contract is based on the underlying
                    instrument, which is the price of one currency relative to another. Please note that at
                    no stage will you take any physical delivery of currency (being the underlying
                    instrument) when trading Margin FX Contracts. Margin FX Contracts can be
                    differentiated from other foreign exchange products in that they allow the investor
                    an opportunity to trade foreign exchange on a margined basis as opposed to paying
                    for the full value of the currency. This “gearing” or “leverage” often obtainable in
                    trading Margin FX contracts means that a relatively small market movement can lead
                    to a proportionately much larger movement in the value of your investment.</li>

                    <li>Leverage can work against you as well as for you and may result in you losing all your
                    invested capital. We do not provide ownership or any rights to the underlying
                    instrument and do not entitle you to the delivery of the underlying instrument at any
                    stage. A CFD is an agreement between you and us to buy or sell the difference in the
                    value of an underlying instrument (On your behalf) from when a position is opened to
                    when it is closed. Therefore, If the price of the Instrument has moved in your favor, It
                    will be reflected in your account. Should the value of the CFD move against your
                    position, an amount will be deducted from your account. The amount of profit or loss
                    you make will be the difference between the price when the CFD is opened and the
                    price when it is closed.</li>

                    <li>On a general trading risk, Deposit and margin requirements, OTC derivative products
                    such as Margin FX Contracts, CFDs are leveraged products, which means that you can
                    open a position (also known as a contract) without having to fund the whole position.
                    Instead, you will be required to put up a deposit or “margin” to maintain each open
                    trade on your account. To open a trade, you must have sufficient funds on your
                    account to cover the margin requirement applicable to that trade. You will then need
                    to maintain sufficient net equity to keep that trade open.</li>

                    <li>If the market moves against you, you may be required to pay substantial additional
                    funds or margin at short notice to maintain your position. If you fail to do so within
                    the time required, your position may be liquidated at a loss. If you are a professional
                    client, you will be liable for any resulting deficit, so it is very important that you closely
                    monitor any open positions, to help uslimit the risk of any deficit if the market moves
                    against you.</li>

                    <li>Leverage OTC derivative products involve a high level of risk. Whilst the use of
                    leverage can work in your favor, it can also work against you. Even a slight fluctuation
                    in the market could lead to a proportionately much larger movement in the value of
                    your investment, and your potential losses may be far greater than the money you
                    deposit into your trading account.</li>

                    <li>Past performance of any investment is not necessarily a guide to future performance.
                    Fx and derivative markets will involve different risks from any markets. In some cases,
                    the risks will be greater. The potential for profit or loss from trading on fx and
                    derivative markets or in fx currency-denominated contracts will be affected by
                    fluctuations in foreign exchange rates.</li>
                    </ol>
 
 
                   

                    <div class="row mt-4">
                        <div class="col-md-7">
                            <form action="controller" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <input type="checkbox" <?php echo (userInfo($user, $email, 'dlimited')=='yes')?"checked":""  ?>  id="defaultCheck1" name="name" required value="yes" id="" >
                                    <label for="defaultCheck1">I have carefully read and understood the above write up and have agree to it</label>
                                </div>
 
                                                               
                                <button type="submit" name="saveRisk" class="btn btn-primary w-100" >Submit</button>

                                <!-- <button type="submit" name="saveRisk" <?php //echo (userInfo($user, $email, 'dlimited')=="yes")?"disabled":""  ?>  class="btn btn-primary w-100" >Submit</button> -->
                            </form>
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
  

        
  </body>
 
</html>