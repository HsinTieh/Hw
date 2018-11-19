<!DOCTYPE html>
<html>
  <head>
    <title>Simple Map</title>
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
  </head>
  <body>
    <div id="map"></div>
	<div class="container" id="container"></div>
    <script>
      var map;
	  var geocoder;
	  var center_ = [{lat: 24.1235,lng: 120.673},{lat: -25.363, lng: 131.044},{lat: 24.1835,lng: 120.693},{lat: 24.2235,lng: 120.873}];
      //var title_ = ['A','B'];
	  //var address = ['台灣大學', '中興大學', '花蓮慈濟大學'];
	  function initMap() {
		geocoder=new google.maps.Geocoder();
		
	    map = new google.maps.Map(document.getElementById('map'), {
          //center: center_[0],
          zoom: 17
        });

		$.ajax({
			url:'getAddress.php',
			dataType:'json',
			success: getData
		
		})
	}

	function codeAddress(address) {
		//var address = document.getElementById('address').value;
		var html="";
		html += address;
		//var marker;
		geocoder.geocode( { 'address': address}, function(results, status) {
		if (status == 'OK') {
			var local='<a href="https://www.google.com.tw/search?q='+address+'\+google\+map"</a>'+address+'</h1>';
			map.setCenter(results[0].geometry.location);
			var	marker = new google.maps.Marker({
				map: map,
				position: results[0].geometry.location,
				title:address,
				animation: google.maps.Animation.DROP
			});
			var infowindow = new google.maps.InfoWindow(
			{
				content: local
			});
			marker.addListener('click', function(){

				infowindow.open(map,marker);
			});
			marker.addListener('dblclick', function(){

				window.open('HC.html?'+address,marker, config='height = 400, width = 600');
			});
		} else {
			alert('Geocode was not successful for the following reason: ' + status);
		}
		});
		
	}

	function getCollage()
	{
		$.ajax({
			url:'getAddress.php',
			dataType:'json',
			success: getData
		
		})
	}

	function getData(data)
	{

		var length = data.length;
		geocoder=new google.maps.Geocoder();
		var latlng = new google.maps.LatLng(24.1223416, 120.6743634);
		var mapOptions={
			cneter: latlng,
			zoom: 8
		};
		map =new google.maps.Map(document.getElementById('map'), mapOptions);

		/*標記地名*/
		for(var i=0;i<length;i++)
			codeAddress(data[i][3].toString());
	}
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBDCHo6RtVsNsnakfJsfu_KO2WwOI8sY7c&callback=initMap"
    async defer></script>
	 <!-- highchar
    <script src="../data/hw-data.js"></script> -->
  </body>
</html>