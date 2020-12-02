<?php
 ?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>FlyWithUs</title>
	<!-- favion -->
	<link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
	<!-- link to font awesome -->
	<link media="all" rel="stylesheet" href="vendors/font-awesome/css/font-awesome.css">
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
	<?php include "header.php"; ?>
			<!-- main container-->
			<main id="main">
				<!-- top information area -->
				<div class="inner-top">
					<div class="container">
						<h1 class="inner-main-heading">Login</h1>
						<!-- breadcrumb -->
						<nav class="breadcrumbs">
							<ul>
								<li><a href="#">Home</a></li>
								<li><a href="#">pages</a></li>
								<li><span>Login</span></li>
							</ul>
						</nav>
					</div>
				</div>
				<div class="inner-main common-spacing container">
					<!-- form -->
					<div class="twocol-form" >
						<div class="row">
							<div class="col-md-6">
								<div class="top-box">
									<span class="holder height">Login</span>
								</div>
								<form class="" action="login_process.php" method="post">
								<div class="form-holder">
									<div class="wrap">
										<div class="hold">
											<label for="email">Email</label>
											<input type="text" id="email" name="email" placeholder="e.g.mama@gmail.com"class="form-control">
										</div>
										<div class="hold">
											<label for="password">Password</label>
											<input type="password" name="password" id="password" class="form-control">
										</div>
										<div class="btn-hold">
											<button type="submit" name="login_submit" class="btn btn-default">Login</button>
										</div>
									</div>
								</div>
							</form>
							</div>
							<div class="col-md-6">
								<div class="top-box">
									<span class="holder height">Register</span>
								</div>
								<!--- form submit to register --->


							<form class="" action="login_process.php" method="post">
										<div class="form-holder">
									<div class="wrap">
										<div class="hold">
											<label >Name</label>
											<input type="text" id="fname"name="fname" value="" class="form-control">
										</div>
										<div class="hold">
											<label >Last name</label>
											<input type="text" id="lanme"name="lname"value="" class="form-control">
										</div>
										<div class="hold">
											<label >Email</label>
											<input type="email" id="regi_email"name ="regi_email" class="form-control">
										</div>
										<div class="hold">
											<label >Password</label>
											<input type="password" id="reg_pass" name ="reg_pass"value="" class="form-control">
										</div>
										<div class="hold">
											<label for="reg-pass1">Re-type Password</label>
											<input type="password" id="reg_pass1" name ="reg_pass1" value=""class="form-control">
										</div>
										<div class="btn-hold">
											<button type="submit" name="regi_submit" v class="btn btn-default">Register</button>
										</div>
									</div>
								</div>
							</form>
						</div>
						</div>
					</div>
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
