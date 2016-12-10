<?php
echo('
	<div class="nav" id="navbar">
	<ul>
		<li>
			<div class="about green slide">
				<a href="https://go-portlethen.azurewebsites.net/">Home</a>
			</div>
		</li>
		<li>
			<div class="yellow slide">
				<a href="https://go-portlethen.azurewebsites.net/clubs_societies">Clubs &<br> Societies</a>
			</div>
		</li>
		<li>
			<div class="blue slide">
				<a href="https://go-portlethen.azurewebsites.net/health_wellbeing">Health &<br> Wellbeing</a>
			</div>
		</li>
		<li>
			<div class="pink slide">
				<a href="https://go-portlethen.azurewebsites.net/map">Map</a>
			</div>
		</li>');
        if (isset($_SESSION["username"])) {
            echo('
            <li>
                <div class="purple slide">
                    <a href="https://go-portlethen.azurewebsites.net/profile">Profile</a>
                </div>
            </li>
            <li>
                <div class="black slide">
                    <a href="https://go-portlethen.azurewebsites.net/logout">Log out</a>
                </div>
            </li>
            </ul>
	        ');
        } else {
            echo('
            <li>
		        <div class="purple slide">
		            <a href="https://go-portlethen.azurewebsites.net/signup">Sign up</a>
                </div>
            </li>
		    <li>
			    <div class="black slide">
				    <a href="#">Log in</a>
			    </div>
		    </li>
	    </ul>
		');
}
echo('</div>');
?>