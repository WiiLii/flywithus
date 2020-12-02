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
                <?php
                include 'header.php';
                include "config.php";
                session_start();
                if (!isset($_SESSION['email'])) {
                    echo "<script>alert('Please log in to access the survey.')</script>";
                    header('Location:login.php');
                } else {
                    
                }
                $session_email = $_SESSION['email'];
                $sqlgetUserID = "SELECT userID FROM useraccount WHERE email = '$session_email'";
                $result = $db->query($sqlgetUserID);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $user_id = $row["userID"];
                    }
                }
                global $user_id;
                $sqlgetSurvey = "SELECT * FROM results WHERE userID = $user_id ORDER BY submissionTime DESC LIMIT 1";
                $result = $db->query($sqlgetSurvey);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $age = $row['age']; #'>50'
                        $relationship = $row['relationship']; # married
                        $travelGroup = $row['travelGroup']; #'Solo'
                        $groupDesc = $row['groupDesc']; #'Romantic'
                        if ($groupDesc == "Romantic") {
                            $groupDesc = "test";
                        }
                        $season = $row['season']; # 'Winter'
                        $activity = $row['activity']; #'Shopping'
                        $days = $row['days']; #7
                        $budget = $row['budget']; #'$400 to $499'   
                        $accomodation = $row['accomodation']; # no
                    }
                }
                $itineraryDays = $days - 2;

                $itineraryCountries = ["Thailand", "China", "Korea", "Japan"];
                $success = true;
                $arr = 0;
                while ($success) {
                    if ($arr == 4) {
                        echo '<script>alert("Optimized Itinerary Not Found. Please take the survey again.")</script>';
                        echo '<script>window.location = "survey.php";</script>';
                        break;
                    }
                    $sqlsetCountry = "SELECT COUNT(itineraryCountry) FROM itinerary "
                            . "WHERE itineraryCountry = '$itineraryCountries[$arr]' AND "
                            . "itineraryType = '$groupDesc'LIMIT $itineraryDays";
                    $result = $db->query($sqlsetCountry);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $itineraryCheckDay = $row['COUNT(itineraryCountry)'];
                           // echo '<script>alert("'.$itineraryCheckDay.'")</script>';
                        }
                    }
                    // echo '<script>alert("out, '.$itineraryCheckDay.', '.$itineraryDays.'")</script>';
                    if ($itineraryCheckDay >= $itineraryDays) {
                        $itineraryCountry = $itineraryCountries[$arr];
                        break;
                    } else {
                        $arr += 1;
                    }
                  //  echo '<script>alert("this is $arr, '.$arr.'")</script>';
                }
                global $itineraryCountry;
                $sqlgetPrice = "SELECT SUM(itineraryPrice) FROM itinerary WHERE itineraryCountry = '$itineraryCountry'AND itineraryType = '$groupDesc' LIMIT $itineraryDays;";
                $sqlitineraryOverview = "SELECT * FROM itinerary WHERE itineraryCountry = '$itineraryCountry' AND itineraryType = '$groupDesc' LIMIT 1";
                $sqlGetItineraryDays = "SELECT * FROM itinerary WHERE itineraryCountry = '$itineraryCountry' AND itineraryType = '$groupDesc'LIMIT $itineraryDays";
                ?>
                <!-- main container -->
                <main id="main" style="padding-top: 0px;">
                    <!-- main tour information -->
                    <section class="container-fluid trip-info">
                        <div class="same-height two-columns row">
                            <div class="height col-md-6">
                                <!-- top image slideshow -->

                                <div id="tour-slide">
                                    <div class="slide">
                                        <div class="bg-stretch">
                                            <img src="img/countries/<?php echo $itineraryCountry ?>/img-1.jpg" alt="image descriprion" height="1104" width="966">
                                        </div>
                                    </div>
                                    <div class="slide">
                                        <div class="bg-stretch">
                                            <img src="img/countries/<?php echo $itineraryCountry ?>/img-2.jpg" alt="image descriprion" height="1104" width="966">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="height col-md-6 text-col">
                                <div class="holder">
                                    <div style="padding: 30px;"></div>
                                    <h1 class="small-size"><?php echo "$groupDesc in $itineraryCountry " ?> </h1>
                                    <div class="price">
                                        from <strong>$<?php
                global $sqlgetPrice;
                $result = $db->query($sqlgetPrice);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo $row['SUM(itineraryPrice)'];
                    }
                }
                ?></strong>
                                    </div>
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
                                <div style="padding: 10px;"></div>
                            </div>
                        </div>
                    </section>
                    <div class="tab-container">
                        <nav class="nav-wrap" id="sticky-tab">
                            <div class="container">
                                <!-- nav tabs -->
                                <ul class="nav nav-tabs text-center" role="tablist">
                                    <li role="presentation" class="active"><a href="#tab01" aria-controls="tab01" role="tab" data-toggle="tab">Overview</a></li>
                                    <li role="presentation"><a href="#tab02" aria-controls="tab02" role="tab" data-toggle="tab">Itinerary</a></li>
                                    <li role="presentation"><a href="#tab03" aria-controls="tab03" role="tab" data-toggle="tab">Gallery</a></li>
                                    <li role="presentation"><a href="#tab04" aria-controls="tab04" role="tab" data-toggle="tab">Faq &amp; Review</a></li>
                                    <!--<li role="presentation"><a href="#tab05" aria-controls="tab05" role="tab" data-toggle="tab">Dates &amp; Price</a></li>-->
                                </ul>
                            </div>
                        </nav>
                        <!-- tab panes -->
                        <div class="container tab-content trip-detail">
                            <!-- overview tab content -->
                            <div role="tabpanel" class="tab-pane active" id="tab01">
                                <div class="row">
                                    <div class="col-md-12">

                                        <strong class="header-box" style="font-size: 200%;">All about <?php echo $itineraryCountry; ?></strong>
                                        <div class="detail">
