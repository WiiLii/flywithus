<?php
include_once $_SERVER[ 'DOCUMENT_ROOT' ] . '/CF1/functions/functions.php';
include $_SERVER[ 'DOCUMENT_ROOT' ] . '/CF1/functions/sessions.php';
require_once  $_SERVER['DOCUMENT_ROOT'] . '/CF1/Classes/ResultClass.php';
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
        // this class collects the user's responses in the survey and uploads it into the database.

        include 'LogOutForm.php';

        $array = getFormulae();

        $EC = $array["EC"]->getFormulae();
        $FC = $array["FC"]->getFormulae();
        $TC = $array["TC"]->getFormulae();
        $TrC = $array["TrC"]->getFormulae();

        $EV = $array["EV"]->getFormulae();
        $FV = $array["FV"]->getFormulae();
        $TV = $array["TV"]->getFormulae();
        $TrV = $array["TrV"]->getFormulae();

        $eleV = eval('return ' . $EV . ';');
        $eleC = eval('return ' . $EC . ';');

        $tptV = eval('return ' . $TV . ';');
        $tptC = eval('return ' . $TC . ';');

        $fnLifeV = eval('return ' . $FV . ';');
        $fnLifeC = eval('return ' . $FC . ';');

        $traV = eval('return ' . $TrC . ';');
        $traC = eval('return ' . $TrV . ';');

        $TLC = $eleC + $fnLifeC + ($tptC * 12) + $traC;
        $TLE = round(($TLC / 2) * 10) / 10;
        $result = new ResultClass();
        $result->setEleC($eleC);
        $result->setEleV($eleV);
        $result->setfnLifeC($fnLifeC);
        $result->setfnLifeV($fnLifeV);
        $result->setTpcC(($tptC * 12));
        $result->setTptV($tptV);
        $result->setTraC($traC);
        $result->setTraV($traV);
        $result->setTotalC($TLC);
        $result->setTotalEarth($TLE);
        
        if (checkSurveyDone()) {
            //if the user has completed the survey this year
            redirect_to("SurveyResults.php");
        } else {
            //if the user has not completed the survey this year
            insertResult($result);
            redirect_to("SurveyResults.php");
        }

        ?>
    </body>
</html>
