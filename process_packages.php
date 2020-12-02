<?php
include "config.php";
$country ="";
$price="";
$mytable=array();
$country_arr=array();
$total_arr=array();
$over_arr=array();
$citys="";
$countDAys=1;
if (isset($_POST['action'])) {
if (($_POST['action'] === 'Search_itinerary')) {


  $country =$_POST['country'];
    $price= $_POST['price'];
  //  echo $country;
  //  echo $price;

if ($price == "one") {
  $selected = 'totalprice < 800 limit 1';
}
else if ($price == "two"){
    $selected = 'totalprice between 800 and 2400 Limit 1';
}
else if ($price == "three"){
    $selected = 'totalprice  > 2400 limit 1';
}



if ($country == "ALLC") {
  if ($price == "one") {
    $sql= "SELECT * FROM itinerary where totalprice < 800 limit 1";
  }
  else if ($price == "two") {
    $sql = "SELECT * FROM itinerary where totalprice between 800 and 2400 Limit 1";
  }
  else if ($price == "three") {
      $sql = "SELECT * FROM itinerary where totalprice  > 2400 limit 1";
  }
  else if ($price == "ALLP"){
      $sql = "SELECT * FROM itinerary GROUP by ItineraryCity";
  }else {
      $sql = "SELECT * FROM itinerary where itineraryCountry ='$country' and $selected";
  }
}
else {
//  $sql = "SELECT * FROM itinerary where itineraryName =$country and $selected";
if($price == "ALLP"){
  if ($country == "Japan") {
    $sql = "SELECT * FROM itinerary where itineraryCountry ='Japan'  GROUP by ItineraryCity";
  }
  else if ($country == "China") {
    $sql = "SELECT * FROM itinerary where itineraryCountry ='China' GROUP by ItineraryCity ";
  }
  else if ($country == "Korea") {
  $sql = "SELECT * FROM itinerary where itineraryCountry ='Korea'  GROUP by ItineraryCity";
  }
  else if ($country == "Thailand") {
  $sql = "SELECT * FROM itinerary where itineraryCountry ='Thailand'  GROUP by ItineraryCity";
  }
  else if ($country == "ALLC") {
    $sql = "SELECT * FROM itinerary GROUP by ItineraryCity";
  }
  else {
      $sql = "SELECT * FROM itinerary where itineraryCountry ='$country' and $selected";
  }
}
else {
  $sql = "SELECT * FROM itinerary where itineraryCountry ='$country' and $selected";
}
}

//$mytable = $sql;
$result = $db->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
  // $country_arr[] = $row['itineraryCountry'];
  //   $total_arr[] = $row['totalprice'];
  // $over_arr[] = $row['itineraryOverview'];
  // $mytable[]=$row['totalPrice'];
  $citys = $row['itineraryCity'];
  $mytable[]='<article class="article">
    <div class="thumbnail">
        <div class="img-wrap">
          <img src="'.$row['itineraryImage'].'" height="240" width="350" alt="image description">
        </div>
        <div class="description">
          <div class="col-left">
            <header class="heading">
              <h3><a>'.$row['itineraryCountry'].'</a></h3>
              <div class="info-day">7+ Days</div>
            </header>
            <p>'.$row['itineraryOverview'].'</p>
            <div class="reviews-holder">
              <div class="star-rating">
                <span><span class="icon-star"></span></span>
                <span><span class="icon-star"></span></span>
                <span><span class="icon-star"></span></span>
                <span><span class="icon-star"></span></span>
                <span class="disable"><span class="icon-star"></span></span>
              </div>
              <div class="info-rate">Based on 75 Reviews</div>
            </div>
          </div>
          <aside class="info-aside">
            <span class="price">from <span>'.$row['totalPrice'].'</span></span>
            <div class="activity-level">
              <div class="ico">
                <span class=""></span>
              </div>
              <span class="text">'.$row['itineraryCity'].'</span>
            </div>
            <form class="" action="packages-detail.php" method="post">
              <button href="packages-details.php" type="submit" name="city" class="btn btn-default"value="'.$row['itineraryCity'].'" >explore</button>
            </form>

          </aside>
        </div>
      </div>
    </article>';

  }
} else {
  $mytable ="no result found";
}
$json_array = array(
//
// 'country' => $country_arr,
// 'price' => $total_arr,
// 'overview' => $over_arr,
'table' => $mytable);
echo json_encode($json_array);

$db->close();
}
if (($_POST['action'] === 'Details_itinerary')) {

$cityName=$_POST['cityName'];
  $sql = "SELECT * FROM itinerary where itineraryCity = '$cityName'";
$result = $db->query($sql);
//$mytable = $sql;
if ($result->num_rows > 0) {
  // output data of each row
    while($row = $result->fetch_assoc()) {
      //  $mytable[]=$row['itineraryCity'];
         $mytable[]='<li>
          <a href="#">
            <strong class="title">Day '.$countDAys.'</strong>
            <span>'.$row['itineraryName'].'</span>
          </a>
          <div class="slide">
            <div class="slide-holder">
              <p>'.$row['itineraryDesc'].'</p>
            </div>
          </div></li>';
        $countDAys++;
    }
}
$json_array = array(
'table' => $mytable);
echo json_encode($json_array);

  }

}// end of action
//   $sql = "SELECT * FROM itinerary";
// $result = $db->query($sql);
// //$mytable = $sql;
// if ($result->num_rows > 0) {
//   // output data of each row
//     while($row = $result->fetch_assoc()) {
//         echo $row['itineraryDesc'],"------------------------<br>";
//     }
// }


 ?>
