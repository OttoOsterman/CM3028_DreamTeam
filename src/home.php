<!DOCTYPE html>
<html onload="slideAuto()">
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

<img id="myPhoto" src="/src/images/downies.jpg" alt="homepage"/>

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
