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

		<div class="information">
            
		<h1 id="title"> Portlethen & Sport </h1>
			  
		<p id="content"> Portlethen is aiming to improve the social hub for all sports and extra caricular activities being undertaking within the community through the creation </p>
		</div>
        
	</div>

	<center>
		<div class="sign-up">
			<h1 id="sign-up-text"> HOW TO SIGN UP </h1>
		</div>
	</center>

	
	
	<div id="How to join">
		
        <div class="step1">

			<h1 id="step-one-title"> Step One </h1>
		<!--
        <img id="step1" src="/src/images/Step1.jpg";/>
		-->

		<h1 id="">  </h1>
			
    	</div>
		
	</div>

    

</div>

</body>

</html>
