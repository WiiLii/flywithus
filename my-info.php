<?php
include "config.php";
$hotelinfo=$hotelImg=$hotelsName="";
$price=$rm1=$rm2=$rm3=$country=$room=$pCity=array();
if (isset($_POST['getHotel'])) {
$hotelsName = $_POST['getHotel'];
//echo $hotelsName;
$sql= "SELECT * FROM hotels where hotelName = '$hotelsName'" ;
$result = $db->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
      $hotelImg=$row['image'];
      $hotelinfo=$row['hotelInfo'];
      $room[]= $row['room'];
      $country[]=$row['country'];
      $pCity[]= $row['pCity'];
      $price[]= $row['price'];
      $rm1[]= $row['rm1'];
      $rm2[]= $row['rm2'];
      $rm3[]= $row['rm3'];

  }
}
//exit;
}
//var_dump($items_arr);

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
				<!-- content block -->
				<div class="content-block content-sub">
					<div class="container">
                    <center><div class="content-block content-sub">
                      <?php

				echo'<img src="img/hotels/'.$hotelImg.'.jpg" alt="country image">';?>
                    </center>
                    <center><h2><?php echo $hotelsName; ?></h2></center>
						<!-- list view -->
						<div class="content-holder list-view">
                            <article class="article">
                                <div class="thumbnail">
                                            <header class="heading">
                                                <h2>About Hotel</h2>
                                            </header>
                                            <p><?php echo $hotelinfo; ?></p>
                                </div>
                            </article>
                        </div>
                        <div class="content-holder list-view">
                            <article class="article">
                                <div class="container">
                                    <header class="heading">
                                        <h2>Amenities</h2>
                                    </header>

											<div class=col>
												<div>
													<h4><span>&#10003; Airport Transit</span></h4>
													<h4><span>&#10003; Free Parking</span></h4>
													<h4><span>&#10003; Early Check-In</span></h4>
													<h4><span>&#10003; Late Check-Out</span></h4>
												</div>
											</div>
											<div class=col>
												<div>
													<h4><span>&#10003; Hotel Pub</span></h4>
													<h4><span>&#10003; Restaurants</span></h4>
													<h4><span>&#10003; Gym</span></h4>
													<h4><span>&#10003; Swimming Pool</span></h4>
												</div>
											</div>
											<div class=col>
												<div>
													<h4><span>&#10003; Wifi</span></h4>
													<h4><span>&#10003; Bath Tub</span></h4>
													<h4><span>&#10003; Personal Care</span></h4>
													<h4><span>&#10003; Bathrobes</span></h4>
												</div>
											</div>
											<div class=col>
												<div>
													<h3><span>&#10003; Free Breakfast</span></h3>
													<h3><span>&#10003; In-Room Tablets</span></h3>
													<h3><span>&#10003; Television</span></h3>
													<h3><span>&#10003; Room Service</span></h3>
												</div>
											</div>
											<div class=col>
												<div>
													<h3><span>&#10003; Washing Machine</span></h3>
													<h3><span>&#10003; Toiletries</span></h3>
													<h3><span>&#10003; Air Condition</span></h3>
													<h3><span>&#10003; Heater</span></h3>
												</div>
											</div>

                                </div>

                            </article>
                        </div>
                            <div role="tabpanel" class="tab-pane" id="tab06">
                        <div class="table-container">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>
                                                <strong class="date-text">Hotel</strong>
                                            </th>
                                            <th>
                                                <strong class="date-text">Location</strong>
                                            </th>
                                            <th>
                                                <strong class="date-text">Room Type</strong>
                                            </th>
                                            <th>
                                                <strong class="date-text">Room Price (SGD)</strong>

                                            </th>
                                            <th>
                                                &nbsp;
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                          for ($i=0; $i <count($room) ; $i++) {
                                            echo '<tr>';
                                            if ($i == 0) {
                                            echo'<td><img src="img/hotels/'.$rm1[$i].'.jpg" alt="country image"></td>';
                                          }else if ($i == 1){
                                            echo'<td><img src="img/hotels/'.$rm1[$i].'.jpg" alt="country image"></td>';
                                          }
                                          else {
                                            echo'<td><img src="img/hotels/'.$rm1[$i].'.jpg" alt="country image"></td>';
                                          }
                                          echo '<td><div class="cell"><div class="middle">'.$country[$i].', '.$pCity[$i].'</div></div></td>';
                                          echo '<td><div class="cell"><div class="middle">'.$room[$i].'</div></div></td>';
                                          echo '<td><div class="cell"><div class="middle">$'.$price[$i].'</div></div></td>';
                                          echo '<td><div class="cell"><div class="middle"><a href="my-cart.php" class="btn btn-default">Add to Cart</a> </div></div></td>';

                                            echo '<tr>';
                                          }
                                         ?>
                                </table>
                            </div>
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
