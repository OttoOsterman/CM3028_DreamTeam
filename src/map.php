<?php
session_start();
?>

<!DOCTYPE html>
<head>
	<title>Maps</title>
	<link rel="stylesheet" type="text/css" href="../src/css/navbar.css"/>
	<link rel="stylesheet" type="text/css" href="../src/css/general.css"/>
	<link rel="stylesheet" type="text/css" href="../src/css/map.css"/>
	<script src="jquery-3.1.1.min.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKI13n7BTCWoJj841jA6OielBD8bRbg6M" type="text/JavaScript"></script>
	
	<script type="text/JavaScript">
		var infoWindow = new google.maps.InfoWindow;

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

		function bindInfoWindow(marker, map, infoWindow, html) {
			google.maps.event.addListener(marker, 'click', function() {
				infoWindow.setContent(html);
				infoWindow.open(map, marker);
			});
		}

		function load() {
   			var map = new google.maps.Map(document.getElementById("map"), {
 	      		center: new google.maps.LatLng(57.061961, -2.129379),
    	   		zoom: 10,
        		mapTypeId: 'satellite'
      		});
			downloadUrl("https://go-portlethen.azurewebsites.net/locations", function (data) {
				var xml = data.responseXML;
				var markers = xml.documentElement.getElementsByTagName("marker");
				for (var i = 0; i < markers.length; i++) {
					var point = new google.maps.LatLng(
						parseFloat(markers[i].getAttribute("lat")),
						parseFloat(markers[i].getAttribute("lng"))
					);
					var name = markers[i].getAttribute("name");
					var html = "<h1>" + name + "</h1>";
					html += "<br><div>" + markers[i].getAttribute("description") + "</div>";
					var media = markers[i].childNodes;
					for (var iterator = 0; iterator < media.length; iterator++) {
						html += "<br><img src='";
						html += media[iterator].getAttribute("path");
						html += "'></img>"
					}
					var marker = new google.maps.Marker({
						map: map,
						position: point
					});
					bindInfoWindow(marker, map, infoWindow, html);
				}
			});
		}
	</script>
</head>

<body onload="load()">
<?php include('scripts/navbar.php'); ?>

<div class="banner">
	<img src="../src/images/go-portlethen.jpg"/>

</div>
<noscript>
	<h1>Please enable javascript to access the maps feature of this website.</h1>
</noscript>
<h1 id="mapHeader">Discover North Kincardineshire</h1>
<div id="map" style="width: 1600px; height: 800px"></div>

<!-- Begin Cookie Consent plugin by Silktide - http://silktide.com/cookieconsent -->
<script type="text/javascript">
	window.cookieconsent_options = {"message":"This website uses cookies to ensure you get the best experience on our website","dismiss":"Got it!","learnMore":"More info","link":null,"theme":"dark-bottom"};
</script>

<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/1.0.10/cookieconsent.min.js"></script>
<!-- End Cookie Consent plugin -->

</body>
</html>