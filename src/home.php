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
	

<!-- navigation bar-->
		<?php include('scripts/navbar.php') ?>
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


/*   Do not un-comment if you suffer from epilepsy....

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


	<script>
	//Function declaration
	$('a[href^="#"]').on('click', function (e) {
	e.preventDefault();
	var target = this.hash;
	var $target = $(target);
	$('html, body').stop().animate({
	'scrollTop': $target.offset().top
	}, 900, 'swing');
	});
	<!--Blur background when login button is clicked-->
	function Blur() {
	$('#Title, .results, #LeftBar, #PageFooter, #MainHeader').css({
	'filter': 'blur(2px)',
	'-webkit-filter': 'blur(2px)',
	'-moz-filter': 'blur(2px)',
	'-o-filter': 'blur(2px)',
	'-ms-filter': 'blur(2px)',
	transition: 'all 0.3s ease-in-out'
	})
	}


	<!--unblur background when popup is closed-->
	function unBlur() {
	$(' #Title, .results, #LeftBar, #PageFooter,#MainHeader').css({
	'z-index': 900,
	'filter': 'none',
	'-webkit-filter': 'none',
	'-moz-filter': 'none',
	'-o-filter': 'none',
	'-ms-filter': 'none',
	transition: 'all 0.3s ease-in-out'
	});
	}


	<!-- Popup Script -->
	// Get the popup
	var popup = document.getElementById('myPopup');
	// Get the button that opens the popup
	var a = document.getElementById("loginBtn");
	// Get the <span> element that closes the popup
            var span = document.getElementsByClassName("close")[0];
            // When the user clicks on the button, open the popup
            a.onclick = function () {
                popup.style.display = "block";
                Blur();
            };
            // When the user clicks on <span> (x), close the popup
            span.onclick = function () {
                popup.style.display = "none";
                unBlur();
            };
            // When the user clicks anywhere outside of the popup, close it
            window.onclick = function (event) {
                if (event.target == popup) {
                    popup.style.display = "none";
                    unBlur();
                }
            };
			<!-- End of popup script -->
        });


			<!-- Facebook Script -->
        //First Part
        // This is called with the results from from FB.getLoginStatus().
        function statusChangeCallback(response) {
            console.log('statusChangeCallback');
            console.log(response);
            // The response object is returned with a status field that lets the
            // app know the current login status of the person.
            // Full docs on the response object can be found in the documentation
            // for FB.getLoginStatus().
            if (response.status === 'connected') {
                // Logged into your app and Facebook.
                testAPI();
            } else if (response.status === 'not_authorized') {
                // The person is logged into Facebook, but not your app.
                document.getElementById('status').innerHTML = 'Please log ' +
                        'into this app.';
            } else {
                // The person is not logged into Facebook, so we're not sure if
                // they are logged into this app or not.
                document.getElementById('status').innerHTML = 'Please log ' +
                        'into Facebook.';
            }
        }
        // This function is called when someone finishes with the Login
        // Button.  See the onlogin handler attached to it in the sample
        // code below.
        function checkLoginState() {
            FB.getLoginStatus(function (response) {
                statusChangeCallback(response);
            });
        }
        window.fbAsyncInit = function () {
            FB.init({
                appId: '985300261517338',
                cookie: true,  // enable cookies to allow the server to access
                               // the session
                xfbml: true,  // parse social plugins on this page
                version: 'v2.6' // use graph api version 2.6
            });
            FB.getLoginStatus(function (response) {
                statusChangeCallback(response);
            });
        };
        // Load the SDK asynchronously
        (function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
        // Here we run a very simple test of the Graph API after login is
        // successful.  See statusChangeCallback() for when this call is made.
        function testAPI() {
            console.log('Welcome!  Fetching your information.... ');
            FB.api('/me', function (response) {
                console.log('Successful login for: ' + response.name);
                document.getElementById('status').innerHTML =
                        'Thanks for logging in, ' + response.name + '!';
            });
        }
        FB.logout(function (response) {
            FB.Auth.setAuthResponse(null, 'unknown');
        });
			<!-- End of Facebook Script -->
			</script>








			</div>

</body>

</html>
