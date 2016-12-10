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

<body>

<div class="pageWidth">
<!-- navigation bar-->
		<?php include('scripts/navbar.php') ?>

<!-- logo -->

		<img id ="banner" src="/src/images/go-portlethen.jpg" ;/>
	
<!-- Placeholder login form, REMOVE ASAP -->
<form action="javascript:return login()">
	<label>E-mail address</label>
	<input type="text" id="username">
	<label>Password</label>
	<input type="password" id="password">
	<input type="submit" onclick="login()" value="Log in">
</form>

<script>
	function login() {
		var username = document.getElementById("username").value;
		var password = document.getElementById("password").value;
		var args = "username=" + username + "&password=" + password;
		var req = new XMLHttpRequest();
		req.onreadystatechange = function() {
			if (req.readyState == XMLHttpRequest.DONE) {
				location.reload();
			}
		}
		req.open("POST", "https://go-portlethen.azurewebsites.net/login");
		req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		req.send(args);
	}
</script>

<?php
echo("Session error value is: " . $_SESSION["error"]);
?>

    <!--Image Slider-->

	<div class="slideshow-container">
		<div class="mySlides fade">
			<div class="numbertext">1 / 3</div>
			<img src="/src/imageSlider/img1.jpg" style="width:100%">
			<div class="text">life's</div>
		</div>

		<div class="mySlides fade">
			<div class="numbertext">2 / 3</div>
			<img src="/src/imageSlider/img2.jpg" style="width:100%">
			<div class="text">a</div>
		</div>

		<div class="mySlides fade">
			<div class="numbertext">3 / 3</div>
			<img src="/src/imageSlider/img3.jpg" style="width:100%">
			<div class="text">beach</div>
		</div>

		<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
		<a class="next" onclick="plusSlides(1)">&#10095;</a>
	</div>
	<br>

	<div style="text-align:center">
		<span class="dot" onclick="currentSlide(1)"></span>
		<span class="dot" onclick="currentSlide(2)"></span>
		<span class="dot" onclick="currentSlide(3)"></span>
	</div>
	
	

	
	
	

</div>

</body>

</html>
