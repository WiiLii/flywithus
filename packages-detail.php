<?php
include "config.php";
$country ="";
$city=$total="";
$img_arr=$cat_arr=$name_arr=$over_arr=$desc_arr=$price_arr=array();

if (isset($_POST['city'])) {
	$country= $_POST['city'];
	  $sql = "SELECT * FROM itinerary where itineraryCity='$country' limit 5";
	$result = $db->query($sql);
	//$mytable = $sql;
	if ($result->num_rows > 0) {
	  // output data of each row
	    while($row = $result->fetch_assoc()) {
					$city=$row['itineraryCity'];
	        $name_arr[]= $row['itineraryName'];
					$cat_arr[]= $row['itineraryType'];
					$over_arr=$row['itineraryOverview'];
					$price_arr[]=$row['itineraryPrice'];
					$total=$row['totalPrice'];
					$img_arr[]=$row['itineraryImage'];
					$desc_arr[]=$row['itineraryDesc'];
	    }
	}
	//var_dump($desc_arr);
//	exit;
}
 ?>
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
	<!-- include owl css -->
	<link media="all" rel="stylesheet" href="vendors/owl-carousel/owl.carousel.css">
	<link media="all" rel="stylesheet" href="vendors/owl-carousel/owl.theme.css">
	<!-- include fancybox css -->
	<link media="all" rel="stylesheet" href="vendors/fancybox/jquery.fancybox.css">
	<!-- include main css -->
	<link media="all" rel="stylesheet" href="css/main.css">

