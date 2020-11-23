<?php

header("Content-Type: text/plain");
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
    //Request identified as ajax request


    include_once $_SERVER['DOCUMENT_ROOT'] . '/CF1/functions/functions.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/CF1/functions/sessions.php';



    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $connection = initialiseDB();
        $data = generateAllSurveyCategory();

        $qnsArray = array();
        $totalQnsCount = 0;
        $tempCat = new CategoryClass();
        $commonIndex = 0;
        $count = 0;
        foreach ($data as $val) {
            $tempCat = $val;
            if (($tempCat->getCategoryName() === "Common") || ($tempCat->getCategoryName() === "common")) {
                $temp = $val->getQuestionCount();
                $qnsArray[] = $temp[0];
                $totalQnsCount += $temp[0];
                $commonIndex = $count;
            } else {
                $temp = $val->getQuestionCount();
                $qnsArray[] = $temp[0];
                $totalQnsCount += $temp[0];
                $count++;
            }
        }

        $out = array_splice($qnsArray, $commonIndex, 1);
        array_splice($qnsArray, 0, 0, $out);

        $pageIndex = ($_SESSION['pageIndexCount']); //current page
        $currentQnsCount = 0;
        for ($index = 0; $index < $pageIndex; $index++) {
            $currentQnsCount += $qnsArray[$index];
        }

        $calculatedPercent = $currentQnsCount / $totalQnsCount * 100;
        $number = number_format($calculatedPercent, 2) + 0;

        if (isset($_SESSION['biggerNum'])) {
            $biggerNum = $_SESSION['biggerNum'];
            if ($number > $biggerNum) {
                $biggerNum = $number;
                $_SESSION['biggerNum'] = $biggerNum;
            }
        } else {
            $_SESSION['biggerNum'] = $number;
            $biggerNum = $number;
        }

        echo json_encode(($biggerNum));
    }
} else {
    echo "You may not access this file directly.";
}
?>