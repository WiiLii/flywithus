<?php
header("Content-Type: text/plain");
if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
     //Request identified as ajax request
 

include_once $_SERVER['DOCUMENT_ROOT'].'/CF1/functions/functions.php';
include $_SERVER['DOCUMENT_ROOT'].'/CF1/functions/sessions.php';


if($_SERVER["REQUEST_METHOD"] == "POST"){
    
   $data = json_decode(stripslashes(filter_input(INPUT_POST, 'myArrayData')), TRUE);
   
   $totalCB = array();
   $totalDD = array();
   
   foreach ($data as $key => $value) {   
    
        if(preg_match("/^cb/",$key)){    
                $temp = substr($key, 2);
                $temp2 = explode("[",$temp);
                $temp3 = $temp2[0];
    
                if(array_key_exists($temp3,$totalCB)) {
                   $totalCB[$temp3] += $value;
                    
                } else {
                    $totalCB[$temp3] = 0;
                    $totalCB[$temp3] += $value;
                }
                
                $_SESSION[$temp3] = $totalCB[$temp3];
               
        }
        
        
        if(preg_match("/^dd/",$key)){    
                $temp4 = substr($key, 2);
                $temp5 = explode("[",$temp4);
                $temp6 = $temp5[0];
                
                if(array_key_exists($temp6,$totalDD)) {
                   $totalDD[$temp6] += $value;
                    
                } else {
                    $totalDD[$temp6] = 0;
                    $totalDD[$temp6] += $value;
                }
                
                $_SESSION[$temp6] = $totalCB[$temp6];

        }
        
        $_SESSION[$key] = $value;

   }
   
//    echo "$temp3 has value of $_SESSION[$temp3]";
//    echo "$temp6 has value of $_SESSION[$temp6]";
   
    if($_SESSION['Common01'] == 1){
         $_SESSION['driver'] = 'y';
    }else {
         $_SESSION['driver'] = 'n';
    }
//   var_dump($data);

}

}else {
    echo "You may not access this file directly.";
}
   
?>