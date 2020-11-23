<?php
include_once '/functions/functions.php';
include '/functions/sessions.php';
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
        $spiceID = filter_input(INPUT_POST, "spiceID");
        $qnsCount = filter_input(INPUT_POST, "qnsCount");

        $refAware = filter_input(INPUT_POST, "Aware1");
        $refFeed = filter_input(INPUT_POST, "Aware2");
//        $selQuery = "SELECT userID, spiceID FROM usertbl WHERE spiceID = '$spiceID'";// and refAware is NULL";
        $selQuery = " SELECT usertbl.userID, usertbl.spiceID ";
        $selQuery.= " FROM usertbl ";
        $selQuery.= " JOIN resultstbl ON usertbl.userID = resultstbl.userID  ";
        $selQuery.= " WHERE year(submissionTime) = year(CURDATE()) and spiceID = '$spiceID'";



        $result = mysqli_query($connection, $selQuery);

       /* if (mysqli_num_rows($result) == 0) {
            $thankAlert = 'alert("You have already submitted previously!");';
        } else {
*/
            $row = mysqli_fetch_array($result);

            $query = " UPDATE resultstbl SET refAware = ?, refFeed = ? WHERE userID = ? ";
            //$query = "INSERT into resultstbl (refAware, refFeed) VALUES (?,?) WHERE userID = ?";

            $stmt = mysqli_prepare($connection, $query);
            mysqli_stmt_bind_param($stmt, "ssi", $refAware, $refFeed, $row[0]) or die(mysqli_error($connection));

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
