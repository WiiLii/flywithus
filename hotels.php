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
<body onload="clickHotel();">
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
			<section class="banner banner-inner parallax" data-stellar-background-ratio="0.5" id="gridview-4-col">
				<div class="banner-text">
					<div class="center-text">
						<div class="container">
							<h1>Perfect Hotels Just For You</h1>
							<strong class="subtitle">We’re passionate about travel.
							</br> So when it comes to booking the perfect hotel - we’ve got you covered! </strong>
							<!-- breadcrumb -->
							<nav class="breadcrumbs">
								<ul>
									<li><a href="#">HOME</a></li>
									<li><a href="#">HOTELS</a></li>
									<li><span>ALL</span></li>
								</ul>
							</nav>
						</div>
					</div>
				</div>
			</section>
			<!-- main container -->
			<main id="main">
				<!-- content block -->
				<center><div class="content-block content-sub">
					<div class="container">
					<h2>Filters</h2>
						<div class="filter-option">
							<div class="select-holder">
								<a href="#" class="btn btn-primary btn-filter"><i class="fa fa-sliders"></i> Filter</a>
								<div class="filter-slide">



									<div class="select-col">
										<select class="filter-select" id="hotelCountry" name="hotelCountry">
											<option value="Country">Country</option>
											<option value="Korea">Korea</option>
											<option value="China">China</option>
											<option value="Thailand">Thailand</option>
											<option value="Japan">Japan</option>
										</select>
									</div>
									<div class="select-col">
										<select class="filter-select" id="hotelPrice" name="hotelPrice">
											<option value="Range">Price Range</option>
											<option value="1">$1 - $499</option>
											<option value="2">$500 - $999</option>
								<!--			<option value="4">$1000 - $1499</option>
											<option value="4">$1500 - $2999</option>
											<option value="5">$3000+</option>-->
										</select>
									</div>
									<div class="select-col">
											<button type="submit"  class="btn btn-default"  name="hotel_filter" onclick="clickHotel();"> SEARCH</button>
									</div>

								</div>
							</div>
						</div></center>
						<!-- main article section -->
						<div class="content-holder content-sub-holder">
							<div class="row db-3-col">
								<div class="container-fluid" id="hotelsTable"></div>
							<!---	<article class="col-sm-6 col-md-4 col-lg-3 article has-hover-s1">
									<div class="thumbnail">
										<div class="img-wrap">
											<img src="img/listing/img-19.jpg" height="228" width="350" alt="image description">
										</div>
										<h3 class="small-space">Evening with Panda</h3>

										<aside class="meta">
											<span class="country">
												<span class="icon-world"> </span>12 Countries
											</span>
											<span class="activity">
												<span class="icon-acitivities"> </span>79 Activities
											</span>
										</aside>
										<p>This is Photoshops version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet.</p>
										<a href="tour-detail.html" class="btn btn-default">explore</a>

										<footer>
											<ul class="social-networks">
												<li><a href="#"><span class="icon-twitter"></span></a></li>
												<li><a href="#"><span class="icon-facebook"></span></a></li>
											</ul>
											<span class="price">from <span>$2749</span></span>
										</footer>
									</div>
								</article>-->


							</div>
						</div>
						<!-- pagination wrap -->
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
				
				<!-- recent block -->
				<aside class="recent-block recent-list recent-wide-thumbnail">
					<div class="container">
						<h2 class="text-center text-uppercase">RECENTLY VIEWED</h2>
						<div class="row">
							<article class="col-sm-6 col-md-3 article">
								<div class="thumbnail">
									<h3 class="no-space"><a href="#">Everest Basecamp Trek</a></h3>
									<strong class="info-title">Everest Region, Nepal</strong>
									<div class="img-wrap">
										<img src="img/listing/img-31.jpg" height="210" width="250" alt="image description">
									</div>
									<footer>
										<div class="sub-info">
											<span>5 Days</span>
											<span>$299</span>
										</div>
										<ul class="ico-list">
											<li class="pop-opener">
												<a href="#">
													<span class="icon-hiking"></span>
													<span class="popup">
														Hiking
													</span>
												</a>
											</li>
											<li class="pop-opener">
												<a href="#">
													<span class="icon-mountain"></span>
													<span class="popup">
														Mountain
													</span>
												</a>
											</li>
											<li class="pop-opener">
												<a href="#">
													<span class="icon-level5"></span>
													<span class="popup">
														Level 5
													</span>
												</a>
											</li>
										</ul>
									</footer>
								</div>
							</article>
							<article class="col-sm-6 col-md-3 article">
								<div class="thumbnail">
									<h3 class="no-space"><a href="#">Everest Basecamp Trek</a></h3>
									<strong class="info-title">Everest Region, Nepal</strong>
									<div class="img-wrap">
										<img src="img/listing/img-32.jpg" height="210" width="250" alt="image description">
									</div>
									<footer>
										<div class="sub-info">
											<span>5 Days</span>
											<span>$299</span>
										</div>
										<ul class="ico-list">
											<li class="pop-opener">
												<a href="#">
													<span class="icon-hiking"></span>
													<span class="popup">
														Hiking
													</span>
												</a>
											</li>
											<li class="pop-opener">
												<a href="#">
													<span class="icon-mountain"></span>
													<span class="popup">
														Mountain
													</span>
												</a>
											</li>
											<li class="pop-opener">
												<a href="#">
													<span class="icon-level5"></span>
													<span class="popup">
														Level 5
													</span>
												</a>
											</li>
										</ul>
									</footer>
								</div>
							</article>
							<article class="col-sm-6 col-md-3 article">
								<div class="thumbnail">
									<h3 class="no-space"><a href="#">Everest Basecamp Trek</a></h3>
									<strong class="info-title">Everest Region, Nepal</strong>
									<div class="img-wrap">
										<img src="img/listing/img-33.jpg" height="210" width="250" alt="image description">
									</div>
									<footer>
										<div class="sub-info">
											<span>5 Days</span>
											<span>$299</span>
										</div>
										<ul class="ico-list">
											<li class="pop-opener">
												<a href="#">
													<span class="icon-hiking"></span>
													<span class="popup">
														Hiking
													</span>
												</a>
											</li>
											<li class="pop-opener">
												<a href="#">
													<span class="icon-mountain"></span>
													<span class="popup">
														Mountain
													</span>
												</a>
											</li>
											<li class="pop-opener">
												<a href="#">
													<span class="icon-level5"></span>
													<span class="popup">
														Level 5
													</span>
												</a>
											</li>
										</ul>
									</footer>
								</div>
							</article>
							<article class="col-sm-6 col-md-3 article">
								<div class="thumbnail">
									<h3 class="no-space"><a href="#">Everest Basecamp Trek</a></h3>
									<strong class="info-title">Everest Region, Nepal</strong>
									<div class="img-wrap">
										<img src="img/listing/img-34.jpg" height="210" width="250" alt="image description">
									</div>
									<footer>
										<div class="sub-info">
											<span>5 Days</span>
											<span>$299</span>
										</div>
										<ul class="ico-list">
											<li class="pop-opener">
												<a href="#">
													<span class="icon-hiking"></span>
													<span class="popup">
														Hiking
													</span>
												</a>
											</li>
											<li class="pop-opener">
												<a href="#">
													<span class="icon-mountain"></span>
													<span class="popup">
														Mountain
													</span>
												</a>
											</li>
											<li class="pop-opener">
												<a href="#">
													<span class="icon-level5"></span>
													<span class="popup">
														Level 5
													</span>
												</a>
											</li>
										</ul>
									</footer>
								</div>
							</article>
						</div>
					</div>
				</aside>
			</main>
		
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
