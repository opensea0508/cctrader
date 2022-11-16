<?php include 'head.php' ?>

<body>
	<?php include 'header.php' ?>

	<!-- breadcrumb content begin -->
	<div class="uk-section uk-padding-remove-vertical">
		<div class="uk-container">
			<div class="uk-grid">
				<div class="uk-width-1-1 in-breadcrumb">
					<ul class="uk-breadcrumb uk-float-right">
						<li><a href="#">Home</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- breadcrumb content end -->
	<main>
		<?php $id = clean($_GET['id']);
		$sql = runQuery("SELECT * FROM dcourse WHERE cid='$id' ");
		if (numRows($sql) > 0) {
			$row = fetchAssoc($sql);

		?>
			<!-- section content begin -->
			<div class="uk-section">
				<div class="uk-container">
					<div class="uk-grid">
						<div class="uk-width-1-1 uk-flex uk-flex-center">
							<div class="uk-width-3-5@m uk-text-center">
								<h2 class="uk-margin-remove"><?php echo $row['dtitle'] ?>.</h2>
								<hr>
								<img src="./admin/files/<?php echo $row['dimg'] ?>.png" alt="">
								<h4>&#8358; <?php echo number_format($row['damount']) ?></h4>
								<p><?php echo $row['ddesc'] ?></p>
								<hr>

								<center>

									<style>
										.box {
											width: 70%;
										}

										@media screen and (max-width:700px) {
											.box {
												width: 100%;
											}
										}
									</style>
									<div class="box">
										<?php echo isset($_SESSION['msg']) ? $_SESSION['msg'] : ''; ?>
										<form id="paymentForm" class="uk-form uk-grid-small uk-margin-medium-top" data-uk-grid>
											<input type="hidden" value="<?php echo $row['damount'] ?>" id="amount" />
											<input type="hidden" value="<?php echo $row['cid'] ?>" id="id" />
											<input type="hidden" value="<?php echo rand(20093094324, 98376437890) ?>" id="rand" />


											<div class="uk-width-1-2@sm uk-inline">
												<span class="uk-form-icon fas fa-pen fa-sm"></span>
												<input class="uk-input uk-border-rounded" id="name" name="subject" required type="text" placeholder="Fullname">
											</div>

											<div class="uk-width-1-2@sm uk-inline">
												<span class="uk-form-icon fas fa-envelope fa-sm"></span>
												<input class="uk-input uk-border-rounded" id="email-address" required name="email" type="email" placeholder="Email address">
											</div>


											<div class="uk-width-1-1">
												<button type="submit" id="btnPay" class="uk-button uk-button-primary uk-border-rounded" onclick="payWithPaystack()"> Make Payment </button>
											</div>
										</form>
									</div>

								</center>
							</div>
						</div>
						<!-- <div class="uk-width-1-1"></div> -->
					</div>
				</div>
			</div>
			<!-- section content end -->
		<?php } ?>

	</main>

	<?php include 'footer.php';
	unset($_SESSION['msg']) ?>
	<?php include 'script.php' ?>

	<script src="./user/assets/js/jquery-3.5.1.min.js"></script>


	<script src="https://js.paystack.co/v1/inline.js"></script>


	<script>
		// sk_live_1978fce1fa1326569e44de4684f5877a57105c80
		// pk_live_96d29cd69ead170acc2d220126a01cf1d29a9cf5

		const paymentForm = document.getElementById('paymentForm');
		paymentForm.addEventListener("submit", payWithPaystack, false);

		function payWithPaystack(e) {
			e.preventDefault();
			let handler = PaystackPop.setup({
				key: 'pk_live_96d29cd69ead170acc2d220126a01cf1d29a9cf5', // Replace with your public key
				email: document.getElementById("email-address").value,
				amount: document.getElementById("amount").value * 100,
				ref: 'CCITraders-' + document.getElementById("rand").value,
				onClose: function() {
					// alert('Window closed.');
				},
				callback: function(response) {
					// let message = 'Payment complete! Reference: ' + response.reference;
					// alert(message);
					// console.log(response)
					const id = document.getElementById("id").value;
					const email = document.getElementById("email-address").value
					const name = document.getElementById("name").value
					console.log(id, email, name)
					$.ajax({
						url: 'verify_transaction?reference=' + response.reference + '&cid=' + id + '&name=' + name + '&email=' + email,
						method: 'get',
						success: function(response) {
							// the transaction status is in response.data.status
							window.location.reload();
						}
					});
				}
			});
			handler.openIframe();
		}
	</script>
</body>


</html>