<?php
global $sqlitineraryOverview;
$result = $db->query($sqlitineraryOverview);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<p>' . $row["itineraryOverview"] . '</p>';
    }
}
?>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- itinerary tab content -->
                            <div role="tabpanel" class="tab-pane" id="tab02">
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
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ctetur, adipisci velit, sed quia non numquam eius modi.</p>
                                                    </div>
                                                </div>
                                            </li>

<?php
global $sqlGetItineraryDays;
$result = $db->query($sqlGetItineraryDays);
if ($result->num_rows > 0) {
    $counter = 0;
    $dayscounter = 0;
    while ($row = $result->fetch_assoc()) {

        if ($counter < $itineraryDays) {
            echo '<li><a href=""><strong class="title">Day ' . ($counter + 2) . '</strong><span>' . $row['itineraryName'] . '</span></a><div class="slide"><div class="slide-holder"><p>' . $row['itineraryDesc'] . '</p></div></div>';
            $counter += 1;
        } else {
            break;
        }
        $dayscounter += 1;
    }
    if ($dayscounter != $itineraryDays) {
        echo '<script>alert("Found ' . $dayscounter . ' out of ' . $itineraryDays . ' days. Optimized Itinerary Not Found. Please take the survey again.")</script>';
        header("location:survey.php");
    }
}
?>


                                            <li>
                                                <a href="#">
                                                    <strong class="title">Day <?php echo $days; ?></strong>
                                                    <span>Arrive in Singapore</span>
                                                </a>
                                                <div class="slide">
                                                    <div class="slide-holder">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ctetur, adipisci velit, sed quia non numquam eius modi.</p>
                                                    </div>
                                                </div>
                                            </li>
                                        </ol>
                                    </div>
                                    <!--								<div class="col-md-6">
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
                                                                                                    </div>-->
                                </div>
                            </div>
                            <!-- faq and review tab content -->
                            <div role="tabpanel" class="tab-pane" id="tab04">
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
                            <div role="tabpanel" class="tab-pane" id="tab03">
                                <ul class="row gallery-list has-center">
<?php
include_once('./simplehtmldom_1_9_1/simple_html_dom.php');
$result = $db->query($sqlGetItineraryDays);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $src = "";
        $word = "'" . $row['itineraryName'] . "'";
        $search_keyword = str_replace(' ', '+', $word);
        // echo '<script>alert("'.$search_keyword.'")</script>';
        $newhtml = file_get_html("https://www.google.com/search?q=" . $search_keyword . "&tbm=isch&hl=en&tbs=isz:l");
        try {
            $result_image_source = $newhtml->find('img', 1)->src ?? "no records";
        } catch (Exception $e) {
            
        }
        //echo "$result_image_source";
        if ($result_image_source != "no records") {
            $src = $result_image_source;
            echo ' <li>
                                        <a class="fancybox" data-fancybox-group="group" href="' . $src . '" target="_blank" title="Caption Goes Here">
                                            <span class="img-holder">
                                                <img src="' . $src . '" height="500" width="450" alt="image description">
                                            </span>
                                            <span class="caption">
                                                <span class="centered">
                                                    <strong class="title">' . $row['itineraryName'] . '</strong>
                                                    <span class="sub-text">' . $row['itineraryType'] . '</span>
                                                </span>
                                            </span>
                                        </a>
                                    </li>';
        } else {
            
        }
    }
}
?>


                                </ul>
                            </div>
                            <!-- dates and prices tab content -->
                            <!--						<div role="tabpanel" class="tab-pane" id="tab05">
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
                                                                                            <div class="load-more text-center text-uppercase">
                                                                                                    <a href="#">MORE DATES &amp; PRICES</a>
                                                                                            </div>
                                                                                    </div>
                                                                            </div>-->
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
        <script src="vendors/sticky-kit/sticky-kit.js"></script>
        <!-- mailchimp newsletter subscriber -->
        <script src="js/mailchimp.js"></script>
        <!-- custom script -->
        <script src="js/sticky-kit-init.js"></script>
        <script src="js/jquery.main.js"></script>
    </body>

</html>
