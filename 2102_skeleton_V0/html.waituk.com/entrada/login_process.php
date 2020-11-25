<?php
include "config.php";

if (isset($_POST['regi_submit'])) {
$fname = $lname = $regi_email = $regi_email =$reg_pass=$reg_pass1= $errorMsg = "";
$success = true;
//check first name
 if (empty($_POST["fname"])) {
     $errorMsg .= "first name is required";
     $success = false;
 } else {
     $fname = $_POST["fname"];
 }
 //check last name
 if (empty($_POST["lname"])) {
     $errorMsg .= "last name is required";
     $success = false;
 } else {
     $lname = $_POST["lname"];
 }
 //check email
 if (empty($_POST["regi_email"])) {
     $errorMsg .= "first name is required";
     $success = false;
 } else {
   $regi_email = $_POST["regi_email"];
 }
 // Password
 if (empty($_POST["reg_pass"])) {
     $errorMsg .= "Password is required.";
     $success = false;
 }
 // check same password
 else if ($_POST["reg_pass"] != $_POST["reg_pass1"]) {
   $errorMsg .= "Password is mismatch.";
   $success = false;
 } else {
     $reg_pass = $_POST["reg_pass"];
 }

 // create register
  if ($success) {
    echo "success";
    $sql = "INSERT INTO useraccount (fname, lname, email, password) VALUES ('$fname', '$lname', '$regi_email', '$reg_pass')";
    echo $sql;
          if ($db->query($sql) === TRUE ) {

              echo "success here";
              session_start();
                $_SESSION['email'] = $regi_email;
                header('Location: index.php');
          }else{
            echo "success here";
            $errorMsg = "Database error: " . $db->error;

              //exit();
          }
  }
  else {
    pop_up_alert($errorMsg);
  }


}
function pop_up_alert($message)
{
    header("Refresh:0; url=login.php");
    echo "<script>alert('$message');</script>";
}
//Helper function that checks input for malicious or unwanted content.
function sanitize_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


 ?>
