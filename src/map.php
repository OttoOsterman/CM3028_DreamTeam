<!DOCTYPE html>
<head>
	<title>Maps</title>
	<link rel="stylesheet" type="text/css" href="./src/css/navbar.css"/>
	<link rel="stylesheet" type="text/css" href="./src/css/general.css"/>
	<link rel="stylesheet" type="text/css" href="./src/css/map.css"/>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKI13n7BTCWoJj841jA6OielBD8bRbg6M" type="text/JavaScript"></script>
	
	<script type="text/JavaScript">
	function load() {
   		var map = new google.maps.Map(document.getElementById("map"), {
 	      	center: new google.maps.LatLng(47.6145, -122.3418),
    	   	zoom: 13,
        	mapTypeId: 'roadmap'
      	});
	}
	</script>
</head>

<body onload="load()">
<?php include('scripts/navbar.php'); ?>

<div id="map" style="width: 650px; height: 400px"></div>
</body>
</html>