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
