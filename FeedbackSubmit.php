<?php
// base on ur file location
include_once  'functions.php';
//include "config.php";
$connection = initialiseDB();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        session_start();
        $email = $_SESSION['email'];
        $sql = "SELECT userID from useraccount where email='$email'";
              $result= mysqli_query($connection,$sql);
              $getid = mysqli_fetch_assoc($result);
              echo $getid['userID'];

        $userID = $getid['userID'];
        $qnsCount = filter_input(INPUT_POST, "qnsCount");
        $age = filter_input(INPUT_POST, "Question1");
        $relationship = filter_input(INPUT_POST, "Question2");
        $travelGroup = filter_input(INPUT_POST, "Question3");
        $groupDesc = filter_input(INPUT_POST, "Question4");
        $season = filter_input(INPUT_POST, "Question5");
        $activity = filter_input(INPUT_POST, "Question6");
        $days = filter_input(INPUT_POST, "Question7");
        $budget = filter_input(INPUT_POST, "Question8");
        $accomodation = filter_input(INPUT_POST, "Question9");
        date_default_timezone_set('Asia/Singapore');
        $submissionTime = date( "Y-m-d H:i:s" );

            //$query = " UPDATE resultstbl SET refAware = ?, refFeed = ? WHERE userID = ? ";
            $query = "INSERT into results (userID, submissionTime, age, relationship, travelGroup, groupDesc, season, activity, days, budget, accomodation) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
            $stmt = mysqli_prepare($connection, $query);
            mysqli_stmt_bind_param($stmt, "sssssssssss", $userID, $submissionTime, $age, $relationship,$travelGroup,$groupDesc,$season,$activity,$days,$budget,$accomodation) or die(mysqli_error($connection));

            if (!mysqli_stmt_execute($stmt)) {
                echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            } else {
                echo "Success!";
            }
            mysqli_free_result($result);
            mysqli_stmt_close($stmt);

            $thankAlert = 'alert("Submitted!");';
  //      }

        $_SESSION['thankAlert'] = $thankAlert;
        header("Location: itineraryDetails.php");
        ?>

    </body>
</html>
