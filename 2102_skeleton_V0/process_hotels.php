<?php
include "config.php";
$mytable=array();
$country_arr=array('Country','Korea','Japan','China','Thailand');
if (isset($_POST['action'])) {
  if (($_POST['action'] === 'Search_hotel')) {
$country =$_POST['hotelCountry'];
  $price= $_POST['hotelPrice'];

  if ($price == "1") {
    $selected = 'price < 499 ';
  }
  else if ($price == "2"){
      $selected = 'price between 500 and 999';
  }
for ($i=0; $i <count($country_arr); $i++) {
  if ($country == $country_arr[0] and $price =="Range") {
    $sql= "SELECT * FROM hotels GROUP by country" ;
  }
  else{
    if ($country == $country_arr[$i] and $price =="Range") {
     $sql= "SELECT * FROM hotels where country = '$country'";
   }
   else if ($country == $country_arr[$i] and $price =="1"){
       $sql= "SELECT * FROM hotels where country ='$country' and $selected GROUP by country";
   }
   else if ($country == $country_arr[$i] and $price =="2"){
       $sql= "SELECT * FROM hotels where country ='$country' and $selected GROUP by country";
   }
  }

}


//$mytable =$sql;
  $result = $db->query($sql);

  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    //   $mytable[]=$row['hotelName'];
       $mytable[]='<article class="col-sm-6 col-md-4 col-lg-3 article has-hover-s1">
        <div class="thumbnail">
          <div class="img-wrap">
            <img src="img/hotels/'.$row['image'].'.jpg" height="228" width="350" alt="image description">
          </div>
          <h3 class="small-space">'.$row['hotelName'].'</h3>

          <aside class="meta">
            <span class="country">
              <span class="icon-world"> </span>'.$row['pCity'].'
            </span>
            <span class="activity">
              <span class="icon-acitivities"> </span>3 Rooms
            </span>
          </aside>
          <a href="my-info.php" class="btn btn-default" value="'.$row["hotelName"].'"> Details</a>
          <footer>
            <span class="price">Only at <span>$'.$row['price'].'</span></span>
          </footer>
        </div>
      </article>';
    }
  }
  $json_array = array(

  'table' => $mytable);
  echo json_encode($json_array);

  //$db->close();
  }
}
// $sql= "SELECT * FROM hotels";
// $result = $db->query($sql);
//
// if ($result->num_rows > 0) {
//   // output data of each row
//     while($row = $result->fetch_assoc()) {
//         echo $row['hotelID'];
//     }
// }
 ?>
