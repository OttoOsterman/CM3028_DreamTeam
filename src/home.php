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

<div class="pageWidth">

	<section id="myPopup" class="popup">
		<!-- Popup content -->
		<section class="popup-content">
			<span class="close">X</span>
			<!--Google login button-->
			<section id="customBtn" class="customGPlusSignIn" data-onsuccess="onSignIn" onclick="login1()">
				<span class="icon"></span>
				<span class="buttonText">Google</span>
			</section>
			<section id="name"></section>
			<script>startApp();</script>
			<script>
				//Login function
				function login1() {
					if ($('.login').text('Login')) {
						$('.login').text('Logout')
					}
				}
			</script>
			<!--Facebook login-->
			<section id="fb-root"></section>
			<script>(function (d, s, id) {
					var js, fjs = d.getElementsByTagName(s)[0];
					if (d.getElementById(id)) return;
					js = d.createElement(s);
					js.id = id;
					js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.6";
					fjs.parentNode.insertBefore(js, fjs);
				}(document, 'script', 'facebook-jssdk'));</script>
			<section class="fb-login-button" data-max-rows="1" data-size="xlarge" data-show-faces="false"
					 data-auto-logout-link="true"></section>
			<!--Logout button-->
			<a href="#" class="logout" onclick="logout1()">Logout</a>
			<script>
				//Signout function
				function signOut2() {
					FB.logout();
// user is now logged out of Facebook
					console.log('User signed out of Facebook');
				}

			</script>
			<!--Google sign out function-->
			<script>
				function signOut1() {
					var auth2 = gapi.auth2.getAuthInstance();
					auth2.signOut().then(function () {
// user is now logged out of Google+
						console.log('User signed out of Google+.');
					});
					$('#name').text('Signed out.')
				}
			</script>
			<script>
				//Logout function
				function logout1() {
					signOut1();
					signOut2();
					$('.login').text('Login')
				}
			</script>
		</section>
	</section>

<!-- navigation bar-->
		<?php include('scripts/navbar.php') ?>
<a id="loginBtn" class="login" href="#">Login</a>
<!-- logo -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
		<img id ="banner" src="/src/images/go-portlethen.jpg" ;/>
	
<!-- Placeholder login form, REMOVE ASAP -->
<form action="javascript:return login()">
	<label>E-mail address</label>
	<input type="text" id="username" required>
	<label>Password</label>
	<input type="password" id="password" required>
	<input type="submit" onclick="login()" value="Log in">
	<?php
	if (isset($_SESSION{"error"}) && !(is_null($_SESSION["error"]))) {
		if($_SESSION["error"] == "username_not_found") {
			echo("<label>The username entered wasn't found, please try again</label>");
		} elseif ($_SESSION["error"] == "wrong_password") {
			echo("<label>The password entered didn't match the username, please try again</label>");
		}
	}
	?>
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
		};
		req.open("POST", "https://go-portlethen.azurewebsites.net/login");
		req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		req.send(args);
	}
</script>
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


/*   Do not un-comment this if you suffer from epilepsy....

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
	
	
<!-- text -->
	
	<div id="text box">
		<h3 id="title">Go-Portlethen!</h3>
		<p id="content"> here we will add the content </p>
	</div>
	

</div>

</body>

</html>
