<?php
echo('
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<div id="navbar">
	<ul id="navbarlist">
		<li><a href="http://go-portlethen.azurewebsites.net/">Home</a></li>
		<li><a href="http://go-portlethen.azurewebsites.net/clubs_societies">Clubs & Societies</a></li>
		<li><a href="http://go-portlethen.azurewebsites.net/health_wellbeing">Health and Wellbeing</a></li>
		<li><a href="http://go-portlethen.azurewebsites.net/map">Map</a></li>
	</ul>
		');
if (isset($_SESSION[username])) {
	echo('
		<a id="logout_button" onclick="logout()" href="http://go-portlethen.azurewebsites.net/logout">Log out</a>
		<script type="text/javascript">
			function logout() {
				$.post("srcipts/logout.php", function() {
					location.reload();
				});
			}
		</script>
	');
}
else {
	echo('
			<a id="login_button" onClick="login_popup()" style="cursor: pointer; cursor: hand;">Log in</a>
			<form id="login_form" style="display: none" action="scripts/login.php">
				<label><b>Username: </b></label>
				<input type="text" name="username" required>
				<label><b>Password: </b></label>
				<input type="password" name="password" required>
				<button type="submit">Login</button>
				<button type="cancelbtn" id="cancel_button">Cancel</button>
			</form>
			<script type="text/javascript">
				function login_popup() {
					$.getElementById("login_form").style.display = "block";
					$.getElementById("cancel_button").addEventListener("click", function() {
						$.getElementById("login_form").style.display = "none";
					});
				}
			</script>
		');
}
echo('</div>');
?>