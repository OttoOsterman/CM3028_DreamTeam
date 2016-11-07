<?php
echo('
	<div id="navbar">
	<ul id="navbarlist">
		<li><a href="http://go-portlethen.azurewebsites.net/">Home</a></li>
		<li><a href="http://go-portlethen.azurewebsites.net/clubs">Clubs</a></li>
		<li><a href="http://go-portlethen.azurewebsites.net/health_wellbeing">Health and Wellbeing</a></li>
		<li><a href="http://go-portlethen.azurewebsites.net/map">Map</a></li>
		</ul>
	</div>
		');
if (isset($_SESSION[username])) {
	echo('<a id="logout_button" href="http://go-portlethen.azurewebsites.net/logout">Log out</a>');
}
else {
	echo('<a id="login_button" href="http://go-portlethen.azurewebsites.net/login">Log in</a>');
}
?>