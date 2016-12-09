<?php
echo('
	<div class="nav" id="navbar">
	<ul>
		<li>
			<div class="about green slide">
				<a href="https://go-portlethen.azurewebsites.net/">Home</a>
			</div>
			<a href="#">
				<img src="">
			</a>
		</li>
		<li>
			<div class="yellow slide">
				<a href="https://go-portlethen.azurewebsites.net/clubs_societies">Clubs & Societies</a>
			</div>
			<a href="#">
				<img src="">
			</a>
		</li>
		<li>
			<div class="blue slide">
				<a href="https://go-portlethen.azurewebsites.net/health_wellbeing">Health and Wellbeing</a>
			</div>
			<a href="#">
				<img src="">
			</a>
		</li>
		<li>
			<div class="pink slide">
				<a href="https://go-portlethen.azurewebsites.net/map">Map</a>
			</div>
			<a href="#">
				<img src="">
			</a>
		</li>');
        if (isset($_SESSION[username])) {
            echo('
		    <a id="logout_button" onclick="logout();" href="#">Log out</a>
		    <script type="text/javascript">
			function logout() {
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
					if (xmlhttp.readyState == XMLHttpRequest.DONE) {
						document.reload();
					}
				}
				xmlhttp.open("POST", "https://go-portlethen.azurewebsites.net/logout");
				xmlhttp.send();
			}
		    </script>
	        ');
        } else {
            echo('
            <li>
		        <div class="black slide">
		            <a href="https://go-portlethen.azurewebsites.net/signup">Sign Up</a>
                </div>
                <a href="#">
                    <img src="">
                </a>
            </li>
		    <li>
			    <div class="purple slide">
				    <a href="#">Login</a>
			    </div>
			    <a href="#">
				    <img src="">
			    </a>
		    </li>
	    </ul>
		');
}
echo('</div>');
?>