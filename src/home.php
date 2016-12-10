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

<!-- navigation bar-->
		<?php include('scripts/navbar.php') ?>


<!-- logo -->
<div class="pageWidth">
	<center>
		<img id ="banner" src="/src/images/go-portlethen.jpg" ;/>
	</center>
	
	<!--image slider-->
	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style>
		.carousel-inner > .item > img,
		.carousel-inner > .item > a > img {
			width: 70%;
			margin: auto;
		}
	</style>
	</head>
	<body>

	<div class="container">
		<br>
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
			<!-- Indicators -->
			<ol class="carousel-indicators">
				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				<li data-target="#myCarousel" data-slide-to="1"></li>
				<li data-target="#myCarousel" data-slide-to="2"></li>
				<li data-target="#myCarousel" data-slide-to="3"></li>
			</ol>

			<!-- Wrapper for slides -->
			<div class="carousel-inner" role="listbox">
				<div class="item active">
					<img src="imageSlider/img1.jpg" alt="insert alt" width="460" height="345">
				</div>

				<div class="item">
					<img src="imageSlider/img2.jpg" alt="insert alt" width="460" height="345">
				</div>

				<div class="item">
					<img src="imageSlider/img3.jpg" alt="insert alt" width="460" height="345">
				</div>

				<div class="item">
					<img src="imageSlider/img1.jpg" alt="insert alt" width="460" height="345">
				</div>
			</div>

			<!-- Left and right controls -->
			<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
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
echo("Session error value is: " . $_SESSION["error"]);
?>
</div>

</body>

</html>
