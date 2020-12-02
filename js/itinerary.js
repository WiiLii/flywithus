function searching(){
  country = document.getElementById("country").value;
  price = document.getElementById("price").value;

   var count = 0;
  $.ajax({ // ajax from php validation
  url: 'process_packages.php',
  type: 'POST',
  dataType: 'JSON',
  data: {action:'Search_itinerary',country:country,price:price},
  success: function(data) {
//alert(data.table[3]);
for (var i = 0; i < data.table.length; i++) {
  document.getElementById("packagesTable").innerHTML =data.table;

}

//  console.log(data.table);
//
  // $('#packagesTable').html(packageHTML);
  },
  error: function(request,status,error) {
    console.log(request);
    alert(status);
  },
  async: false
});
}
function clickHotel(){ // this to search the hotel base on the filter
  hotelCountry = document.getElementById("hotelCountry").value;
  hotelPrice = document.getElementById("hotelPrice").value;
  //alert(hotelCountry+hotelPrice);
  $.ajax({ // ajax from php validation
  url: 'process_hotels.php',
  type: 'POST',
  dataType: 'JSON',
  data: {action:'Search_hotel', hotelCountry:hotelCountry,hotelPrice:hotelPrice},
  success: function(data) {
//alert(data.table);
for (var i = 0; i < data.table.length; i++) {
  document.getElementById("hotelsTable").innerHTML = data.table;
}
//  console.log(data.table);

  },
  error: function(request,status,error) {
    console.log(request);
    alert(status);
  },
  async: false
});

}

// get package detials ajax
function getPackagesDetails(id){
  var cityName=id;
    location.href="packages-detail.php";
var dayTotal = document.getElementById("dayTotal");
//dayTotal.innerHTML="asdasd";
  $.ajax({ // ajax from php validation
  url: 'process_packages.php',
  type: 'POST',
  dataType: 'JSON',
  data: {action:'Details_itinerary', cityName:cityName},
  success: function(data) {
//conslog.(data.table);
for (var i = 0; i < data.table.length; i++) {
  console.log(data.table[i]);
dayTotal=data.table[i];

//  document.getElementById("daysTables").innerHTML += data.table;

}
//  console.log(data.table);

  },
  error: function(request,status,error) {
    console.log(request);
    alert(status);
  },
  async: false
});
}
