<?php
header("Content-Type: text/plain");

if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
     //Request identified as ajax request
 

include_once $_SERVER['DOCUMENT_ROOT'].'/CF1/functions/functions.php';
include $_SERVER['DOCUMENT_ROOT'].'/CF1/functions/sessions.php';


if($_SERVER["REQUEST_METHOD"] == "POST"){
    $currentSurveyCategory = $_SESSION['currentSurveyCategory'];

    if(isset($_SESSION['doneCategory'])){
        $doneCategory = $_SESSION['doneCategory'];
    }else {
        $doneCategory = array();
    }
    
    if(!in_array($currentSurveyCategory, $doneCategory)){
        $doneCategory[] = $currentSurveyCategory;
    }
    
    $_SESSION['doneCategory'] = $doneCategory;
    
    echo json_encode(($doneCategory));
    
    //get current category, mark current category as done 
    //return the marked category and set it to be enabled.
}

}else {
    echo "You may not access this file directly.";
}
   
?>