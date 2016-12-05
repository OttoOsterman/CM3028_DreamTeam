<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="./src/css/home.css"/>
	<link rel="stylesheet" type="text/css" href="./src/css/navbar.css"/>
	<link rel="stylesheet" type="text/css" href="./src/css/general.css"/>
	
</head>

<body>
		<?php include('scripts/navbar.php') ?>
		
			
</body>

<!--image header-->
<img src="/src/images/go-portlethen.jpg"/>


<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">

<div class="images">

	<img class="mySlides" src="src/images/downies.jpg" style="width:100%">
	<!--
	<img class="mySlides" src=".../src/image" style="width:100%">
	<img class="mySlides" src="img_mountains.jpg" style="width:100%">
	<img class="mySlides" src="img_forest.jpg" style="width:100%">
-->
	<a class="w3-btn-floating w3-display-left" onclick="plusDivs(-1)">&#10094;</a>
	<a class="w3-btn-floating w3-display-right" onclick="plusDivs(1)">&#10095;</a>
</div>

<script>
	var slideIndex = 1;
	showDivs(slideIndex);

	function plusDivs(n) {
		showDivs(slideIndex += n);
	}

	function showDivs(n) {
		var i;
		var x = document.getElementsByClassName("mySlides");
		if (n > x.length) {slideIndex = 1}
		if (n < 1) {slideIndex = x.length}
		for (i = 0; i < x.length; i++) {
			x[i].style.display = "none";
		}
		x[slideIndex-1].style.display = "block";
	}
</script>

</body>
</html>




</html>
