<?php
//$db = mysqli_connect("localhost", "root", "","changiusers");
$db = mysqli_connect("localhost", "root", "","2102_travel");
//$db = mysqli_connect("122.11.149.141", "iot_vogomo", "Admin@123","iot_vogomo");
//$db = new mysqli("iot.vogomo.com", "iot_vogomo", "Admin@123");

if($db === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 ?>
