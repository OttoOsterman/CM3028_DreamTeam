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
                <div class="black slide">
                    <a href="https://go-portlethen.azurewebsites.net/profile">Profile</a>
                </div>
                <a href="#">
                    <img src="">
                </a>
            </li>
            <li>
                <div class="purple slide">
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
					if (xmlhttp.readyState == XMLHttpRequest.DONE) {
						document.reload();
					}
				}
				req.open("POST", "https://go-portlethen.azurewebsites.net/logout");
				req.send();
			}
		    </script>
	        ');
        } else {
            echo('
            <li>
		        <div class="black slide">
		            <a href="https://go-portlethen.azurewebsites.net/signup">Sign up</a>
                </div>
                <a href="#">
                    <img src="">
                </a>
            </li>
		    <li>
			    <div class="purple slide">
				    <a href="#" onclick="login_popup()">Log in</a>
			    </div>
			    <a href="#">
				    <img src="">
			    </a>
		    </li>
	    </ul>
	    
	    <script type="text/javascript">
	    window.onclick = function(event) {
	        if(event.target == document.getElementById("login_container")) {
	            document.getElementById("login_container").style.display = "none";
	        }
	    }
	    function login_popup() {
	        document.getElementById("login_container").style.display = "block";
	    }
	    
	    function close_popup() {
	        document.getElementById("login_container").style.display = "none";
	    }
        </script>
        
        <!-- Modal login popup -->
        <link rel="stylesheet" type="text/css" href="https://go-portlethen.azurewebsites.net/src/css/login_popup.css"/>
        <div id="login_container">
        <div id="login_popup">
            <span id="close" onclick="close_popup()">&times;</span>
            <form action="https://go-portlethen.azurewebsites.net/login" method="POST">
                <label>Please enter your e-mail address</label>
                <input type="text" name="username">
                <label>Please enter your password</label>
                <input type="password" name="password">
                <input type="submit" value="Log in">
            </form>
        </div>
        </div>
		');
}
echo('</div>');
?>