</head>
<body class="default-page" >
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
				<!-- main tour information -->
				<section class="container-fluid trip-info">
					<div class="same-height two-columns row">
						<div class="height col-md-6">
							<!-- top image slideshow -->
							<div id="tour-slide" >
								<div class="slide">
									<div class="bg-stretch">
										<img src="<?php echo $img_arr[0] ?>" alt="image descriprion" height="1104" width="966">
									</div>
								</div>
								<div class="slide">
									<div class="bg-stretch">
										<img src="<?php echo $img_arr[1] ?>" alt="image descriprion" height="1104" width="966">
									</div>
								</div>
							</div>
						</div>
						<div class="height col-md-6 text-col">
							<div class="holder">
								<h1 class="small-size"><?php echo $country; ?></h1>
								<div class="price">
									from <strong>$<?php echo $total; ?></strong>
								</div>
							<!--	<div class="description">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ctetur, adipisci velit, sed quia non numquam eius modi.</p>
								</div>-->

								<div class="btn-holder">
									<a href="#" class="btn btn-lg btn-info">BOOK NOW</a>
								</div>
								<ul class="social-networks social-share">
									<li>
										<a href="#" class="facebook">
											<span class="ico">
												<span class="icon-facebook"></span>
											</span>
											<span class="text">Share</span>
										</a>
									</li>
									<li>
										<a href="#" class="twitter">
											<span class="ico">
												<span class="icon-twitter"></span>
											</span>
											<span class="text">Tweet</span>
										</a>
									</li>

								</ul>
							</div>
						</div>
					</div>
				</section>
				<div class="tab-container">
					<nav class="nav-wrap" id="sticky-tab">
						<div class="container">
							<!-- nav tabs -->
							<ul class="nav nav-tabs text-center" role="tablist">
								<li role="presentation" ><a href="#tab01" aria-controls="tab01" role="tab" data-toggle="tab">Overview</a></li>
								<li role="presentation"><a href="#tab02"class="active" aria-controls="tab02" role="tab" data-toggle="tab">Itinerary</a></li>
								<li role="presentation"><a href="#tab03" aria-controls="tab03" role="tab" data-toggle="tab">Faq &amp; Review</a></li>
								<li role="presentation"><a href="#tab04" aria-controls="tab04" role="tab" data-toggle="tab">Gallery</a></li>

							</ul>
						</div>
					</nav>
					<!-- tab panes -->
					<div class="container tab-content trip-detail">
						<!-- overview tab content -->
						<div role="tabpanel" class="tab-pane active" id="tab01">
							<div class="row">
								<h1>All about <?php echo $country; ?></h1>
								<div class="col-md-12">

									<div class="detail">
								<p><?php echo $over_arr; ?></p>
									</div>
								</div>

							</div>
						</div>
						<!-- itinerary tab content -->
						<div role="tabpanel" class="tab-pane" id="tab02" >
							<div class="row">
								<div class="col-md-12">
									<ol class="detail-accordion">

										<li>
											<a href="#">
												<strong class="title">Day 1</strong>
												<span>Depart Singapore</span>
											</a>
											<div class="slide">
												<div class="slide-holder">
													<p>Making my way to the airport and travel hours to your destination</p>
												</div>
											</div>
										</li>
										<?php
										$num=1;
										for ($i=0; $i < count($desc_arr) ; $i++) {
													$num++;
												echo'<li>
														 <a href="#">
																			<strong class="title">Day '.$num.'</strong>
																			<span>'.$name_arr[$i].'</span>
																		</a>
																		<div class="slide">
																			<div class="slide-holder">
																				<p>'.$desc_arr[$i].'</p>
																			</div>
																		</div>
																	</li>';
										}
										 ?>
										<li>
											<a href="#">
												<strong class="title">Day 7</strong>
												<span>Arrive in Singapore</span>
											</a>
											<div class="slide">
												<div class="slide-holder">
													<p>Say good bye to the 7 days that you had, and welcome back home!</p>
												</div>
											</div>
										</li>
										<!---<li>
											<a href="#">
												<strong class="title">Day 3</strong>
												<span>Leave for Pokhara</span>
											</a>
											<div class="slide">
												<div class="slide-holder">
													<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ctetur, adipisci velit, sed quia non numquam eius modi.</p>
												</div>
											</div>
										</li>
										<li>
											<a href="#">
												<strong class="title">Day 4</strong>
												<span>Start Trekking at Besi</span>
											</a>
											<div class="slide">
												<div class="slide-holder">
													<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ctetur, adipisci velit, sed quia non numquam eius modi.</p>
												</div>
											</div>
										</li>
										<li>
											<a href="#">
												<strong class="title">Day 5</strong>
												<span>Day subtitle message</span>
											</a>
											<div class="slide">
												<div class="slide-holder">
													<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ctetur, adipisci velit, sed quia non numquam eius modi.</p>
												</div>
											</div>
										</li>
										<li>
											<a href="#">
												<strong class="title">Day 6</strong>
												<span>Day subtitle message</span>
											</a>
											<div class="slide">
												<div class="slide-holder">
													<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ctetur, adipisci velit, sed quia non numquam eius modi.</p>
												</div>
											</div>
										</li>
										<li>
											<a href="#">
												<strong class="title">Day 7</strong>
												<span>Depart London</span>
											</a>
											<div class="slide">
												<div class="slide-holder">
													<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ctetur, adipisci velit, sed quia non numquam eius modi.</p>
												</div>
											</div>
										</li>
										<li class="active">
											<a href="#">
												<strong class="title">Day 8</strong>
												<span>Return to London</span>
											</a>
											<div class="slide">
												<div class="slide-holder">
													<p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit.</p>
													<p>Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. </p>
												</div>
											</div>
										</li>--->
									</ol>
								</div>
								<div class="col-md-6">
									<article class="img-article article-light">
										<div class="img-wrap">
											<img src="img/generic/img-08.jpg" height="319" width="570" alt="image description">
										</div>
										<div class="text-block">
											<h3><a href="#">Member taking a short break</a></h3>
											<p>Consider packing your bag with folloing daily essentials.</p>
										</div>
									</article>
									<article class="img-article article-light">
										<div class="img-wrap">
											<img src="../../html-i0ipxhws.netdna-ssl.com/entrada/img/generic/img-09.jpg" height="319" width="570" alt="image description">
										</div>
										<div class="text-block">
											<h3><a href="#">Couple enjoying the spectacular view</a></h3>
											<p>Consider packing your bag with folloing daily essentials.</p>
										</div>
									</article>
								</div>
							</div>
						</div>
						<!-- faq and review tab content -->
						<div role="tabpanel" class="tab-pane" id="tab03">
							<div class="row">
								<div class="col-md-6">
									<div class="question-select">
										<select id="tabSelect" class="question">
											<option value="#innerTab1">What kind of footwear is suitable?</option>
											<option value="#innerTab2">What kind of bag is suitable?</option>
											<option value="#innerTab3">What kind of clothes are suitable?</option>
										</select>
										<ul class="nav nav-tabs" id="questionTab">
											<li class="active"><a href="#innerTab1" data-toggle="tab">What kind of footwear wearing is suitable?</a></li>
											<li><a href="#innerTab2" data-toggle="tab">What kind of bag is suitable?</a></li>
											<li><a href="#innerTab3" data-toggle="tab">What kind of clothes wearing is suitable?</a></li>
										</ul>
									</div>
									<div class="tab-wrapper">
										<div role="tabpanel" class="tab-pane active" id="innerTab1">
											<div class="detail">
												<p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. </p>
												<p>Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. </p>
												<p>Sed non  mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris in erat justo. </p>
												<p>Nullam ac urna eu felis dapibus condimentum sit amet a augue. Sed non neque elit. Sed ut imperdiet nisi. </p>
												<p>Proin condimentum fermentum nunc. Etiam pharetra, erat sed fermentum feugiat, velit mauris egestas quam.</p>
												<p>Ulins aliquam massa nisl quis neque. Proin condimentum fermentum nunc. Etiam pharetra, erat sed fermentum feugiat, velit mauris egestas quam, ut aliquam massa nisl quis neque. </p>
												<p>Proin condimentum fermentum nunc. Etiam pharetra, erat sed fermentum feugiat, velit mauris egestas quam.</p>
												<p>Ulins aliquam massa nisl quis neque. Proin condimentum fermentum nunc. Etiam pharetra, erat sed fermentum feugiat, velit mauris egestas quam, ut aliquam massa nisl quis neque. </p>
												<p>Suspendisse gin orci enim.</p>
												<ul class="img-list">
													<li>
														<img src="img/generic/img-12.jpg" height="52" width="101" alt="image description">
													</li>
													<li>
														<img src="img/generic/img-13.jpg" height="97" width="114" alt="image description">
													</li>
													<li>
														<img src="img/generic/img-14.jpg" height="104" width="124" alt="image description">
													</li>
												</ul>
												<div class="reviews-slot v-middle">
													<div class="thumb">
														<a href="#"><img src="img/thumbs/img-04.jpg" height="50" width="50" alt="image description"></a>
													</div>
													<div class="text">
														<strong class="name"><a href="#">Jessica Lambert - Customer Relations</a></strong>
													</div>
												</div>
											</div>
										</div>
										<div role="tabpanel" class="tab-pane" id="innerTab2">
											<div class="detail">
												<p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. </p>
												<p>Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. </p>
												<p>Sed non  mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris in erat justo. </p>
												<p>Nullam ac urna eu felis dapibus condimentum sit amet a augue. Sed non neque elit. Sed ut imperdiet nisi. </p>
												<div class="reviews-slot v-middle">
													<div class="thumb">
														<a href="#"><img src="img/thumbs/img-04.jpg" height="50" width="50" alt="image description"></a>
													</div>
													<div class="text">
														<strong class="name"><a href="#">Jessica Lambert - Customer Relations</a></strong>
													</div>
												</div>
											</div>
										</div>
										<div role="tabpanel" class="tab-pane" id="innerTab3">
											<div class="detail">
												<p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. </p>
												<p>Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. </p>
												<p>Sed non  mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris in erat justo. </p>
												<p>Nullam ac urna eu felis dapibus condimentum sit amet a augue. Sed non neque elit. Sed ut imperdiet nisi. </p>
												<p>Proin condimentum fermentum nunc. Etiam pharetra, erat sed fermentum feugiat, velit mauris egestas quam.</p>
												<p>Ulins aliquam massa nisl quis neque. Proin condimentum fermentum nunc. Etiam pharetra, erat sed fermentum feugiat, velit mauris egestas quam, ut aliquam massa nisl quis neque. </p>
												<p>Proin condimentum fermentum nunc. Etiam pharetra, erat sed fermentum feugiat, velit mauris egestas quam.</p>
												<p>Ulins aliquam massa nisl quis neque. Proin condimentum fermentum nunc. Etiam pharetra, erat sed fermentum feugiat, velit mauris egestas quam, ut aliquam massa nisl quis neque. </p>
												<p>Suspendisse gin orci enim.</p>
												<ul class="img-list">
													<li>
														<img src="img/generic/img-12.jpg" height="52" width="101" alt="image description">
													</li>
													<li>
														<img src="img/generic/img-13.jpg" height="97" width="114" alt="image description">
													</li>
													<li>
														<img src="img/generic/img-14.jpg" height="104" width="124" alt="image description">
													</li>
												</ul>
												<div class="reviews-slot v-middle">
													<div class="thumb">
														<a href="#"><img src="img/thumbs/img-04.jpg" height="50" width="50" alt="image description"></a>
													</div>
													<div class="text">
														<strong class="name"><a href="#">Jessica Lambert - Customer Relations</a></strong>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="header-box">
										<a href="#" class="link-right">Writing A Review</a>
										<span class="rate-left">
											<strong class="title">Overall Rating</strong>
											<span class="star-rating">
												<span><span class="icon-star"></span></span>
												<span><span class="icon-star"></span></span>
												<span><span class="icon-star"></span></span>
												<span><span class="icon-star"></span></span>
												<span class="disable"><span class="icon-star"></span></span>
											</span>
											<span class="value">4.7/5</span>
										</span>
									</div>
									<div class="comments reviews-body">
										<div class="comment-holder">
											<div class="comment-slot">
												<div class="thumb">
													<a href="#"><img src="img/thumbs/img-05.jpg" height="50" width="50" alt="image description"></a>
												</div>
												<div class="text">
													<header class="comment-head">
														<div class="left">
															<strong class="name">
																<a href="#">Cleona Torez - Spain</a>
															</strong>
															<div class="meta">Reviewed on 14/1/2016</div>
														</div>
														<div class="right">
															<div class="star-rating">
																<span><span class="icon-star"></span></span>
																<span><span class="icon-star"></span></span>
																<span><span class="icon-star"></span></span>
																<span><span class="icon-star"></span></span>
																<span class="disable"><span class="icon-star"></span></span>
															</div>
															<span class="value">4.7/5</span>
														</div>
													</header>
													<div class="des">
														<p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. </p>
														<div class="link-holder">
															<a href="#">Read Full Review</a>
														</div>
													</div>
												</div>
											</div>
											<div class="comment-slot">
												<div class="thumb">
													<a href="#"><img src="img/thumbs/img-06.jpg" height="50" width="50" alt="image description"></a>
												</div>
												<div class="text">
													<header class="comment-head">
														<div class="left">
															<strong class="name">
																<a href="#">Cleona Torez - Spain</a>
															</strong>
															<div class="meta">Reviewed on 14/1/2016</div>
														</div>
														<div class="right">
															<div class="star-rating">
																<span><span class="icon-star"></span></span>
																<span><span class="icon-star"></span></span>
																<span><span class="icon-star"></span></span>
																<span><span class="icon-star"></span></span>
																<span class="disable"><span class="icon-star"></span></span>
															</div>
															<span class="value">4.7/5</span>
														</div>
													</header>
													<div class="des">
														<p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. </p>
														<div class="link-holder">
															<a href="#">Read Full Review</a>
														</div>
													</div>
												</div>
											</div>
											<div class="comment-slot">
												<div class="thumb">
													<a href="#"><img src="img/thumbs/img-07.jpg" height="50" width="50" alt="image description"></a>
												</div>
												<div class="text">
													<header class="comment-head">
														<div class="left">
															<strong class="name">
																<a href="#">Cleona Torez - Spain</a>
															</strong>
															<div class="meta">Reviewed on 14/1/2016</div>
														</div>
														<div class="right">
															<div class="star-rating">
																<span><span class="icon-star"></span></span>
																<span><span class="icon-star"></span></span>
																<span><span class="icon-star"></span></span>
																<span><span class="icon-star"></span></span>
																<span class="disable"><span class="icon-star"></span></span>
															</div>
															<span class="value">4.7/5</span>
														</div>
													</header>
													<div class="des">
														<p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. </p>
														<div class="link-holder">
															<a href="#">Read Full Review</a>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="link-more text-center">
											<a href="#">Show More Reviews - 75 Reviews</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- gallery tab content -->
						<div role="tabpanel" class="tab-pane" id="tab04">
							<ul class="row gallery-list has-center">

								<li class="col-sm-6">
									<a class="fancybox" data-fancybox-group="group" href="<?php echo $img_arr[0]; ?>" title="Caption Goes Here">
										<span class="img-holder">
											<img src="<?php echo $img_arr[3]; ?>" height="240" width="370" alt="image description">
										</span>
										<span class="caption">
											<span class="centered">
												<strong class="title"><?php echo $name_arr[0]; ?></strong>
												<span class="sub-text"><?php echo $city; ?></span>
											</span>
										</span>
									</a>
								</li>

							</ul>
						</div>
						<!-- dates and prices tab content -->
						<div role="tabpanel" class="tab-pane" id="tab05">
							<div class="table-container">
								<div class="table-responsive">
									<table class="table table-striped">
										<thead>
											<tr>
												<th>
													<strong class="date-text">Departure Dates</strong>
													<span class="sub-text">Confirmed Dates</span>
												</th>
												<th>
													<strong class="date-text">Trip Status</strong>
													<span class="sub-text">Trip Status</span>
												</th>
												<th>
													<strong class="date-text">Price (PP)</strong>
													<span class="sub-text">Including Flights</span>
												</th>
												<th>
													<strong class="date-text">Price (PP)</strong>
													<span class="sub-text">Excluding Flights</span>
												</th>
												<th>
													&nbsp;
												</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td><div class="cell"><div class="middle">Fri 18 Oct '16 - Sun 04 Nov '16</div></div></td>
												<td><div class="cell"><div class="middle">Available &amp; Guaranteed</div></div></td>
												<td><div class="cell"><div class="middle">$2,779</div></div></td>
												<td><div class="cell"><div class="middle">$3,170</div></div></td>
												<td><div class="cell"><div class="middle">
													<a href="#" class="btn btn-default">BOOK NOW</a>
												</div></div></td>
											</tr>
											<tr>
												<td><div class="cell"><div class="middle">Fri 18 Oct '16 - Sun 04 Nov '16</div></div></td>
												<td><div class="cell"><div class="middle">Booked &amp; Guaranteed</div></div></td>
												<td><div class="cell"><div class="middle">$2,679</div></div></td>
												<td><div class="cell"><div class="middle">$3,970</div></div></td>
												<td><div class="cell"><div class="middle">
													<a href="#" class="btn btn-default">BOOK NOW</a>
												</div></div></td>
											</tr>
											<tr>
												<td><div class="cell"><div class="middle">Fri 18 Oct '16 - Sun 04 Nov '16</div></div></td>
												<td><div class="cell"><div class="middle">Available &amp; Guaranteed</div></div></td>
												<td><div class="cell"><div class="middle">$1,779</div></div></td>
												<td><div class="cell"><div class="middle">$3,470</div></div></td>
												<td><div class="cell"><div class="middle">
													<a href="#" class="btn btn-default">BOOK NOW</a>
												</div></div></td>
											</tr>
											<tr>
												<td><div class="cell"><div class="middle">Fri 18 Oct '16 - Sun 04 Nov '16</div></div></td>
												<td><div class="cell"><div class="middle">Available</div></div></td>
												<td><div class="cell"><div class="middle">$2,779</div></div></td>
												<td><div class="cell"><div class="middle">$3,970</div></div></td>
												<td><div class="cell"><div class="middle">
													<a href="#" class="btn btn-default">BOOK NOW</a>
												</div></div></td>
											</tr>
											<tr>
												<td><div class="cell"><div class="middle">Fri 18 Oct '16 - Sun 04 Nov '16</div></div></td>
												<td><div class="cell"><div class="middle">Booked &amp; Guaranteed</div></div></td>
												<td><div class="cell"><div class="middle">$3,779</div></div></td>
												<td><div class="cell"><div class="middle">$4,970</div></div></td>
												<td><div class="cell"><div class="middle">
													<a href="#" class="btn btn-default">BOOK NOW</a>
												</div></div></td>
											</tr>
											<tr>
												<td><div class="cell"><div class="middle">Fri 18 Oct '16 - Sun 04 Nov '16</div></div></td>
												<td><div class="cell"><div class="middle">Available &amp; Guaranteed</div></div></td>
												<td><div class="cell"><div class="middle">$2,879</div></div></td>
												<td><div class="cell"><div class="middle">$3,970</div></div></td>
												<td><div class="cell"><div class="middle">
													<a href="#" class="btn btn-default">BOOK NOW</a>
												</div></div></td>
											</tr>
											<tr>
												<td><div class="cell"><div class="middle">Fri 18 Oct '16 - Sun 04 Nov '16</div></div></td>
												<td><div class="cell"><div class="middle">Available &amp; Guaranteed</div></div></td>
												<td><div class="cell"><div class="middle">$2,679</div></div></td>
												<td><div class="cell"><div class="middle">$1,970</div></div></td>
												<td><div class="cell"><div class="middle">
													<a href="#" class="btn btn-default">BOOK NOW</a>
												</div></div></td>
											</tr>
											<tr>
												<td><div class="cell"><div class="middle">Fri 18 Oct '16 - Sun 04 Nov '16</div></div></td>
												<td><div class="cell"><div class="middle">Booked &amp; Guaranteed</div></div></td>
												<td><div class="cell"><div class="middle">$4,779</div></div></td>
												<td><div class="cell"><div class="middle">$3,970</div></div></td>
												<td><div class="cell"><div class="middle">
													<a href="#" class="btn btn-default">BOOK NOW</a>
												</div></div></td>
											</tr>
											<tr>
												<td><div class="cell"><div class="middle">Fri 18 Oct '16 - Sun 04 Nov '16</div></div></td>
												<td><div class="cell"><div class="middle">Available &amp; Guaranteed</div></div></td>
												<td><div class="cell"><div class="middle">$5,779</div></div></td>
												<td><div class="cell"><div class="middle">$3,270</div></div></td>
												<td><div class="cell"><div class="middle">
													<a href="#" class="btn btn-default">BOOK NOW</a>
												</div></div></td>
											</tr>
											<tr>
												<td><div class="cell"><div class="middle">Fri 18 Oct '16 - Sun 04 Nov '16</div></div></td>
												<td><div class="cell"><div class="middle">Available &amp; Guaranteed</div></div></td>
												<td><div class="cell"><div class="middle">$2,779</div></div></td>
												<td><div class="cell"><div class="middle">$3,970</div></div></td>
												<td><div class="cell"><div class="middle">
													<a href="#" class="btn btn-default">BOOK NOW</a>
												</div></div></td>
											</tr>
										</tbody>
									</table>
								</div>

							</div>
						</div>
					</div>
				</div>

				<!-- recent block -->
				<aside class="recent-block recent-gray recent-wide-thumbnail">
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
	<script src="vendors/sticky-kit/sticky-kit.js"></script>
	<!-- mailchimp newsletter subscriber -->
	<script src="js/mailchimp.js"></script>
	<!-- custom script -->
	<script src="js/sticky-kit-init.js"></script>
	<script src="js/jquery.main.js"></script>
	 <script src="js/itinerary.js"></script>

</body>

</html>
