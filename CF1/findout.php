<!DOCTYPE html>
<?php
include_once 'functions/functions.php';include 'functions/sessions.php'; ?>
<html>
<!--"I'm what's left; I'm what's right; I'm the enemy"-->
<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <title>Singapore Polytechnic Carbon Footprint Challenge</title>
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link href="css/findout.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php include 'Header.php'; ?>
<div class="container">
    <div class="row">
        <h2>What is the Carbon Footprint Challenge?</h2>
        <div class="col-sm-1"></div>
        <div class="col-sm-3"><img alt="Footprint" class="img-responsive" src="images/footprintfind.jpg"></div>
        <div class="col-sm-6">
            <p>The Carbon Footprint Challenge aims to create awareness on the impact of personal behaviour on global warming. Your participation will contribute to increasing awareness of how big is your carbon footprint and active steps you can take to reduce it. Your carbon footprint is the total amount of carbon dioxide (CO2) gas emitted through your daily activities, such as when you drive, switch on the computer, photocopy machine, TV or air-conditioner, charge your i-Pad, mobile, etc. CO2 is the most harmful of the greenhouse gases. So the first thing you should do is to recognise how you contribute directly or indirectly to this greenhouse gas problem, then set out how you can reduce carbon dioxide contributions by increasing your green practices!</p>
        </div>
        <div class="col-sm-2"></div>
    </div>
</div>
<div class="container">
    <div class="row">
        <h2>How do I get started?</h2>
        <div class="col-sm-3"></div>
        <div class="col-sm-5">
            <p>1) Simply login with your SPICE UserID and Password.<br>
                2) Answer questions about your daily usage.<br>
                3) Complete all questions and See how you can reduce your carbon footprint and at the same time save some money and the enviorment.</p>
        </div>
        <div class="col-sm-4"><img alt="Steps" class="img-responsive" src="images/steps.jpg"></div>
    </div>
</div>
<div class="container">
    <div class="row">
        <h2>Ready to act?</h2>
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <a class="btn btn-success btn-lg" href="index.php" id="homeBtn" role="button">Click Here to start now!</a>
        </div>
        <div class="col-sm-4"></div>
    </div>
    <?php include 'Footer.php'; ?>
</div>
</body>
</html>