 <!-- latest jquery-->
 <script src="./user/assets/js/jquery-3.5.1.min.js"></script>
 <!-- feather icon js-->
 <script src="./user/assets/js/icons/feather-icon/feather.min.js"></script>
 <script src="./user/assets/js/icons/feather-icon/feather-icon.js"></script>
 <!-- Sidebar jquery-->
 <script src="./user/assets/js/sidebar-menu.js"></script>
 <script src="./user/assets/js/config.js"> </script>
 <!-- Bootstrap js-->
 <script src="./user/assets/js/bootstrap/popper.min.js"></script>
 <script src="./user/assets/js/bootstrap/bootstrap.min.js"></script>
 <!-- Plugins JS start-->

 <script src="./user/assets/js/prism/prism.min.js"></script>
 <script src="./user/assets/js/clipboard/clipboard.min.js"></script>
 <script src="./user/assets/js/counter/jquery.waypoints.min.js"></script>
 <script src="./user/assets/js/counter/jquery.counterup.min.js"></script>
 <script src="./user/assets/js/counter/counter-custom.js"></script>
 <script src="./user/assets/js/custom-card/custom-card.js"></script>
 <!-- <script src="./user/assets/js/dashboard/default.js"></script> -->
 <!-- <script src="./user/assets/js/notify/index.js"></script> -->
 <!-- <script src="./user/assets/js/greeting.js"></script> -->

 <script src="./user/assets/js/sweet-alert/sweetalert.min.js"></script>
 <!-- <script src="./user/assets/js/notify/index.js"></script> -->
 <script src="./user/assets/js/notify/bootstrap-notify.min.js"></script>
 <script src="./user/assets/js/notify/notify-script.js"></script>

 <!-- Plugins JS Ends-->
 <!-- Theme js-->
 <script src="./user/assets/js/script.js"></script>
 <script src="../admin/notify.js"></script>
 <script src="./app.js"></script>
 <!-- login js-->
 <?php if (isset($_SESSION['msg'])) {
		unset($_SESSION['msg']);
	} ?>

 <script src="https://js.paystack.co/v1/inline.js"></script>


 <script>
 	$(document).ready(function() {
 		$("#btc").on("click", function() {
 			$("#btc").select();
 		})
 		$(document).on("keyup", "#currentx", function() {
 			var currentNow = Number($("#currentx").val());
 			var minWith = Number($(this).attr('data-min'));

 			//check current >=1000
 			if (currentNow >= minWith) {
 				$("#errx").html("")
 				$("#btnPayx").prop("disabled", false)
 			} else {
 				$("#errx").html("Your Minimum is $" + minWith)
 				$("#btnPayx").prop("disabled", true)
 			}

 		})

 		$(document).on("keyup", "#current", function() {
 			var rate = Number($("#rate").val());
 			var currentNow = Number($("#current").val());
 			var minWith = Number($(this).attr('data-min'));

 			//check current >=1000
 			if (currentNow >= minWith) {
 				$("#amount").val(rate * currentNow);
 				$("#rand").val(Math.floor(Math.random() * 920988990999999999))
 				$("#err").html("")
 				$("#btnPay").prop("disabled", false)
 			} else {
 				$("#err").html("Your Minimum is $" + minWith)
 				$("#btnPay").prop("disabled", true)
 			}

 		})
 	})
 	// sk_live_1978fce1fa1326569e44de4684f5877a57105c80
 	// pk_live_96d29cd69ead170acc2d220126a01cf1d29a9cf5

 	const paymentForm = document.getElementById('paymentForm');
 	paymentForm.addEventListener("submit", payWithPaystack, false);

 	function payWithPaystack(e) {
 		e.preventDefault();
 		let handler = PaystackPop.setup({
 			key: 'pk_test_8e1e5c9ded7e0f451a19c1c2b5437948134b402c', // Replace with your public key
 			email: document.getElementById("email-address").value,
 			amount: document.getElementById("amount").value * 100,
 			ref: 'CCITraders-' + document.getElementById("rand").value,
 			onClose: function() {
 				alert('Window closed.');
 			},
 			callback: function(response) {
 				// let message = 'Payment complete! Reference: ' + response.reference;
 				// alert(message);
 				// console.log(response)
 				const amount = document.getElementById("amount").value;
 				$.ajax({
 					url: 'verify_transaction?reference=' + response.reference + '&amount=' + amount,
 					method: 'get',
 					success: function(response) {
 						// the transaction status is in response.data.status
						console.log('response: ', response)
						alert('success. transaction ref is ' + response.reference);
 						window.location.reload();
 					}
 				});
 			}
 		});
 		handler.openIframe();
 	}


 	<?php if (isset($_SESSION['msgs'])) { ?>
 		notifyMe('Success!', <?php echo $_SESSION['msgs'] ?>, "success")
 	<?php unset($_SESSION['msgs']);
		}
		if (isset($_SESSION['msgx'])) { ?>
 		notifyMe('Fail!', <?php echo $_SESSION['msgx'] ?>, "danger")
 	<?php unset($_SESSION['msgx']);
		} ?>
 </script>