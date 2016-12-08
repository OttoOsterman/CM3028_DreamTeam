<!DOCTYPE html>
<head>
	<title>Maps</title>
	<link rel="stylesheet" type="text/css" href="./src/css/navbar.css"/>
	<link rel="stylesheet" type="text/css" href="./src/css/general.css"/>
	<link rel="stylesheet" type="text/css" href="./src/css/map.css"/>
	<script src="jquery-3.1.1.min.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKI13n7BTCWoJj841jA6OielBD8bRbg6M" type="text/JavaScript"></script>
	
	<script type="text/JavaScript">
		function downloadUrl(url,callback) {
			var request = window.ActiveXObject ?
				new ActiveXObject('Microsoft.XMLHTTP') :
				new XMLHttpRequest;

			request.onreadystatechange = function() {
				if (request.readyState == 4) {
					callback(request, request.status);
				}
			};

			request.open('GET', url, true);
			request.send(null);
		}

		function load() {
   			var map = new google.maps.Map(document.getElementById("map"), {
 	      		center: new google.maps.LatLng(57.061961, -2.129379),
    	   		zoom: 13,
				//Could change to satellite
        		mapTypeId: 'roadmap'
      		});
			downloadUrl("https://go-portlethen.azurewebsites.net/location_data", function (data) {
				var xml = data.responseXML;
				var markers = xml.documentElement.getElementsByTagName("marker");
				for (var i = 0; i < markers.length; i++) {
					var point = new google.maps.LatLng(
						parseFloat(markers[i].getAttribute("lat")),
						parseFloat(markers[i].getAttribute("lng"))
					)
					var marker = new google.maps.Marker({
						map: map,
						position: point
					});
				}
			});
		}
	</script>
</head>

<body onload="load()">
<?php include('scripts/navbar.php'); ?>

<div class="banner">
	<img src="/src/images/go-portlethen.jpg"/>

</div>
<noscript>
	<h1>Please enable javascript to access the maps feature of this website.</h1>
</noscript>
<div id="map" style="width: 650px; height: 400px"></div>
</body>
</html>