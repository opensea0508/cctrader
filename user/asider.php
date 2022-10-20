<div class="card">
    <div class="card-body ">
        <h3 class="">Wallet Balance</h3>
        <h4 class="">$<?php echo (userInfo($user, $email, 'dwallet') != 0) ? number_format(userInfo($user, $email, 'dwallet')) : '0.00' ?></h4>
        <hr>
        <p><b>My Wallet Adrress:</b> <?php echo userInfo($user, $email, 'dwalletAddress')  ?></p>

        <hr>
        <p><b>Refferal Link:</b> </p>
        <input type="text" class="form-control" id="btc" value="https://www.ccitraders.com?ref=<?php echo userInfo($user, $email, 'drefCode') ?>">
        <div class="mt-2">
            <u><a href="ref">Click here</a></u> to learn more on how referral link work
        </div>
    </div>
</div>