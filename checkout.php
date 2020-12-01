<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>flywithus</title>
	<!-- favion -->
	<link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
	<!-- link to font awesome -->
	<link media="all" rel="stylesheet" href="vendors/font-awesome/css/font-awesome.css">
	<!-- link to material icon font -->
	<link media="all" rel="stylesheet" href="vendors/material-design-icons/material-icons.css">
	<!-- link to custom icomoon fonts -->
	<link rel="stylesheet" type="text/css" href="css/fonts/icomoon/icomoon.css">
	<!-- link to wow js animation -->
	<link media="all" rel="stylesheet" href="vendors/animate/animate.css">
	<!-- include bootstrap css -->
	<link media="all" rel="stylesheet" href="css/bootstrap.css">
	<!-- include main css -->
	<link media="all" rel="stylesheet" href="css/main.css">
</head>
<body class="default-page">
	<div class="preloader" id="pageLoad">
		<div class="holder">
			<div class="coffee_cup"></div>
		</div>
	</div>
	<!-- main wrapper -->
	<div id="wrapper">
		<div class="page-wrapper">
			<!-- main header -->
		<?php include 'header.php'; ?>
			<!-- main container -->
			<main id="main">
				<!-- top information area -->
				<div class="inner-top">
					<div class="container">
						<h1 class="inner-main-heading">Checkout</h1>
						<!-- breadcrumb -->
						<nav class="breadcrumbs">
							<ul>
								<li><a href="#">Home</a></li>
								<li><a href="#">pages</a></li>
								<li><span>Checkout</span></li>
							</ul>
						</nav>
					</div>
				</div>
				<div class="inner-main common-spacing container">
					<!-- booking form -->
					<form class="booking-form" action="#">
						<div class="row same-height">
							<div class="col-md-6">
								<div class="top-box">
									<a href="#" class="holder height">
										<span class="left">Are You Returning Customer? </span>
										<span class="right">Login Here</span>
										<span class="arrow"></span>
									</a>
								</div>
							</div>
							<div class="col-md-6">
								<div class="top-box">
									<a href="#" class="holder height">
										<span class="left">Have a Promotional Coupon? </span>
										<span class="right">Enter Coupon Code</span>
										<span class="arrow"></span>
									</a>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-holder">
									<h2 class="small-size">Billing Information</h2>
									<div class="wrap">
										<div class="row">
											<div class="col-md-6">
												<div class="hold">
													<label for="name">First Name</label>
													<input type="text" id="name" class="form-control">
												</div>
											</div>
											<div class="col-md-6">
												<div class="hold">
													<label for="lname">Last Name</label>
													<input type="text" id="lname" class="form-control">
												</div>
											</div>
										</div>
										<div class="hold">
											<label for="cname">Company Name</label>
											<input type="text" id="cname" class="form-control">
										</div>
										<div class="hold">
											<label for="address">Address</label>
											<input type="text" id="address" class="form-control">
										</div>
										<div class="hold">
											<label for="city">City / Town</label>
											<input type="text" id="city" class="form-control">
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="hold">
													<label for="em">Email address</label>
													<input type="email" id="em" class="form-control">
												</div>
											</div>
											<div class="col-md-6">
												<div class="hold">
													<label for="phn">Phone</label>
													<input type="text" id="phn" class="form-control">
												</div>
											</div>
										</div>
										<ul class="option">
											<li>
												<header class="title">
													<label class="custom-radio">
														<input type="radio" name="pay">
														<span class="check-input"></span>
														<span class="check-label">Check Payment</span>
													</label>
												</header>
												<div class="info-hold">
													<p>Please send your cheque to flywithus Inc. Address, Thank You!</p>
												</div>
											</li>
											<li>
												<header class="title">
													<label class="custom-radio">
														<input type="radio" name="pay">
														<span class="check-input"></span>
														<span class="check-label">Paypal Payment</span>
													</label>
												</header>
												<div class="info-hold">
													<p>If you dont have paypal account - you can still pay using credit cards!</p>
												</div>
											</li>
										</ul>
										<ul class="payment-option">
											<li>
												<img alt="visa" src="img/footer/visa.png">
											</li>
											<li>
												<img width="33" height="20" alt="master card" src="img/footer/mastercard.png">
											</li>
											<li>
												<img width="72" height="20" alt="paypal" src="img/footer/paypal.png">
											</li>
											<li>
												<img width="33" height="20" alt="maestro" src="img/footer/maestro.png">
											</li>
											<li>
												<img width="55" height="20" alt="bank transfer" src="img/footer/bank-transfer.png">
											</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-holder">
									<h2 class="small-size">Additional Notes</h2>
									<div class="wrap">
										<div class="hold">
											<label for="txt">Your Comment</label>
											<textarea id="txt" class="form-control" placeholder="Please enter any additional information here, eg. food/drug requirements etc."></textarea>
										</div>
									</div>
									<div class="order-block">
										<h2 class="small-size">Preview Order</h2>
										<div class="wrap">
											<table class="product-table">
												<thead>
													<tr>
														<th>Selected Tours</th>
														<th>Total Price</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>
															<span class="title">Everest Trekking &emsp;<span class="amount">x&emsp; 3</span></span>
															<time datetime="2016-09-29">Booking Date:&emsp; 14th Jan 2016</time>
														</td>
														<td>
															<span class="amount">$2,999</span>
														</td>
													</tr>
													<tr>
														<td>
															<span class="title">Bungee Jumping &emsp;<span class="amount">x&emsp; 2</span></span>
															<time datetime="2016-09-29">Booking Date:&emsp; 14th Jan 2016</time>
														</td>
														<td>
															<span class="amount">$1,999</span>
														</td>
													</tr>
												</tbody>
												<tfoot>
													<tr>
														<td>Total Price</td>
														<td>$4,988</td>
													</tr>
												</tfoot>
											</table>
											<button type="submit" class="btn btn-default">Confirm booking</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</main>
		</div>
		<!-- main footer -->
	<?php include 'footer.php'; ?>
	</div>
	<!-- scroll to top -->
	<div class="scroll-holder text-center">
		<a href="javascript:" id="scroll-to-top"><i class="icon-arrow-down"></i></a>
	</div>
	<!-- jquery library -->
	<script src="vendors/jquery/jquery-2.1.4.min.js"></script>
	<!-- external scripts -->
	<script src="vendors/bootstrap/javascripts/bootstrap.min.js"></script>
	<script src="vendors/jquery-placeholder/jquery.placeholder.min.js"></script>
	<script src="vendors/match-height/jquery.matchHeight.js"></script>
	<script src="vendors/wow/wow.min.js"></script>
	<script src="vendors/stellar/jquery.stellar.min.js"></script>
	<script src="vendors/validate/jquery.validate.js"></script>
	<script src="vendors/waypoint/waypoints.min.js"></script>
	<script src="vendors/counter-up/jquery.counterup.min.js"></script>
	<script src="vendors/jquery-ui/jquery-ui.min.js"></script>
	<script src="vendors/jQuery-touch-punch/jquery.ui.touch-punch.min.js"></script>
	<script src="vendors/fancybox/jquery.fancybox.js"></script>
	<script src="vendors/owl-carousel/owl.carousel.min.js"></script>
	<script src="vendors/jcf/js/jcf.js"></script>
	<script src="vendors/jcf/js/jcf.select.js"></script>
	<script src="vendors/retina/retina.min.js"></script>
	<script src="vendors/bootstrap-datetimepicker-master/dist/js/bootstrap-datepicker.js"></script>
	<!-- mailchimp newsletter subscriber -->
	<script src="js/mailchimp.js"></script>
	<!-- custom script -->
	<script src="js/jquery.main.js"></script>
</body>

</html>
