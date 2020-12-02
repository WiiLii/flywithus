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
						<h1 class="inner-main-heading">Booking Confirmation</h1>
						<!-- breadcrumb -->
						<nav class="breadcrumbs">
							<ul>
								<li><a href="#">Home</a></li>
								<li><a href="#">Pages</a></li>
								<li><span>Confirmation</span></li>
							</ul>
						</nav>
					</div>
				</div>
				<!-- confirmation block -->
				<div class="inner-main common-spacing confirmation-block">
					<div class="container">
						<h2>Thank you for booking your holidays with Flywithus!</h2>
					</div>
					<center><a type="submit"  href="my-bookings.php" class="btn btn-default">Check my bookings</a></center>
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
