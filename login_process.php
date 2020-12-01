<?php
include "config.php";
$fname = $lname = $regi_email = $regi_email =$reg_pass=$reg_pass1= $errorMsg = "";
$email = $password = "";
$success = true;
if (isset($_POST['regi_submit'])) {

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
     $errorMsg .= "email is required";
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
            echo "fail here";
            $errorMsg = "Database error: " . $db->error;

              //exit();
          }
  }
  else {
    pop_up_alert($errorMsg);
  }


}

// login
if (isset($_POST['login_submit'])) {
  $tmp_email =$_POST['email'];
    $tmp_password =$_POST['password'];
  $checksql= "SELECT * FROM useraccount WHERE email = '$tmp_email' and password = '$tmp_password'";
//echo $checksql;
$result = $db->query($checksql);

  if ($result->num_rows > 0) {
    // output data of each row
    while(!$row = $result->fetch_assoc()) {
  //  echo $row['email'];
  //echo "correct";
    }
  } else {
    $errorMsg = "password/email incorrect";
    $success = false;
  //  echo "wrong<br>";
  }
  if (empty($_POST["email"])) {
      $errorMsg .= "email is required";
      $success = false;
  }
else {
      $email = $_POST["email"];
  }
  //check last name
  if (empty($_POST["password"])) {
      $errorMsg .= "password is required";
      $success = false;
  } else {
      $password = $_POST["password"];
  }
  if ($success) {
  echo $email ."  ". $password."<br>";
  session_start();
  pop_up_alert("success login");
    $_SESSION['email'] = $email;
    header('Location: index.php');
  }
  else {
    pop_up_alert($errorMsg);
  }

}
// get result 1 or 0 // to check
function query($query)
{
    if (!$db->connection->query($query)) {
      //  printf("Error: %s\n",  $this->connection->sqlstate);
        $result = 0;
    }
    else {
        $result = $db->connection->query($query);
    }

    return $result;
}
// if any error pop up msg
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
