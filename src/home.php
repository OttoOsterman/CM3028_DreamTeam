<!DOCTYPE html>
<html >

<script>
	var imageCount = 1;
	var total = 2;

	function slide(x) {
		var Image = document.getElementById('img');
		Image.src = "/src/imageSlider/img" + imageCount + ".jpg";
		imageCount++;
		if (imageCount > total) {
			imageCount = 1;
		}
		if (imageCount < 1){
			imageCount = total;
	}

	}
</script>

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
	<div id="left_arrow"> <img onClick+"slide(-1)"class="left" src="/src/imageSlider/arrow_left.png"/></div>
	<div id="right_arrow"> <img onClick+"slide(1)" class="right" src="/src/imageSlider/arrow_right.png"/></div>
	
</div>



<!-- Placeholder login form, REMOVE ASAP -->
<form>
	<label>E-mail address</label>
	<input type="text" id="username">
	<label>Password</label>
	<input type="password" id="password">
	<input type="button" onclick="login()">
</form>

<script>
	function login() {
		var username = document.getElementById("username");
		var password = document.getElementById("password");
		var args = "username=" + username + "&password=" + password;
		var req = new XMLHttpRequest();
		req.onreadystatechange = function() {
			if (req.readyState == XMLHttpRequest.DONE) {
				document.reload();
			}
		}
		req.open("POST", "https://go-portlethen.azurewebsites.net/login");
		req.send(args);
	}
</script>
</body>

</html>
