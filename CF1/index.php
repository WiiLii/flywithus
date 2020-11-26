<?php
include_once $_SERVER[ 'DOCUMENT_ROOT' ] .'/CF1/functions/functions.php';
include $_SERVER[ 'DOCUMENT_ROOT' ] .'/CF1/functions/sessions.php';
$connection = initialiseDB();
?>
<!DOCTYPE html>
<!--"Where every moment spent with you is a moment I treasure"-->
<html>
<head>
    <meta charset="UTF-8">
    <title>Demographics</title>
    <!--nV Addition-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link href="css/customstyle.css" rel="stylesheet" type="text/css">
    <!--Previous Addition-->
    <script src="javascripts/getsurveyvalues.js"></script>
</head>
<body>
<div id="contentBox">
<?php generateCategoryTabs(); ?>
<?php generateSurvey(0, "common"); ?>
<div class="container">
    <?php include 'Footer.php'; ?>
</div>
</div>
</body>
</html>
