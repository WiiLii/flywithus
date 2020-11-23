<?php
include_once '/functions/functions.php';
include '/functions/sessions.php';
$connection = initialiseDB();
?>
<!DOCTYPE html>
<!--Pretend you read something insightful here-->
<html>
<head>
    <meta charset="UTF-8">
    <title>Carbon Footprint - Reflections</title>
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link href="css/reflection.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php include 'Header.php'; ?>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h3>Watch the video and answer the question correctly to enter to win a prize!</h3>
        </div>
    </div>
    <div class="embed-responsive embed-responsive-4by3">
        <iframe class="embed-responsive-item"  src="https://www.youtube.com/embed/gXYqCNFQLkc"></iframe>
    </div>

    <?php
    generateFeedbackForm($_SESSION['spiceID']);
    ?>
<?php include 'Footer.php'; ?>
    </div>
</body>
</html>
