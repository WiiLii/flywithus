<?php
include_once $_SERVER[ 'DOCUMENT_ROOT' ] .'/CF1/functions/functions.php';
//include $_SERVER[ 'DOCUMENT_ROOT' ] .'/CF1/functions/sessions.php';
$connection = initialiseDB();
?>
<!DOCTYPE html>
<!--Pretend you read something insightful here-->
<html>
<head>
    <meta charset="UTF-8">
    <title>flywithus</title>
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link href="css/reflection.css" rel="stylesheet" type="text/css">
    <script src="javascripts/getsurveyvalues.js"></script>
</head>
<body>
<?php include 'header.php'; ?>
<div class="container">
    <div class="row">
    <?php
    generateSurveyForm();
    ?>
<?php include 'footer.php'; ?>
    </div>
</body>
</html>
