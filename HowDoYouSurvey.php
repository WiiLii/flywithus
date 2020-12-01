<?php
include_once 'functions.php';
$connection = initialiseDB();
?>
<!DOCTYPE html>
<!--"Maybe we'll find a brand new ending"-->
<html>
<head>
    <meta charset="UTF-8">
    <title> Carbon Footprint Survey </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    <link href="css/customstyle.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="javascripts/jquery-2.1.1.min.js"></script>
    <script src="javascripts/getsurveyvalues.js"></script>
</head>
<body>
<div id="contentBox">
<div class="Easter Egg: 2096.php"></div>
    <?php generateCategoryTabs(); ?>
    <?php generateSurvey(); ?>
    <div class="container">
        <?php include 'footer.php'; ?>
    </div>
</div>
</body>
</html>
