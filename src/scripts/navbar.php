<?php
echo('
	<div class="nav">
	<ul>
		<li>
			<div id="home_slide">
				<a href="http://go-portlethen.azurewebsites.net/">Home</a>
			</div>
		</li>
		<li>
			<div class="clubs_societies_slide">
				<a href="http://go-portlethen.azurewebsites.net/clubs_societies">Clubs & Societies</a>
			</div>
		</li>
		<li>
			<div class="health_wellbeing_slide">
				<a href="http://go-portlethen.azurewebsites.net/health_wellbeing">Health and Wellbeing</a>
			</div>
		</li>
		<li>
			<div class="map_slide">
				<a href="http://go-portlethen.azurewebsites.net/map">Map</a>
			</div>
		</li>
		<li>
			<div class="login_slide">
				<a href="#">Login</a>
			</div>
		</li>
	</ul>
		');
if (isset($_SESSION[username])) {
	echo('
		<a id="logout_button" onclick="logout();" href="http://go-portlethen.azurewebsites.net/logout">Log out</a>
		<script type="text/javascript">
			function logout() {
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
					if (xmlhttp.readyState == XMLHttpRequest.DONE) {
						document.reload();
					}
				}
				xmlhttp.open("POST", "logout");
				xmlhttp.send();
			}
		</script>
	');
}
else {
	echo('
			<script type="text/javascript">
				function login_popup() {
					document.getElementById("login_form").style.display = "block";
					document.getElementById("cancel_button").addEventListener("click", function() {
						document.getElementById("login_form").style.display = "none";
					});
				}
			</script>
			<a id="login_button" onclick="login_popup();" style="cursor: pointer; cursor: hand;">Log in</a>
			<form id="login_form" style="display: none" action="login" method="POST">
				<label><b>Username: </b></label>
				<input type="text" name="username" required>
				<label><b>Password: </b></label>
				<input type="password" name="password" required>
				<input type="hidden" id="location" name="location" value="">
				<button type="submit">Login</button>
				<script>document.getElementById("location").value = window.location.href</script>
				<button type="button" id="cancel_button">Cancel</button>
			</form>
		');
	if (isset($_GET["error"])) {
		if ($_GET["error"] === "incorrect_login") {
			echo("<script>window.alert(\"Your username or password was incorrect\")</script>");
		}
	}
}
echo('</div>');
?>