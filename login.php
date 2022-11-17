<?php include 'head.php' ?>

<body>

	<?php include 'header.php' ?>


	<main>

		<!-- section content begin -->

		<section class="uk-margin-large-bottom mt-40">
			<div class="uk-container">
				<div class="uk-grid uk-margin-medium-top">
					<div class="uk-width-2-5@l uk-width-2-1@m uk-width-1-1@s  uk-margin-auto">
						<?php echo isset($_SESSION['msg']) ? $_SESSION['msg'] : ''; ?>


						<h3 class="block-title"><span>Client Login Panel</span></h3>

						<p class="uk-text-small uk-margin-remove-top uk-margin-medium-bottom">Don't have an account? <a href="register">Register here</a></p>
						<!-- login form begin -->
						<form class="uk-grid uk-form" action="controller" method="post">
							<div class="uk-margin-small uk-width-1-1 uk-inline">
								<span class="uk-form-icon uk-form-icon-flip fas fa-user fa-sm"></span>
								<input class="uk-input uk-border-rounded" id="username" value="" type="text" name="email" placeholder="Enter Email">
							</div>
							<div class="uk-margin-small uk-width-1-1 uk-inline">
								<span class="uk-form-icon uk-form-icon-flip fas fa-lock fa-sm"></span>
								<input class="uk-input uk-border-rounded" id="password" value="" type="password" name="pass" placeholder="Password">
							</div>
							<div class="uk-margin-small uk-width-auto uk-text-small">
								<label><input class="uk-checkbox uk-border-rounded" type="checkbox"> Remember me</label>
							</div>
							<div class="uk-margin-small uk-width-expand uk-text-small">
								<label class="uk-align-right"><a class="uk-link-reset" href="./forgot">Forgot password?</a></label>
							</div>
							<div class="uk-margin-small uk-width-1-1">
								<button class="uk-button uk-width-1-1 uk-button-primary uk-border-rounded uk-float-left" type="submit" name="saveLog">Sign in</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</section>
	</main>

	<?php include 'footer.php' ?>
	<?php include 'script.php' ?>
</body>


</html>