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
            <li>
                <div class="purple slide">
                    <a href="https://go-portlethen.azurewebsites.net/profile">Profile</a>
                </div>
                <a href="#">
                    <img src="">
                </a>
            </li>
            <li>
                <div class="black slide">
                    <a href="#" onclick="logout()">Log out</a>
                </div>
                <a href="#">
                    <img src="">
                </a>
            </li>
            </ul>
		    <script type="text/javascript">
			function logout() {
				var req = new XMLHttpRequest();
				req.onreadystatechange = function() {
					if (req.readyState == XMLHttpRequest.DONE) {
						document.reload();
					}
				}
				req.open("GET", "https://go-portlethen.azurewebsites.net/logout");
				req.send();
			}
		    </script>
	        ');
        } else {
            echo('
            <li>
		        <div class="purple slide">
		            <a href="https://go-portlethen.azurewebsites.net/signup">Sign up</a>
                </div>
                <a href="#">
                    <img src="">
                </a>
            </li>
		    <li>
			    <div class="black slide">
				    <a href="#">Log in</a>
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