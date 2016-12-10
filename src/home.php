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
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">

    

</head>

<body>

<div class="pageWidth">
<!-- navigation bar-->
		<?php include('scripts/navbar.php') ?>

<!-- logo -->

		<img id ="banner" src="/src/images/go-portlethen.jpg" ;/>
	
<!-- Placeholder login form, REMOVE ASAP -->
<<<<<<< HEAD
<form>
=======
<form action="javascript:return login()">
>>>>>>> origin/master
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
	
	<script src=".src/JavaScript/general.js" type="text/javascript"></script>

	</head>
	<body>
	<div class="div1"><h2>Portlethen Images</h2>
		<p>Demos: <a href="demo1.html" class="current">1</a><a href="demo2.html">2</a><a href="demo3.html">3</a><a href="demo4.html">4</a>
			<a href="demo5.html">5</a><a href="demo6.html">6</a><a href="demo7.html">7</a><a href="demo8.html">8</a></p>
	</div>
	<div id="sliderFrame">
		<div id="slider">
			<a href="http://www.menucool.com/javascript-image-slider" target="_blank">
				<img src="/src/imageSlider/beachSunset1.jpg" alt="" />
			</a>
			<img src="/src/imageSlider/beachSunset1.jpg" />
			<img src="/src/imageSlider/beachSunset2.jpg" alt="" />

		</div>
		<div id="htmlcaption" style="display: none;">
			<em>HTML</em> caption. Link to <a href="http://www.google.com/">Google</a>.
		</div>
	</div>


		<!--text-->



	
</div>

</body>

</html>
