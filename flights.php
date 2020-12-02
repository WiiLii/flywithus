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
        <!--body-->
		<section class="banner banner-inner parallax" data-stellar-background-ratio="0.5" id="gridview-2-col">
				<div class="banner-text">
					<div class="center-text">
						<div class="container">
							<h1>Flights</h1>
							<strong class="subtitle">Find your dream destination here!
							</br> Whatever your travel preference, you will find suitable flights here. </strong>
							<!-- breadcrumb -->
							<nav class="breadcrumbs">
								<ul>
									<li><a href="#">HOME</a></li>
									<li><a href="#">FLIGHTS</a></li>
								</ul>
							</nav>
						</div>
					</div>
				</div>
			</section>
				<center><div class="content-block content-sub">
					<div class="container">
					<h2>Filters</h2>
						<div class="filter-option">
							<div class="select-holder">
								<a href="#" class="btn btn-primary btn-filter"><i class="fa fa-sliders"></i> Filter</a>
								<div class="filter-slide">
									<div class="select-col">
										<select class="filter-select">
											<option value="Holiday Type">Airlines</option>
											<option value="Holiday Type">Singapore Airlines</option>
											<option value="Holiday Type">China Airlines</option>
											<option value="Holiday Type">Korea Airlines</option>
											<option value="Holiday Type">Thai Airways</option>
										</select>
									</div>

									<div class="select-col">
										<select class="filter-select">
											<option value="Price Range">Price Range</option>
											<option value="Price Range">$1 - $499</option>
											<option value="Price Range">$500 - $999</option>
											<option value="Price Range">$1000 - $1499</option>
											<option value="Price Range">$1500 - $2999</option>
											<option value="Price Range">$3000+</option>
										</select>
									</div>

									<div class="select-col">
										<select class="filter-select">
											<option value="Price Range">Location</option>
											<option value="Price Range">Thailand</option>
											<option value="Price Range">Korea</option>
											<option value="Price Range">China</option>
											<option value="Price Range">Japan</option>
										</select>
									</div>
									<button type="submit"  class="btn btn-default"  name="filter_submit" onclick="searching();"> SEARCH</button>

								</div>
							</div>
						</div>
					</div>
				</div></center>
				<!-- dates and prices tab content -->
				<div role="tabpanel" class="tab-pane" id="tab06">
					<div class="table-container">
						<div class="table-responsive">
							<table class="table table-striped">
								<thead>
									<tr>
										<th>
											<strong class="date-text">Departure Dates</strong>
										</th>
										<th>
											<strong class="date-text">Airlines</strong>
										</th>
										<th>
											<strong class="date-text">Location</strong>
										</th>
										<th>
											<strong class="date-text">Price (SGD)</strong>
										</th>
										<th>
											&nbsp;
										</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td><div class="cell"><div class="middle">Wed 9 Dec '20</div></div></td>
										<td><div class="cell"><div class="middle">Korea Airlines</div></div></td>
										<td><div class="cell"><div class="middle">SG -> Seoul (Two-way)</div></div></td>
										<td><div class="cell"><div class="middle">$1900</div></div></td>
										<td><div class="cell"><div class="middle">
											<a href="#" class="btn btn-default">BOOK NOW</a>
										</div></div></td>
									</tr>
									<tr>
										<td><div class="cell"><div class="middle">Wed 16 Dec '20</div></div></td>
										<td><div class="cell"><div class="middle">Singapore Airlines</div></div></td>
										<td><div class="cell"><div class="middle">SG -> Seoul (Two-way)</div></div></td>
										<td><div class="cell"><div class="middle">$2200</div></div></td>
										<td><div class="cell"><div class="middle">
											<a href="#" class="btn btn-default">BOOK NOW</a>
										</div></div></td>
									</tr>
									<tr>
										<td><div class="cell"><div class="middle">Wed 23 Dec '20</div></div></td>
										<td><div class="cell"><div class="middle">Thai Airways</div></div></td>
										<td><div class="cell"><div class="middle">SG -> Bangkok (Two-way)</div></div></td>
										<td><div class="cell"><div class="middle">$888</div></div></td>
										<td><div class="cell"><div class="middle">
											<a href="#" class="btn btn-default">BOOK NOW</a>
										</div></div></td>
									</tr>
									<tr>
										<td><div class="cell"><div class="middle">Wed 30 Dec '20</div></div></td>
										<td><div class="cell"><div class="middle">China Airlines</div></div></td>
										<td><div class="cell"><div class="middle">SG -> Beijing (Two-way)</div></div></td>
										<td><div class="cell"><div class="middle">$1200</div></div></td>
										<td><div class="cell"><div class="middle">
											<a href="#" class="btn btn-default">BOOK NOW</a>
										</div></div></td>
									</tr>
									<tr>
										<td><div class="cell"><div class="middle">Wed 9 Dec '20</div></div></td>
										<td><div class="cell"><div class="middle">Singapore Airlines</div></div></td>
										<td><div class="cell"><div class="middle">SG -> Seoul (Two-way)</div></div></td>
										<td><div class="cell"><div class="middle">$4,970</div></div></td>
										<td><div class="cell"><div class="middle">
											<a href="#" class="btn btn-default">BOOK NOW</a>
										</div></div></td>
									</tr>
									<tr>
										<td><div class="cell"><div class="middle">Wed 30 Dec '20</div></div></td>
										<td><div class="cell"><div class="middle">China Airlines</div></div></td>
										<td><div class="cell"><div class="middle">SG -> Bangkok (Two-way)</div></div></td>
										<td><div class="cell"><div class="middle">$3,970</div></div></td>
										<td><div class="cell"><div class="middle">
											<a href="#" class="btn btn-default">BOOK NOW</a>
										</div></div></td>
									</tr>
									<tr>
										<td><div class="cell"><div class="middle">Wed 23 Dec '20</div></div></td>
										<td><div class="cell"><div class="middle">Korea Airlines</div></div></td>
										<td><div class="cell"><div class="middle">SG -> Seoul (Two-way)</div></div></td>
										<td><div class="cell"><div class="middle">$1,970</div></div></td>
										<td><div class="cell"><div class="middle">
											<a href="#" class="btn btn-default">BOOK NOW</a>
										</div></div></td>
									</tr>
									<tr>
										<td><div class="cell"><div class="middle">Wed 9 Dec '20</div></div></td>
										<td><div class="cell"><div class="middle">Thai Airways</div></div></td>
										<td><div class="cell"><div class="middle">SG -> Bangkok (Two-way)</div></div></td>
										<td><div class="cell"><div class="middle">$3,970</div></div></td>
										<td><div class="cell"><div class="middle">
											<a href="#" class="btn btn-default">BOOK NOW</a>
										</div></div></td>
									</tr>

								</tbody>
							</table>
						</div>
						<div class="load-more text-center text-uppercase">
								<!-- pagination wrap -->
						<nav class="pagination-wrap">
							<div class="btn-prev">
								<a href="#" aria-label="Previous">
									<span class="icon-angle-right"></span>
								</a>
							</div>
							<ul class="pagination">
								<li class="active"><a href="#">1</a></li>

							</ul>
							<div class="btn-next">
								<a href="#" aria-label="Previous">
									<span class="icon-angle-right"></span>
								</a>
							</div>
						</nav>
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
