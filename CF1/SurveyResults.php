<?php
include_once $_SERVER[ 'DOCUMENT_ROOT' ] . '/CF1/functions/functions.php';
include $_SERVER[ 'DOCUMENT_ROOT' ] . '/CF1/functions/sessions.php';
$connection = initialiseDB();
?>
<!DOCTYPE html>
<!--I would like to thank Spotify for offering Premium at 99 cents for three months.-->
<html>
<head>
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <title>Results</title>
    <!-- nV Additons -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link href="css/font-awesome.css" rel="stylesheet" type="text/css">
    <link href="css/results.css" rel="stylesheet" type="text/css">
    <!-- Previous Additions -->
    <script src="javascripts/jquery-2.1.1.min.js" type="text/javascript"></script>
    <script src="javascripts/animateEarth.js" type="text/javascript"></script>
    <?php
    $name = "User";
    $result = getResult();
    $lastyear = date("Y",strtotime("-1 year"));
    $result2015 = getPreviousResult();
    //        Electricity   : kWh/month
    $eleV = number_format($result->getEleV(), 2);
    //        Electricity   : tonnes of CO per year
    $eleC = number_format($result->getEleC(), 2);

    //        Gas       : m3/month
    $fnLifeV = $result->getfnLifeV();
    //        Gas       : tonnes of CO per year
    $fnLifeC = number_format($result->getfnLifeC(), 2);

    //Transport : km/week
    $tptV = $result->getTptV();
    //        Transport : tonnes of CO per year
    $tptC = number_format($result->getTpcC(), 2);

    //        Travel    : km/week
    $traV = $result->getTraV();
    //        Travel    : tonnes of CO per year
    $traC = number_format($result->getTraC(), 2);
    //        Total carbon : tonnes of CO per year
    $totalC = $result->getTotalC();

    $earth = $result->getTotalEarth();

    $totalC2015 = $result2015->getTotalC2015();
    ?>
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button class="navbar-toggle" data-target="#nav" data-toggle="collapse" type="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="#" class="navbar-brand">
                <img src="images/brand.png">
            </a>
        </div>
    </div><!-- /.container-fluid -->
</nav>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h2>
                <?php echo date("Y"); ?> Carbon Footprint Result
            </h2>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div id="results-panel" class="panel panel-green">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="panel-heading">
                            <h2>You would need</h2>
                            <h2><i class="fa fa-globe fa-3x"></i> <span class="highlight-black"><?php echo $earth ; ?> Earths</span></h2>
                            <?php
                            if ($earth > 1){
                                echo '
                                     <h3>to live your lifestyle,<br>
                                     but we only have ONE.<br>
                                     </h3>
                                     ';
                                    }
                            else {
                                echo
                                '<h3>Great job! If everybody followed your lifestyle,
                                life on earth would be easily sustainable!
                                </h3>
                                ';
                                    }
                            ?>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <h2>
                            <i class="fa fa-quote-left" aria-hidden="true"></i> Your Carbon Footprint is<br> <span class="highlight"><?php echo number_format((float)$totalC, 3, '.', ''); ?> tonnes of CO2/year</span>
                        </h2>
                        <h3 class="align">That is as massive as...</h3>
                        <?php calculateTonnes(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <h2>Here&#8217;s the breakdown:</h2>
        </div>
            <div class="col-lg-3 col-xs-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-bolt fa-5x"></i>
                                <p>Electricity</p>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?php echo $eleC ?></div>
                                <div>tonnes</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-xs-12">
                <div class="panel panel-green">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-car fa-5x"></i>
                                <p>Transportation</p>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?php echo $tptC ?></div>
                                <div>tonnes</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-xs-12">
                <div class="panel panel-yellow">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-plane fa-5x"></i>
                                <p>Travelling</p>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?php echo $traC ?></div>
                                <div>tonnes</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-xs-12">
                <div class="panel panel-red">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-cutlery fa-5x"></i>
                                <p>Lifestyle</p>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?php echo $fnLifeC ?></div>
                                <div>tonnes</div>
                            </div>
                        </div>
                    </div>
                </div>
        </div><!--Breakdown-->
    </div>
    <?php
    $change = $totalC2015-$totalC;
    if ( $totalC2015>0 ){
        echo '<div class="row">
              <div class="col-sm-12">
              <div class="panel panel-green">
              <div class="row">
              <div class="col-sm-6">
              <div class="panel-heading">
              <h2><i class="fa fa-comment fa-3x" aria-hidden="true"></i> In <span class="highlight-black">'.$lastyear.',</span>
              your carbon footprint was <span class="highlight-black">'.number_format((float)$totalC2015, 2, '.', '').' tonnes.</span></h2>
              </div>
              </div>';
            if ($totalC > $totalC2015){
                //If there is no improvement
                $change*=-1;
                echo '
                     <div class="col-sm-6">
                     <h2>
                     <i class="fa fa-exclamation-circle fa-2x" aria-hidden="true"></i><br>
                     That is an <span class="highlight">increase</span> of <br><span class="highlight">'.number_format((float)$change, 2, '.', '').' tonnes!</span>
                     </h2>
                     </div>
                     ';
            }
            else{
                //If there is an improvement
                echo '
                     <div class="col-sm-6">
                     <h2>
                     <span class="highlight">
                     <i class="fa fa-heart" aria-hidden="true"></i></span> Yay! <br>
                     You have <span class="highlight">improved</span> by <br><span class="highlight">'.number_format((float)$change, 2, '.', '').' tonnes!</span>
                     </h2>
                     </div>
                     ';
            }
        echo '
              </div>
              </div>
              </div>
              </div>
             ';
        //end div row
    }//end if
    ?>

    <div class="row">
        <div class="col-sm-12">
            <h2>Next, watch a short video and join the lucky draw!</h2>
        </div>
        <div class="col-sm-4"></div>
        <div class="col-xs-12 col-sm-4">
            <a id="luckydrawButton" class="btn btn-lg" href="Reflection.php" role="button">
                <i class="fa fa-youtube-play fa-1x" aria-hidden="true"></i> Watch<br>
                <span class="subtext">a video and join the lucky draw!</span></a>
        </div>
        <div class="col-sm-4"></div>
    </div>
</div>
<div class="container">
    <?php include 'Footer.php'; ?>
</div>
</body>
</html>
