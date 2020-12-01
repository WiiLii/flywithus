<?php
include_once $_SERVER[ 'DOCUMENT_ROOT' ] .'/CF1/functions/functions.php';
include $_SERVER[ 'DOCUMENT_ROOT' ] .'/CF1/functions/sessions.php';
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
        // $spiceID = filter_input(INPUT_POST, "spiceID");
        // $qnsCount = filter_input(INPUT_POST, "qnsCount");
        //
        // $refAware = filter_input(INPUT_POST, "Aware1");
        // $refFeed = filter_input(INPUT_POST, "Aware2");
        // $selQuery = " SELECT usertbl.userID, usertbl.spiceID ";
        // $selQuery.= " FROM usertbl ";
        // $selQuery.= " JOIN resultstbl ON usertbl.userID = resultstbl.userID  ";
        // $selQuery.= " WHERE year(submissionTime) = year(CURDATE()) and spiceID = '$spiceID'";

        $userID = "2";
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
        $submissionTime = date( "Y-m-d H:i:s" );

       /* if (mysqli_num_rows($result) == 0) {
            $thankAlert = 'alert("You have already submitted previously!");';
        } else {
*/

            //$query = " UPDATE resultstbl SET refAware = ?, refFeed = ? WHERE userID = ? ";
            $query = "INSERT into results (userID, submissionTime, age, relationship, travelGroup, groupDesc, season, activity, days, budget, accomodation) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
            $stmt = mysqli_prepare($connection, $query);
            mysqli_stmt_bind_param($stmt, "issssssssss", $userID, $submissionTime, $age, $relationship,$travelGroup,$groupDesc,$season,$activity,$days,$budget,$accomodation) or die(mysqli_error($connection));

            if (!mysqli_stmt_execute($stmt)) {
                echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            } else {
                echo "Success!";
            }
            mysqli_free_result($result);
            mysqli_stmt_close($stmt);

            $thankAlert = 'alert("Thank you for participating in our feedback!");';
  //      }

        $_SESSION['thankAlert'] = $thankAlert;
        header("Location: index.php");
        ?>

    </body>
</html>
