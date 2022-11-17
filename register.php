<?php include 'head.php' ?>

<body>

	<?php include 'header.php' ?>


	<main>

		<!-- section content begin -->

		<section class="uk-margin-large-bottom mt-40">
			<div class="uk-container">
				<div class="uk-grid uk-margin-medium-top">
					<div class="uk-width-2-5@l uk-width-2-1@m uk-width-1-1@s  uk-margin-auto">
						<?php echo isset($_SESSION['msg']) ? $_SESSION['msg'] : '' ?>

						<h3 class="block-title"><span>Create New Account</span></h3>
						<p>Create your free profile in a few minutes to access other securely log-in areas</p>
						<p class="uk-text-small uk-margin-remove-top uk-margin-medium-bottom">Already have an account? <a href="login">Login here</a></p>
						<!-- login form begin -->
						<form class="uk-grid uk-form" action="controller" method="post">
							<div class="uk-margin-small uk-width-1-1 uk-inline">
								<span class="uk-form-icon uk-form-icon-flip fas fa-user fa-sm"></span>
								<input class="uk-input uk-border-rounded" id="username" required type="text" name="name" placeholder="Fullname">
							</div>

							<div class="uk-margin-small uk-width-1-1 uk-inline">
								<span class="uk-form-icon uk-form-icon-flip fas fa-phone fa-sm"></span>
								<input class="uk-input uk-border-rounded" id="phone" required type="tel" name="phone" placeholder="Phone Number">
							</div>

							<div class="uk-margin-small uk-width-1-1 uk-inline">
								<span class="uk-form-icon uk-form-icon-flip fas fa-user fa-sm"></span>
								<input class="uk-input uk-border-rounded" id="username" value="" type="text" name="email" placeholder="Enter Email">
							</div>

							<div class="uk-margin-small uk-width-1-1 uk-inline">
								<span class="uk-form-icon uk-form-icon-flip fas fa-lock fa-sm"></span>
								<input class="uk-input uk-border-rounded" id="password" required type="password" name="pass" placeholder="Password">
							</div>
							<div class="uk-margin-small uk-width-1-1 uk-inline">
								<span class="uk-form-icon uk-form-icon-flip fas fa-lock fa-sm"></span>
								<input class="uk-input uk-border-rounded" id="password" required type="password" name="cpass" placeholder="Confirm Password">
							</div>
							<div class="uk-margin-small uk-width-1-1 uk-inline">
								<span class="uk-form-icon uk-form-icon-flip fas fa-user fa-sm"></span>
								<input class="uk-input uk-border-rounded" type="text" name="ref" value="<?php echo isset($_SESSION['ref']) ? $_SESSION['ref'] : "" ?>" placeholder="Referral ID (Optional)">
							</div>

							<div class="uk-margin-small uk-width-1-1">
								<button class="uk-button uk-width-1-1 uk-button-primary uk-border-rounded uk-float-left" type="submit" name="saveReg">Sign Up</button>
							</div>
						</form>
					</div>
		</section>


	</main>

	<?php include 'footer.php' ?>
	<?php include 'script.php' ?>
</body>


</html>