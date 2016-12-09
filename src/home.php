<!DOCTYPE html>
<html >

<head>
	<meta charset="utf-8">
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="./src/css/home.css"/>
	<link rel="stylesheet" type="text/css" href="./src/css/navbar.css"/>
	<link rel="stylesheet" type="text/css" href="./src/css/general.css"/>
	<link rel="script" type="text/javascript" href="./src/javaScript/general.js"/>

</head>

<body>

<!-- navigation bar-->
		<?php include('scripts/navbar.php') ?>


<!-- logo -->
<div class="banner">
	<img src="/src/images/go-portlethen.jpg" style="width:100%";/>
</div>

<div id="container">
	<img src="/src/imageSlider/img1.jpg" id="img"/>
	<div id="left_arrow"> <img onClick="slide(-1)" id="left" src="/src/imageSlider/arrow_left.png"/></div>
	<div id="right_arrow"> <img onClick="slide(1)" id="right" src="/src/imageSlider/arrow_right.png"/></div>
</div>



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
if (isset($_SESSION["error"])) {
	echo('Not working');
}
?>
</body>

</html>
