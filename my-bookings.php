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
		<?php include 'header.php';
		if (!isset($_SESSION['email'])) {
				echo "<script>alert('Please log in to view my bookings.')</script>";
			echo'<script>window.location = "login.php";</script>';
		}
		 ?>
			<!-- main container -->
			<main id="main">
        <!--body-->
        <!--
            <center><div class="content-block content-sub">
                <div class="container">
                <h2>Booking</h2>
                </div>
            </div>
            </center>
        -->
            <!-- main banner -->
			<section class="banner banner-inner parallax" data-stellar-background-ratio="0.5" id="list-view-normal">
				<div class="banner-text">
					<div class="center-text">
						<div class="container">
							<h1>My Bookings</h1>
							<strong class="subtitle"> Prepare yourself,
                            </br> Check your bookings here! </strong>
						</div>
					</div>
				</div>
			</section>
            </br>

				<!-- dates and prices tab content -->
                <div role="tabpanel" class="tab-pane" id="tab06">
                    <div class="table-container">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>
                                            <strong class="date-text">Image</strong>
                                        </th>
                                        <th>
                                            <strong class="date-text">Name</strong>
                                        </th>
                                        <th>
                                            <strong class="date-text">Date</strong>
                                        </th>
                                        <th>
                                            <strong class="date-text">Price</strong>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><div class="cell"><div class="middle">IMAGE</div></div></td>
                                        <td><div class="cell"><div class="middle">Thailand (Package)</div></div></td>
                                        <td><div class="cell"><div class="middle">12-12-2020 to 12-25-2020</div></div></td>
                                        <td><div class="cell"><div class="middle">$3,170</div></div></td>
                                        </div></div></td>
                                    </tr>
                                    <tr>
                                        <td><div class="cell"><div class="middle">IMAGE</div></div></td>
                                        <td><div class="cell"><div class="middle">JW Marriot Beijing</div></div></td>
                                        <td><div class="cell"><div class="middle">12-12-2020 to 12-25-2020</div></div></td>
                                        <td><div class="cell"><div class="middle">$600.00</div></div></td>
                                        </div></div></td>
                                    </tr>
                                    <tr>
                                        <td><div class="cell"><div class="middle">IMAGE</div></div></td>
                                        <td><div class="cell"><div class="middle">Korea Airlines -> Seoul</div></div></td>
                                        <td><div class="cell"><div class="middle">12-12-2020</div></div></td>
                                        <td><div class="cell"><div class="middle">$699.00</div></div></td>
                                        </div></div></td>
                                    </tr>
                                </tbody>
                            </table>
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
