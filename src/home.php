<?php
session_start();
?>

<!DOCTYPE html>
<html >

<head>
	<meta charset="utf-8">
	<title>Home</title>
  
	<link rel="stylesheet" type="text/css" href="./src/css/home.css"/>
	<link rel="stylesheet" type="text/css" href="./src/css/navbar.css"/>
	<link rel="stylesheet" type="text/css" href="./src/css/general.css"/>
	<link rel="script" type="text/javascript" href="./src/JavaScript/general.js"/>

	
</head>

<body onLoad="plusSlides(1)">



<!-- navigation bar-->
		<?php include('scripts/navbar.php') ?>

<div class="pageWidth">
<!-- logo -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
		<img id ="banner" src="/src/images/go-portlethen.jpg" ;/>

    <!--Image Slider-->
<script>
	
	var slideIndex = 1;
	showSlides(slideIndex);

	function plusSlides(n) {
		showSlides(slideIndex += n);
	}

	function currentSlide(n) {
		showSlides(slideIndex = n);
	}

	function showSlides(n) {
		var i;
		var slides = document.getElementsByClassName("mySlides");
		var dots = document.getElementsByClassName("dot");
		if (n > slides.length) {slideIndex = 1}
		if (n < 1) {slideIndex = slides.length}
		for (i = 0; i < slides.length; i++) {
			slides[i].style.display = "none";
		}
		for (i = 0; i < dots.length; i++) {
			dots[i].className = dots[i].className.replace(" active", "");
		}
		slides[slideIndex-1].style.display = "block";
		dots[slideIndex-1].className += " active";
	}


/*   Do not un-comment if you suffer from epilepsy....

	var slideIndex = 0;
	showSlides();

	function showSlides() {
		var i;
		var slides = document.getElementsByClassName("mySlides");
		for (i = 0; i < slides.length; i++) {
			slides[i].style.display = "none";
		}
		slideIndex++;
		if (slideIndex> slides.length) {slideIndex = 1}
		slides[slideIndex-1].style.display = "block";
		setTimeout(showSlides, 7000); // Change image every 2 seconds
	}
	
*/

</script>
	

	<div class="slideshow-container">
		<div class="mySlides fade">
			<div class="numbertext">1 / 3</div>
			<img id="picture" src="/src/imageSlider/img1.jpg" style="width:100%">
			<div class="text">Go Portlethen</div>
		</div>


		<div class="mySlides fade">
			<div class="numbertext">2 / 3</div>
			<img id="picture" src="/src/imageSlider/img2.jpg" style="width:100%">
			<div class="text">Go Portlethen</div>
		</div>


		<div class="mySlides fade">
			<div class="numbertext">3 / 3</div>
			<img id="picture" src="/src/imageSlider/img3.jpg" style="width:100%">
			<div class="text">Go Portlethen</div>


		</div>

		<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
		<a class="next" onclick="plusSlides(1)">&#10095;</a>
		
	</div>

	<br>

<!--add buttons here to take you to slide X-->

	<div style="text-align:center">
		<span class="dot" onclick="currentSlide(1)"></span>
		<span class="dot" onclick="currentSlide(2)"></span>
		<span class="dot" onclick="currentSlide(3)"></span>
	</div>
	
	
	
	<div id="text-box">
		<h2 id="title"> Go Portlethen! </h2> 
		<p id="content">   here we will add the text for the page</p>
	</div>
	
		
		
	</div>

	
	

</body>

</html>
