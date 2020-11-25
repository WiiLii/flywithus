<?php

if (isset($_POST['session'])) {
		session_start();
	if(!isset($_SESSION['email'])){

				header('location:login.php');

	}
	else{
				header('location:survey.php');
	}
}
			?>
<!DOCTYPE html>
<html>

<!-- Mirrored from html.waituk.com/entrada/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 17 Sep 2020 05:32:17 GMT -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Entrada</title>
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
	<!-- link to revolution css  -->
	<link rel="stylesheet" type="text/css" href="vendors/revolution/css/settings.css">
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
		<?php include 'header.php'; ?>


			<!-- main banner -->
			<div class="banner banner-home">
				<!-- revolution slider starts -->
				<div id="rev_slider_279_1_wrapper" class="rev_slider_wrapper fullscreen-container" data-alias="restaurant-header" style="margin:0px auto;background-color:#474d4b;padding:0px;margin-top:0px;margin-bottom:0px;">
					<div id="rev_slider_70_1" class="rev_slider fullscreenabanner" style="display:none;" data-version="5.1.4">
						<ul>
							<li class="slider-color-schema-dark" data-index="rs-2" data-transition="fade" data-slotamount="7" data-easein="default" data-easeout="default" data-masterspeed="1000" data-rotate="0" data-saveperformance="off" data-title="Slide" data-description="">
								<!-- main image for revolution slider -->
								<img src="img/banner/img-01.jpg" alt="image description" data-bgposition="center center" data-kenburns="on" data-duration="30000" data-ease="Linear.easeNone" data-scalestart="100" data-scaleend="120" data-rotatestart="0" data-rotateend="0" data-offsetstart="0 0" data-offsetend="0 0" data-bgparallax="10" class="rev-slidebg" data-bgfit="cover" data-no-retina>

								<div class="tp-caption tp-resizeme" id="slide-897-layer-7"
									data-x="['center','center','center','center']"
									data-hoffset="['0','0','0','0']"
									data-y="['top','top','middle','middle']"
									data-voffset="['160','120','-120','-70']"
									data-width="none"
									data-height="none"
									data-whitespace="nowrap"
									data-transform_idle="o:1;"
									data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:2000;e:Power2.easeInOut;"
									data-transform_out="opacity:0;s:300;s:300;"
									data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
									data-start="1500"
									data-splitin="none"
									data-splitout="none"
									data-responsive_offset="on"
									style="z-index: 9; white-space: nowrap; font-size: 60px; line-height: 100px;text-align:center;">
									<span class="icon-wildlife"></span>
								</div>

								<div class="tp-caption banner-heading-sub tp-resizeme rs-parallaxlevel-0"
									data-x="['center','center','center','center']"
									data-hoffset="['0','0','0','0']"
									data-y="['top','top','middle','middle']"
									data-voffset="['280','240','10','20']"
									data-fontsize="['48','48','44','28']"
									data-lineheight="['85','85','50','50']"
									data-width="['1200','1000','750','480']"
									data-height="none"
									data-whitespace="normal"
									data-transform_idle="o:1;"
									data-transform_in="z:0;rX:0deg;rY:0;rZ:0;sX:1.5;sY:1.5;skX:0;skY:0;opacity:0;s:1500;e:Power3.easeInOut;"
									data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
									data-mask_in="x:0px;y:0px;"
									data-mask_out="x:inherit;y:inherit;"
									data-start="1000"
									data-splitin="none"
									data-splitout="none"
									data-responsive_offset="on"
									style="z-index: 7; letter-spacing: 0; font-weight: 100; text-align: center; color: #ffffff">EXPEDITION OF UNEXPLORED
								</div>

								<div class="tp-caption banner-heading-sub tp-resizeme rs-parallaxlevel-10"
									data-x="['center','center','center','center']"
									data-hoffset="['0','0','0','0']"
									data-y="['top','top','middle','middle']"
									data-voffset="['340','290','70','70']"
									data-fontsize="['60','60','60','40']"
									data-lineheight="['110','110','100','60']"
									data-width="none"
									data-height="none"
									data-whitespace="nowrap"
									data-transform_idle="o:1;"
									data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:1500;e:Power4.easeInOut;"
									data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
									data-mask_in="x:0px;y:[100%];s:inherit;e:inherit;"
									data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
									data-start="1000"
									data-splitin="none"
									data-splitout="none"
									data-responsive_offset="on"
									style="z-index: 8; padding-right: 10px; text-indent: 5px; font-weight: 900; white-space: nowrap;">TERRITORY
								</div>

								<div class="tp-caption rev-btn  rs-parallaxlevel-10" id="slide-163-layer-2"
									data-x="['center','center','center','center']"
									data-hoffset="['0','0','0','0']"
									data-y="['middle','middle','middle','middle']"
									data-voffset="['150','160','180','150']"
									data-width="none"
									data-height="none"
									data-whitespace="nowrap"
									data-transform_idle="o:1;"
									data-transform_hover="o:1;rX:0;rY:0;rZ:0;z:0;s:300;e:Power3.easeOut;"
									data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;"
									data-transform_out="y:[175%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
									data-mask_out="x:inherit;y:inherit;"
									data-start="1250"
									data-splitin="none"
									data-splitout="none"
									data-actions='[{"event":"click","action":"jumptoslide","slide":"rs-164","delay":""}]'
									data-responsive_offset="on">
									<a class="btn btn-banner" href="#">PURCHASE</a>



								</div>
							</li>

							<li data-index="rs-81" data-transition="slideoverup" data-slotamount="7"  data-easein="default" data-easeout="default" data-masterspeed="1000"  data-rotate="0"  data-saveperformance="off"  data-title="The Menu" data-description="">
								<!-- main image for revolution slide -->
								<img alt="image description" src="img/banner/img-01.jpg"  data-lazyload="https://html-i0ipxhws.netdna-ssl.com/entrada/img/banner/img-02.jpg" data-bgposition="right center" data-kenburns="on" data-duration="30000" data-ease="Power1.easeOut" data-scalestart="110" data-scaleend="100" data-rotatestart="0" data-rotateend="0" data-offsetstart="0 0" data-offsetend="0 0" class="rev-slidebg" data-no-retina>

								<div class="tp-caption tp-resizeme" id="slide-897-layer1-7"
									data-x="['center','center','center','center']"
									data-hoffset="['0','0','0','0']"
									data-y="['top','top','middle','middle']"
									data-voffset="['160','120','-120','-70']"
									data-width="none"
									data-height="none"
									data-whitespace="nowrap"
									data-transform_idle="o:1;"
									data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:2000;e:Power2.easeInOut;"
									data-transform_out="opacity:0;s:300;s:300;"
									data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
									data-start="1500"
									data-splitin="none"
									data-splitout="none"
									data-responsive_offset="on"
									style="z-index: 9; white-space: nowrap; font-size: 60px; line-height: 100px;text-align:center;">
									<span class="icon-hiking-camping"></span>
								</div>

								<div class="tp-caption banner-heading-sub tp-resizeme rs-parallaxlevel-0"
									data-x="['center','center','center','center']"
									data-hoffset="['0','0','0','0']"
									data-y="['top','top','middle','middle']"
									data-voffset="['280','240','10','20']"
									data-fontsize="['48','48','44','28']"
									data-lineheight="['85','85','50','50']"
									data-width="['1200','1000','750','480']"
									data-height="none"
									data-whitespace="normal"
									data-transform_idle="o:1;"
									data-transform_in="z:0;rX:0deg;rY:0;rZ:0;sX:1.5;sY:1.5;skX:0;skY:0;opacity:0;s:1500;e:Power3.easeInOut;"
									data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
									data-mask_in="x:0px;y:0px;"
									data-mask_out="x:inherit;y:inherit;"
									data-start="1000"
									data-splitin="none"
									data-splitout="none"
									data-responsive_offset="on"
									style="z-index: 7; letter-spacing: 0; font-weight: 100; text-align: center; color: #ffffff">ADEVENTURE TOUR TEMPLATE
								</div>

								<div class="tp-caption tp-resizeme banner-heading-sub rs-parallaxlevel-10"
									data-x="['center','center','center','center']"
									data-hoffset="['-80','-80','-80','-60']"
									data-y="['top','top','middle','middle']"
									data-voffset="['330','280','60','60']"
									data-fontsize="['60','60','60','40']"
									data-lineheight="['110','110','100','60']"
									data-width="none"
									data-height="none"
									data-whitespace="nowrap"
									data-transform_idle="o:1;"
									data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:1500;e:Power4.easeInOut;"
									data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
									data-mask_in="x:0px;y:[100%];s:inherit;e:inherit;"
									data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
									data-start="1000"
									data-splitin="none"
									data-splitout="none"
									data-responsive_offset="on"
									style="z-index: 8; padding-right: 10px; text-indent: 5px; font-weight: 300; font-style: italic; white-space: nowrap; color:">of
								</div>

								<div class="tp-caption tp-resizeme banner-heading-sub rs-parallaxlevel-10"
									data-x="['center','center','center','center']"
									data-hoffset="['30','30','30','20']"
									data-y="['top','top','middle','middle']"
									data-voffset="['330','280','60','60']"
									data-fontsize="['60','60','60','40']"
									data-lineheight="['110','110','100','60']"
									data-width="none"
									data-height="none"
									data-whitespace="nowrap"
									data-transform_idle="o:1;"
									data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:1500;e:Power4.easeInOut;"
									data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
									data-mask_in="x:0px;y:[100%];s:inherit;e:inherit;"
									data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
									data-start="1000"
									data-splitin="none"
									data-splitout="none"
									data-responsive_offset="on"
									style="z-index: 8; padding-right: 10px; text-indent: 5px; font-weight: 900; white-space: nowrap;">2016
								</div>

								<div class="tp-caption rev-btn rs-parallaxlevel-10" id="slide-163-layer1-2"
									data-x="['center','center','center','center']"
									data-hoffset="['0','0','0','0']"
									data-y="['middle','middle','middle','middle']"
									data-voffset="['150','160','180','150']"
									data-width="none"
									data-height="none"
									data-whitespace="nowrap"
									data-transform_idle="o:1;"
									data-transform_hover="o:1;rX:0;rY:0;rZ:0;z:0;s:300;e:Power3.easeOut;"
									data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;"
									data-transform_out="y:[175%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
									data-mask_out="x:inherit;y:inherit;"
									data-start="800"
									data-splitin="none"
									data-splitout="none"
									data-actions='[{"event":"click","action":"jumptoslide","slide":"rs-164","delay":""}]'
									data-responsive_offset="on">
									<a class="btn btn-banner" href="#">PURCHASE</a>
								</div>
							</li>
						</ul>
					</div>
				</div>
				<div class="feature-block">
					<div class="holder">
						<ul>
							<li>
								<a href="#">
									<span class="ico">
										<span class="icon-bungee"></span>
									</span>
									<span class="info">Bungee Jump</span>
								</a>
							</li>
							<li>
								<a href="#">
									<span class="ico">
										<span class="icon-hiking"></span>
									</span>
									<span class="info">Hiking Trips</span>
								</a>
							</li>
							<li>
								<a href="#">
									<span class="ico">
										<span class="icon-wildlife"></span>
									</span>
									<span class="info">Wildlife Safari</span>
								</a>
							</li>
							<li>
								<a href="#">
									<span class="ico">
										<span class="icon-peak-climbing"></span>
									</span>
									<span class="info">Peak Climbing</span>
								</a>
							</li>
							<li>
								<a href="#">
									<span class="ico">
										<span class="icon-mountain-biking"></span>
									</span>
									<span class="info">Mount Biking</span>
								</a>
							</li>
							<li>
								<a href="#">
									<span class="ico">
										<span class="icon-scuba-diving"></span>
									</span>
									<span class="info">Scuba Diving</span>
								</a>
							</li>
							<li>
								<a href="#">
									<span class="ico">
										<span class="icon-hunting"></span>
									</span>
									<span class="info">Hunting Trip</span>
								</a>
							</li>
							<li>
								<a href="#">
									<span class="ico">
										<span class="icon-boating"></span>
									</span>
									<span class="info">Sailing Trips</span>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<!-- main container -->
			<main id="main">

					<form class="" action="<?php $_SERVER["PHP_SELF"] ?>" method="post">
							<button type="submit" name="session">survey</button>
					</form>

				<!-- article list holder -->
				<div class="content-block content-spacing">
					<div class="container">
						<header class="content-heading">
							<h2 class="main-heading">POPULAR TOURS</h2>
							<span class="main-subtitle">We have a unique way of meeting your adventurous expectations!</span>
							<div class="seperator"></div>
						</header>
						<div class="content-holder">
							<div class="row db-3-col">
								<article class="col-sm-6 col-md-4 article has-hover-s3">
									<div class="img-wrap">
										<a href="#">
											<img src="../../html-i0ipxhws.netdna-ssl.com/entrada/img/listing/img-01.jpg" height="215" width="370" alt="image description">
										</a>
										<div class="img-caption text-uppercase">Discover Timeless</div>
										<div class="hover-article">
											<div class="star-rating">
												<span><span class="icon-star"></span></span>
												<span><span class="icon-star"></span></span>
												<span><span class="icon-star"></span></span>
												<span><span class="icon-star"></span></span>
												<span class="disable"><span class="icon-star"></span></span>
											</div>
											<div class="icons">
												<a href="#"><span class="icon-heart"></span></a>
												<a href="#"><span class="icon-reply"></span></a>
											</div>
											<div class="info-footer">
												<span class="price">from <span>$2749</span></span>
												<a href="#" class="link-more">Explore</a>
											</div>
										</div>
									</div>
									<h3><a href="#">Jungle safari for families</a></h3>
									<p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum,</p>
								</article>
								<article class="col-sm-6 col-md-4 article has-hover-s3">
									<div class="img-wrap">
										<a href="#">
											<img src="img/listing/img-02.jpg" height="215" width="370" alt="image description">
										</a>
										<div class="img-caption text-uppercase">Finding Egyptians</div>
										<div class="hover-article">
											<div class="star-rating">
												<span><span class="icon-star"></span></span>
												<span><span class="icon-star"></span></span>
												<span><span class="icon-star"></span></span>
												<span><span class="icon-star"></span></span>
												<span class="disable"><span class="icon-star"></span></span>
											</div>
											<div class="icons">
												<a href="#"><span class="icon-heart"></span></a>
												<a href="#"><span class="icon-reply"></span></a>
											</div>
											<div class="info-footer">
												<span class="price">from <span>$2749</span></span>
												<a href="#" class="link-more">Explore</a>
											</div>
										</div>
									</div>
									<h3><a href="#">Nature wildlife photography</a></h3>
									<p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum,</p>
								</article>
								<article class="col-sm-6 col-md-4 article has-hover-s3">
									<div class="img-wrap">
										<a href="#">
											<img src="img/listing/img-03.jpg" height="215" width="370" alt="image description">
										</a>
										<div class="img-caption text-uppercase">Cave Adventures</div>
										<div class="hover-article">
											<div class="star-rating">
												<span><span class="icon-star"></span></span>
												<span><span class="icon-star"></span></span>
												<span><span class="icon-star"></span></span>
												<span><span class="icon-star"></span></span>
												<span class="disable"><span class="icon-star"></span></span>
											</div>
											<div class="icons">
												<a href="#"><span class="icon-heart"></span></a>
												<a href="#"><span class="icon-reply"></span></a>
											</div>
											<div class="info-footer">
												<span class="price">from <span>$2749</span></span>
												<a href="#" class="link-more">Explore</a>
											</div>
										</div>
									</div>
									<h3><a href="#">Polar arctic expeditions</a></h3>
									<p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum,</p>
								</article>
								<article class="col-sm-6 col-md-4 article has-hover-s3">
									<div class="img-wrap">
										<a href="#">
											<img src="img/listing/img-04.jpg" height="215" width="370" alt="image description">
										</a>
										<div class="img-caption text-uppercase">Peak Climbing</div>
										<div class="hover-article">
											<div class="star-rating">
												<span><span class="icon-star"></span></span>
												<span><span class="icon-star"></span></span>
												<span><span class="icon-star"></span></span>
												<span><span class="icon-star"></span></span>
												<span class="disable"><span class="icon-star"></span></span>
											</div>
											<div class="icons">
												<a href="#"><span class="icon-heart"></span></a>
												<a href="#"><span class="icon-reply"></span></a>
											</div>
											<div class="info-footer">
												<span class="price">from <span>$2749</span></span>
												<a href="#" class="link-more">Explore</a>
											</div>
										</div>
									</div>
									<h3><a href="#">Marine diving excursions</a></h3>
									<p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum,</p>
								</article>
								<article class="col-sm-6 col-md-4 article has-hover-s3">
									<div class="img-wrap">
										<a href="#">
											<img src="img/listing/img-05.jpg" height="215" width="370" alt="image description">
										</a>
										<div class="img-caption text-uppercase">Treasure Hunting</div>
										<div class="hover-article">
											<div class="star-rating">
												<span><span class="icon-star"></span></span>
												<span><span class="icon-star"></span></span>
												<span><span class="icon-star"></span></span>
												<span><span class="icon-star"></span></span>
												<span class="disable"><span class="icon-star"></span></span>
											</div>
											<div class="icons">
												<a href="#"><span class="icon-heart"></span></a>
												<a href="#"><span class="icon-reply"></span></a>
											</div>
											<div class="info-footer">
												<span class="price">from <span>$2749</span></span>
												<a href="#" class="link-more">Explore</a>
											</div>
										</div>
									</div>
									<h3><a href="#">Go wild at national parks</a></h3>
									<p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum,</p>
								</article>
								<article class="col-sm-6 col-md-4 article has-hover-s3">
									<div class="img-wrap">
										<a href="#">
											<img src="img/listing/img-06.jpg" height="215" width="370" alt="image description">
										</a>
										<div class="img-caption text-uppercase">A night with sky</div>
										<div class="hover-article">
											<div class="star-rating">
												<span><span class="icon-star"></span></span>
												<span><span class="icon-star"></span></span>
												<span><span class="icon-star"></span></span>
												<span><span class="icon-star"></span></span>
												<span class="disable"><span class="icon-star"></span></span>
											</div>
											<div class="icons">
												<a href="#"><span class="icon-heart"></span></a>
												<a href="#"><span class="icon-reply"></span></a>
											</div>
											<div class="info-footer">
												<span class="price">from <span>$2749</span></span>
												<a href="#" class="link-more">Explore</a>
											</div>
										</div>
									</div>
									<h3><a href="#">Educational trips in wild</a></h3>
									<p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum,</p>
								</article>
							</div>
						</div>
					</div>
				</div>

				<!-- browse block -->
				<div class="browse-block">
					<div class="browse-destination column">
						<a href="#"><span>BROWSE BY DESTINATION</span></a>
					</div>
					<div class="browse-adventures column">
						<a href="#"><span>BROWSE BY ADVENTURES</span></a>
					</div>
				</div>
				<!-- article list with boxed style -->
				<section class="content-block article-boxed">
					<div class="container">
						<header class="content-heading">
							<h2 class="main-heading">TOP ADVENTURES</h2>
							<span class="main-subtitle">Our collection of the most popular adventures in 2016.</span>
							<div class="seperator"></div>
						</header>
						<div class="content-holder content-boxed">
							<div class="row db-3-col">
								<article class="col-sm-6 col-md-4 article has-hover-s1">
									<div class="thumbnail">
										<div class="img-wrap">
											<img src="img/listing/img-07.jpg" height="228" width="350" alt="image description">
										</div>
										<h3 class="small-space"><a href="tour-detail.html">Evening with Panda in China</a></h3>
										<span class="info">Nordic Walk, Swiss Alps or French Hiking?</span>
										<aside class="meta">
											<span class="country">
												<span class="icon-world"> </span>12 Countries
											</span>
											<span class="activity">
												<span class="icon-acitivities"> </span>79 Activities
											</span>
										</aside>
										<p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum,</p>
										<a href="tour-detail.html" class="btn btn-default">explore</a>
										<footer>
											<ul class="social-networks">
												<li><a href="#"><span class="icon-twitter"></span></a></li>
												<li><a href="#"><span class="icon-google-plus"></span></a></li>
												<li><a href="#"><span class="icon-facebook"></span></a></li>
												<li><a href="#"><span class="icon-linkedin"></span></a></li>
											</ul>
											<span class="price">from <span>$2749</span></span>
										</footer>
									</div>
								</article>
								<article class="col-sm-6 col-md-4 article has-hover-s1">
									<div class="thumbnail">
										<div class="img-wrap">
											<img src="img/listing/img-08.jpg" height="228" width="350" alt="image description">
										</div>
										<h3 class="small-space"><a href="tour-detail.html">Sleeping with Sea Lion in Arctic</a></h3>
										<span class="info">Nordic Walk, Swiss Alps or French Hiking?</span>
										<aside class="meta">
											<span class="country">
												<span class="icon-world"> </span>12 Countries
											</span>
											<span class="activity">
												<span class="icon-acitivities"> </span>79 Activities
											</span>
										</aside>
										<p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum,</p>
										<a href="tour-detail.html" class="btn btn-default">explore</a>
										<footer>
											<ul class="social-networks">
												<li><a href="#"><span class="icon-twitter"></span></a></li>
												<li><a href="#"><span class="icon-google-plus"></span></a></li>
												<li><a href="#"><span class="icon-facebook"></span></a></li>
												<li><a href="#"><span class="icon-linkedin"></span></a></li>
											</ul>
											<span class="price">from <span>$2749</span></span>
										</footer>
									</div>
								</article>
								<article class="col-sm-6 col-md-4 article has-hover-s1">
									<div class="thumbnail">
										<div class="img-wrap">
											<img src="img/listing/img-09.jpg" height="228" width="350" alt="image description">
										</div>
										<h3 class="small-space"><a href="tour-detail.html">Following Zebras to Water hole</a></h3>
										<span class="info">Nordic Walk, Swiss Alps or French Hiking?</span>
										<aside class="meta">
											<span class="country">
												<span class="icon-world"> </span>12 Countries
											</span>
											<span class="activity">
												<span class="icon-acitivities"> </span>79 Activities
											</span>
										</aside>
										<p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum,</p>
										<a href="tour-detail.html" class="btn btn-default">explore</a>
										<footer>
											<ul class="social-networks">
												<li><a href="#"><span class="icon-twitter"></span></a></li>
												<li><a href="#"><span class="icon-google-plus"></span></a></li>
												<li><a href="#"><span class="icon-facebook"></span></a></li>
												<li><a href="#"><span class="icon-linkedin"></span></a></li>
											</ul>
											<span class="price">from <span>$2749</span></span>
										</footer>
									</div>
								</article>
								<article class="col-sm-6 col-md-4 article has-hover-s1">
									<div class="thumbnail">
										<div class="img-wrap">
											<img src="img/listing/img-10.jpg" height="228" width="350" alt="image description">
										</div>
										<h3 class="small-space"><a href="tour-detail.html">Discovering Wild Trails in Africa</a></h3>
										<span class="info">Nordic Walk, Swiss Alps or French Hiking?</span>
										<aside class="meta">
											<span class="country">
												<span class="icon-world"> </span>12 Countries
											</span>
											<span class="activity">
												<span class="icon-acitivities"> </span>79 Activities
											</span>
										</aside>
										<p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum,</p>
										<a href="tour-detail.html" class="btn btn-default">explore</a>
										<footer>
											<ul class="social-networks">
												<li><a href="#"><span class="icon-twitter"></span></a></li>
												<li><a href="#"><span class="icon-google-plus"></span></a></li>
												<li><a href="#"><span class="icon-facebook"></span></a></li>
												<li><a href="#"><span class="icon-linkedin"></span></a></li>
											</ul>
											<span class="price">from <span>$2749</span></span>
										</footer>
									</div>
								</article>
								<article class="col-sm-6 col-md-4 article has-hover-s1">
									<div class="thumbnail">
										<div class="img-wrap">
											<img src="img/listing/img-11.jpg" height="228" width="350" alt="image description">
										</div>
										<h3 class="small-space"><a href="tour-detail.html">Angola Safari for Family &amp; Children</a></h3>
										<span class="info">Nordic Walk, Swiss Alps or French Hiking?</span>
										<aside class="meta">
											<span class="country">
												<span class="icon-world"> </span>12 Countries
											</span>
											<span class="activity">
												<span class="icon-acitivities"> </span>79 Activities
											</span>
										</aside>
										<p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum,</p>
										<a href="tour-detail.html" class="btn btn-default">explore</a>
										<footer>
											<ul class="social-networks">
												<li><a href="#"><span class="icon-twitter"></span></a></li>
												<li><a href="#"><span class="icon-google-plus"></span></a></li>
												<li><a href="#"><span class="icon-facebook"></span></a></li>
												<li><a href="#"><span class="icon-linkedin"></span></a></li>
											</ul>
											<span class="price">from <span>$2749</span></span>
										</footer>
									</div>
								</article>
								<article class="col-sm-6 col-md-4 article has-hover-s1">
									<div class="thumbnail">
										<div class="img-wrap">
											<img src="img/listing/img-12.jpg" height="228" width="350" alt="image description">
										</div>
										<h3 class="small-space"><a href="tour-detail.html">Royal Safari in Bangaladesh</a></h3>
										<span class="info">Nordic Walk, Swiss Alps or French Hiking?</span>
										<aside class="meta">
											<span class="country">
												<span class="icon-world"> </span>12 Countries
											</span>
											<span class="activity">
												<span class="icon-acitivities"> </span>79 Activities
											</span>
										</aside>
										<p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum,</p>
										<a href="tour-detail.html" class="btn btn-default">explore</a>
										<footer>
											<ul class="social-networks">
												<li><a href="#"><span class="icon-twitter"></span></a></li>
												<li><a href="#"><span class="icon-google-plus"></span></a></li>
												<li><a href="#"><span class="icon-facebook"></span></a></li>
												<li><a href="#"><span class="icon-linkedin"></span></a></li>
											</ul>
											<span class="price">from <span>$2749</span></span>
										</footer>
									</div>
								</article>
							</div>
						</div>
					</div>
				</section>


			</main>
		</div>
		<!-- main footer -->
	<?php include "footer.php"; ?>
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
	<script src="js/mailchimp.js"></script>
	<script src="vendors/retina/retina.min.js"></script>
	<script src="vendors/sticky-kit/sticky-kit.js"></script>
	<script src="js/sticky-kit-init.js"></script>
	<script src="vendors/bootstrap-datetimepicker-master/dist/js/bootstrap-datepicker.js"></script>
	<!-- custom jquery script -->
	<script src="js/jquery.main.js"></script>
	<!-- revolution slider plugin -->
	<script type="text/javascript" src="vendors/revolution/js/jquery.themepunch.tools.min.js"></script>
	<script type="text/javascript" src="vendors/revolution/js/jquery.themepunch.revolution.min.js"></script>
	<!-- rs5.0 core files -->
	<script type="text/javascript" src="vendors/revolution/js/jquery.themepunch.tools.min838f.js?rev=5.0"></script>
	<script type="text/javascript" src="vendors/revolution/js/jquery.themepunch.revolution.min838f.js?rev=5.0"></script>
	<script type="text/javascript" src="vendors/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
	<script type="text/javascript" src="vendors/revolution/js/extensions/revolution.extension.actions.min.js"></script>
	<script type="text/javascript" src="vendors/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
	<script type="text/javascript" src="../../html-i0ipxhws.netdna-ssl.com/entrada/vendors/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
	<script type="text/javascript" src="vendors/revolution/js/extensions/revolution.extension.video.min.js"></script>
	<script type="text/javascript" src="vendors/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
	<script type="text/javascript" src="vendors/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
	<!-- revolutions slider script -->
	<script src="js/revolution.js"></script>
</body>

<!-- Mirrored from html.waituk.com/entrada/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 17 Sep 2020 05:36:31 GMT -->
</html>
