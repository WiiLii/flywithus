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
	<!-- include owl css -->
	<link media="all" rel="stylesheet" href="vendors/owl-carousel/owl.carousel.css">
	<link media="all" rel="stylesheet" href="vendors/owl-carousel/owl.theme.css">
	<!-- include main css -->
	<link media="all" rel="stylesheet" href="css/main.css">
</head>
<body>
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
			<!-- main banner -->
			<section class="banner banner-inner parallax" data-stellar-background-ratio="0.5" id="banner-contact">
				<div class="banner-text">
					<div class="center-text">
						<div class="container">
							<h1>Contact Us</h1>
							<strong class="subtitle">The most detailed and modern Adventure theme!</strong>
							<!-- breadcrumb -->
							<nav class="breadcrumbs">
								<ul>
									<li><a href="#">HOME</a></li>
									<li><span>contact US</span></li>
								</ul>
							</nav>
						</div>
					</div>
				</div>
			</section>
			<!-- main container -->
			<main id="main">
				<!-- main contact information block -->
				<div class="content-block bg-white">
					<div class="container">
						<header class="content-heading">
							<h2 class="main-heading">get in touch</h2>
							<strong class="main-subtitle">Contact us by email, phone or through our web form below.</strong>
							<div class="seperator"></div>
						</header>
						<div class="contact-info row">
							<div class="col-sm-4">
								<span class="tel has-border">
									<span class="icon-tel-big"></span>
									<a href="tel:02085775771">020  8577 5771</a>
								</span>
								<h3>Booking Enquiries</h3>
								<p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit</p>
							</div>
							<div class="col-sm-4">
								<span class="tel has-border bg-blue">
									<span class="icon-fax-big"></span>
									<a href="tel:02085775771">020  8577 5771</a>
								</span>
								<h3>Post Booking Questions</h3>
								<p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit</p>
							</div>
							<div class="col-sm-4">
								<span class="tel has-border">
									<span class="icon-tel"></span>
									<a href="tel:02085775771">020  8577 5771</a>
								</span>
								<h3>Payment Queries</h3>
								<p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit</p>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 wow fadeInLeft">
								<!-- main contact form -->
								<form class="contact-form has-border" id="contact_form" action="#">
									<fieldset>
										<div class="form-group">
											<div class="col-sm-4">
												<strong class="form-title"><label for="fname">First name</label></strong>
											</div>
											<div class="col-sm-8">
												<div class="input-wrap">
													<input type="text" class="form-control" id="fname" name="fname">
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="col-sm-4">
												<strong class="form-title"><label for="lname">Last name</label></strong>
											</div>
											<div class="col-sm-8">
												<div class="input-wrap">
													<input type="text" class="form-control" id="lname" name="lname">
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="col-sm-4">
												<strong class="form-title"><label for="con_email">Email</label></strong>
											</div>
											<div class="col-sm-8">
												<div class="input-wrap">
													<input type="email" class="form-control" id="con_email" name="con_email">
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="col-sm-4">
												<strong class="form-title"><label for="con_phone">Phone number</label></strong>
											</div>
											<div class="col-sm-8">
												<div class="input-wrap">
													<input type="text" class="form-control" id="con_phone" name="con_phone">
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="col-sm-4">
												<strong class="form-title"><label for="con_country">Country</label></strong>
											</div>
											<div class="col-sm-8">
												<div class="input-wrap">
													<input type="text" class="form-control" id="con_country" name="con_country">
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="col-sm-4">
												<strong class="form-title"><label for="con_message">Message</label></strong>
											</div>
											<div class="col-sm-8">
												<div class="input-wrap">
													<textarea cols="30" rows="10" class="form-control" id="con_message" name="con_message"></textarea>
												</div>
											</div>
										</div>
										<div class="form-group btn-holder">
											<div class="col-sm-4">&nbsp;</div>
											<div class="col-sm-8">
												<div class="input-wrap">
													<input type="submit" id="btn_sent" value="Send enquiry" class="btn btn-white">
														<p id="error_message"> </p>
												</div>
											</div>
										</div>
									</fieldset>
								</form>
							</div>
							<div class="col-md-6 map-col-main wow fadeInRight">
								<!-- google map  -->
								<div class="map-holder">
									<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5465.157030628598!2d-73.96073921239335!3d40.77310095275902!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c258957b88f9ed%3A0xac6ddf195a5da77a!2s77+St!5e0!3m2!1sne!2snp!4v1449890237045" width="600" height="670" allowfullscreen></iframe>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- partner list -->
				<article class="partner-block bg-gray">
					<div class="container">
						<header class="content-heading">
							<h2 class="main-heading">Partner</h2>
							<span class="main-subtitle">People who always support and endorse our good work</span>
							<div class="seperator"></div>
						</header>
						<div class="partner-list" id="partner-slide">
							<div class="partner">
								<a href="#">
									<img width="130" src="img/logos/logo-travelagancy.svg" alt="image description">
									<img class="hover" width="130" src="img/logos/logo-travelagancy-hover.svg" alt="image description">
								</a>
							</div>
							<div class="partner">
								<a href="#">
									<img width="130" src="img/logos/logo-around-world.svg" alt="image description">
									<img class="hover" width="130" src="img/logos/logo-around-world-hover.svg" alt="image description">
								</a>
							</div>
							<div class="partner">
								<a href="#">
									<img width="130" src="img/logos/logo-tourist.svg" alt="image description">
									<img class="hover" width="130" src="img/logos/logo-tourist-hover.svg" alt="image description">
								</a>
							</div>
							<div class="partner">
								<a href="#">
									<img width="130" src="img/logos/logo-adventure.svg" alt="image description">
									<img class="hover" width="130" src="img/logos/logo-adventure-hover.svg" alt="image description">
								</a>
							</div>
							<div class="partner">
								<a href="#">
									<img width="130" src="img/logos/logo-around-world.svg" alt="image description">
									<img class="hover" width="130" src="img/logos/logo-around-world-hover.svg" alt="image description">
								</a>
							</div>
							<div class="partner">
								<a href="#">
									<img width="130" src="img/logos/logo-travelagancy.svg" alt="image description">
									<img class="hover" width="130" src="img/logos/logo-travelagancy-hover.svg" alt="image description">
								</a>
							</div>
							<div class="partner">
								<a href="#">
									<img width="130" src="img/logos/logo-adventure.svg" alt="image description">
									<img class="hover" width="130" src="img/logos/logo-adventure-hover.svg" alt="image description">
								</a>
							</div>
							<div class="partner">
								<a href="#">
									<img width="130" src="img/logos/logo-around-world.svg" alt="image description">
									<img class="hover" width="130" src="img/logos/logo-around-world-hover.svg" alt="image description">
								</a>
							</div>
							<div class="partner">
								<a href="#">
									<img width="130" src="img/logos/logo-travelagancy.svg" alt="image description">
									<img class="hover" width="130" src="img/logos/logo-travelagancy-hover.svg" alt="image description">
								</a>
							</div>
						</div>
					</div>
				</article>
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
	<!-- contact form script -->
	<script src="js/contact-form.js"></script>
	<!-- custom script -->
	<script src="js/jquery.main.js"></script>
</body>

</html>
