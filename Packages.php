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
	<!-- link to custom icomoon fonts -->
	<link rel="stylesheet" type="text/css" href="css/fonts/icomoon/icomoon.css">
	<!-- link to wow js animation -->
	<link media="all" rel="stylesheet" href="vendors/animate/animate.css">
	<!-- include bootstrap css -->
	<link media="all" rel="stylesheet" href="css/bootstrap.css">
	<!-- include main css -->
	<link media="all" rel="stylesheet" href="css/main.css">

</head>
<body onload="searching();">
	<div class="preloader" id="pageLoad" >
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
			<section class="banner banner-inner parallax" data-stellar-background-ratio="0.5" id="list-view-normal">
				<div class="banner-text">
					<div class="center-text">
						<div class="container">
							<h1>Popular Packages</h1>
							<strong class="subtitle">Explore a variety of packages!
							</br> Whatever your travel preference, you will find suitable holiday packages here. </strong>
							<!-- breadcrumb -->
							<nav class="breadcrumbs">
								<ul>
									<li><a href="#">HOME</a></li>
									<li><a href="#">PACKAGES</a></li>
								</ul>
							</nav>
						</div>
					</div>
				</div>
			</section>
			<!-- main container -->
			<main id="main">
				<!-- content block -->
				<div class="content-block content-sub">
					<div class="container">
						<div class="filter-option">
					 <!-- NEED GENERATE THIS RESULT -->
							<div class="layout-holder">


								<div class="select-holder">
									<a href="#" class="btn btn-primary btn-filter"><i class="fa fa-sliders" ></i> Filter</a>
									<div class="filter-slide">
									<div class="select-col">
											<select class="filter-select" id="country" name="country">
												<option value="ALLC">Country</option>
												<option value="Korea">Korea</option>
												<option value="China">China</option>
												<option value="Thailand">Thailand</option>
												<option value="Japan">Japan</option>
											</select>
										</div>

										<div class="select-col">
											<select class="filter-select"  id="price" name="price">
												<option value="ALLP">Price Range</option>
												<option value="one">$</option>
												<option value="two">$$</option>
												<option value="three">$$$</option>

											</select>
										</div>
											<div class="select-col">
													<button type="submit"  class="btn btn-default" style="width: 100%;height: 45px;" name="filter_submit" onclick="searching();"> SEARCH</button>
											</div>


									</div>
								</div>


							</div>
						</div>
						<!-- list view -->
						<div class="content-holder list-view">
							<!--- call ajax -->
								<div class="" id="packagesTable">	</div>
						<!---	<article class="article">
								<div class="thumbnail">
									<div class="img-wrap">
										<img src="img/listing/img-35.jpg" height="240" width="350" alt="image description">
									</div>
									<div class="description">
										<div class="col-left">
											<header class="heading">
												<h3><a href="packages-detail.php">SEOUL</a></h3>
												<div class="info-day">7+ Days</div>
											</header>
											<p>Welcome to Seoul! Seoul was made for shopping and fun, so get your walking shoes on (but don’t forget to pack your dancing shoes as well), because this itinerary is all about the best places to shop and be entertained in the city.</p>
											<div class="reviews-holder">

												<h3>places</h3>
											</div>
										</div>
										<aside class="info-aside">
											<span class="price">from <span>$2749</span></span>
											<div class="activity-level">
												<div class="ico">
													<span class="icon-level2"></span>
												</div>
												<span class="text">SEOUL</span>
											</div>
											<a href="#" class="btn btn-default">explore</a>
										</aside>
									</div>
								</div>
							</article>-->










						</div>
						<!-- pagination wrap -->

					</div>
				</div>
        <?php
        include "config.php";



         ?>
				<!-- recent block -->
				<aside class="recent-block recent-list recent-wide-thumbnail">
					<div class="container">
						<h2 class="text-center text-uppercase">RECENTLY VIEWED</h2>
						<div class="row">
                  <?php
                  $sql = "SELECT * FROM `itinerary` GROUP BY itineraryCountry LIMIT 4";
                $result = $db->query($sql);
                //$mytable = $sql;
                if ($result->num_rows > 0) {
                  // output data of each row
                    while($row = $result->fetch_assoc()) {
                        //echo $row['itinerary'],"------------------------<br>";
                        echo '<article class="col-sm-6 col-md-3 article">
            								<div class="thumbnail">
            									<h3 class="no-space"><a href="pacakages-detail.php"></a>'.$row['itineraryName'].'</h3>
            									<strong class="info-title">'.$row['itineraryCity'].','.$row['itineraryCountry'].'</strong>
            									<div class="img-wrap">
            										<img src="'.$row['itineraryImage'].'" height="200" width="200" alt="image description">
            									</div>
            									<footer>
            										<div class="sub-info">
            											<span>7 Days</span>
            											<span>$'.$row['totalPrice'].'</span>
            										</div>

            									</footer>
            								</div>
            							</article>';
                    }
                }


                   ?>

						</div>
					</div>
				</aside>
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
	  <script src="js/itinerary.js"></script>
</body>


</html>
