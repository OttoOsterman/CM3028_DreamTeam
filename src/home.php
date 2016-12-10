<?php
session_start();
?>

<!DOCTYPE html>
<html >

<head>
	<meta charset="utf-8">
	<title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="./src/css/home.css"/>
	<link rel="stylesheet" type="text/css" href="./src/css/navbar.css"/>
	<link rel="stylesheet" type="text/css" href="./src/css/general.css"/>
	<link rel="script" type="text/javascript" href="./src/JavaScript/general.js"/>
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">

    

</head>

<body>

<div class="pageWidth">
<!-- navigation bar-->
		<?php include('scripts/navbar.php') ?>

<!-- logo -->

		<img id ="banner" src="/src/images/go-portlethen.jpg" ;/>



<!-- Placeholder login form, REMOVE ASAP -->
<form>
	<label>E-mail address</label>
	<input type="text" id="username">
	<label>Password</label>
	<input type="password" id="password">
	<input type="button" onclick="login()" value="Log in">
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

    <div class="w3-content w3-display-container">
        <img class="mySlides" src=".\src\imageSlider\img1.jpg" style="width:100%">
        <img class="mySlides" src=".\src\imageSlider\beachSunset3.jpg" style="width:100%">


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


		<!--text-->









	
</div>

</body>

</html>
