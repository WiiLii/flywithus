<?php
include_once $_SERVER[ 'DOCUMENT_ROOT' ] .'/CF1/functions/functions.php';
include $_SERVER[ 'DOCUMENT_ROOT' ] .'/CF1/functions/sessions.php';
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <!-- Database details -->
        <?php
        $connection = initialiseDB();

        $userid = filter_input(INPUT_POST, "username");
        $password = filter_input(INPUT_POST, "password");

        List($uid, $name, $dept) = login($userid, $password);

        if ($uid === 0) {
            echo "<script type=\"text/javascript\"> alert(\" Wrong ID/Password entered!\")" . "</script>";

        } else {
            echo $_SESSION['spiceID'] = ($uid);
            echo $_SESSION['name'] = $name;
            echo $_SESSION['deptName'] = $dept;
          
            if (checkSurveyDone()) {
                //If not done
                redirect_to("SurveyResults.php");

            } else {
                //If done
                redirect_to("CommonSurvey.php");
            }
        }


//        loginSPICE();
        ?>
    </body>
</html>


<?php
mysqli_close($connection);
?>
