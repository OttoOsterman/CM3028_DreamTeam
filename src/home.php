<?php
session_start();
?>

<!DOCTYPE html>

<head>
	<meta charset="utf-8">
	<title>Home</title>

	<link rel="stylesheet" href="https://unpkg.com/purecss@0.6.0/build/pure.css">
	<link rel="stylesheet" type="text/css" href="./src/css/home.css"/>
	<link rel="stylesheet" type="text/css" href="./src/css/navbar.css"/>
	<link rel="stylesheet" type="text/css" href="./src/css/general.css"/>

</head>

<body onload="plusSlides(1)">



<!-- navigation bar-->
		<?php include('scripts/navbar.php') ?>

<div class="pageWidth">
<!-- logo -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
		<img id ="banner" src="/src/images/go-portlethen.jpg" ;/>
	
	
	<!--Image Slider -->
	
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
	
            <!--add buttons here to take you to slide X -->
	
	<div style="text-align:center">
		<span class="dot" onclick="currentSlide(1)"></span>
		<span class="dot" onclick="currentSlide(2)"></span>
		<span class="dot" onclick="currentSlide(3)"></span>
	</div>



	
	<div id="text-box">

		<div class="information">
            
		<h1 id="title"> Portlethen & Sport </h1>
			  
		<p id="content"> Portlethen is aiming to improve the social hub for sporting and extra-curricular activities within the community. Go-portlethen aims to facilitate the role for people wishing to create, join, view or sponsor a club within the community. Clubs are able to share information such as upcoming events, photos, create routes on maps. The website also contains a route option where popular routes within North-Kincardineshire that have areas of historical significance can be selected and a route generated.</p>
		</div>

	</div>
	
			<h1 id="sign-up-text"> HOW TO SIGN UP </h1>

	<div id="sign-up-box">
		<div class="box">
			<h2 id="sign-up-text"> Step One </h2>
			<div class="box-content">
				<h1> Click Me In The Navigation Bar</h1>
				<a href="https://go-portlethen.azurewebsites.net/signup"><img src="/src/images/sign%20up.png"/></a>
				</div>
		</div>
		
		<div class="box">
			<h2 id="sign-up-text"> Step Two </h2>
			<div class="box-content">
				<h1> Enter Your Details</h1>
				<img src="/src/images/login.png"/>
			</div>
		</div>
		
		<div class="box">
			<h2 id="sign-up-text"> Step Three </h2>
			<div class="box-content">
				<h1> Welcome to Go-portlethen!</h1>
			</div>

		</div>
		
	</div>
	
	
	
	</div>



<!-- Begin Cookie Consent plugin by Silktide - http://silktide.com/cookieconsent -->
<script type="text/javascript">
	window.cookieconsent_options = {"message":"This website uses cookies to ensure you get the best experience on our website","dismiss":"Got it!","learnMore":"More info","link":null,"theme":"dark-bottom"};
</script>

<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/1.0.10/cookieconsent.min.js"></script>
<!-- End Cookie Consent plugin -->


</body>

</html>
