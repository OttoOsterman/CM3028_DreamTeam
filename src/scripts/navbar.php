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
			    <img src="https://upload.wikimedia.org/wikipedia/commons/5/52/Spacer.gif">
			</a>
		</li>
		<li>
			<div class="blue slide">
				<a href="https://go-portlethen.azurewebsites.net/health_wellbeing">Health & Wellbeing</a>
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
        if (isset($_SESSION["username"])) {
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
                    <a href="https://go-portlethen.azurewebsites.net/logout">Log out</a>
                </div>
                <a href="#">
			    <img src="">
			</a>
            </li>
            </ul>
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
				    <a href="#popup1">Log in</a>
			    </div>
			    <a href="#">
			    <img src="">
			</a>
		    </li>
	    </ul>
	    
	    
		');
            echo('
<div id="popup1" class="overlay">
	        <div class="popup">
	            <h2>Please Login</h2>
	            <a class="close" href="#">x</a>
	            <div class="content form-wrapper cf add">
	                <div class="input-wrapper">
	                    <form action="javascript:return login()">
	                        <input class="text-box" placeholder="email address" type="text" id="username" required>
	                        <input class="text-box" placeholder="password" type="password" id="password" required>
	                    </form>
	                </div>
	                <div class="action-buttons">
	                    <button class="greenButton button" type="submit" onclick="login()">Login</button>
	                    <button class="closebutton button" href="#">Close</button>
	                </div>
	                ');
	                if (isset($_SESSION{"error"}) && !(is_null($_SESSION["error"]))) {
		                if($_SESSION["error"] == "username_not_found") {
			                echo("<label>The username entered wasn't found, please try again </label > ");
		                } elseif ($_SESSION["error"] == "wrong_password") {
			                echo("<label>The password entered didn't match the username, please try again</label>");
		                }
	                }
                    echo('
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
	            </div>
	        </div>>
	  </div>          
    ');
}
echo('</div>');
?>