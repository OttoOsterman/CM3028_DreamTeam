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
		            <a href="#popup2">Sign up</a>
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
	            <section class="content form-wrapper">
	                <form action="javascript:return login()">
	                    <input class="text-box" placeholder="email address" type="text" id="username" required>
	                    <input class="text-box" placeholder="password" type="password" id="password" required>
	                </form>
	            <section class="action-buttons">
	                <button class="greenButton button" type="submit" onclick="login()">Login</button>
	                <a href="#"><button class="closebutton button">Close</button></a>
	            </section>
	            
	                ');
            if (isset($_SESSION{"error"}) && !(is_null($_SESSION["error"]))) {
                if ($_SESSION["error"] == "username_not_found") {
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
	            </section>
	        </div>
	  </div>          
    ');
            //Signup Pop-up
            echo('
                <div id="popup2" class="overlay">
	                <div class="popup">
	        ');
            if (isset($_SESSION["username"])) {
                echo("
                    <h1>Please log out before attempting to create a new account.</h1>
                ");
            } else {
                echo('
                    <h2>Create Account</h2>
	                <section class="content form-wrapper">
	                    <form id=\'signup_form\' action=\'signup\' method=\'POST\'>
	                        <input class="text-box" placeholder="Please enter an e-mail address" type="text" id="username" required>
	                        <input class="text-box" placeholder="Please enter a password" type="password" id="password" required>
	                    </form>
	                    <section class="action-buttons">
	                        <button class="greenButton button" type="submit">Create</button>
	                        <a href="#"><button class="closebutton button">Close</button></a>
	                    </section>
	            ');
                if($_SERVER['REQUEST_METHOD'] === 'POST') {
                    //TODO: REMOVE TESTING CODE
                    include("scripts/db_connect_test.php");
                    $username = $_POST["username"];
                    $username = stripslashes($username);
                    $username = mysqli_real_escape_string($db, $username);

                    $sql = "SELECT username FROM User WHERE username = '{$username}'";
                    $result = $db->query($sql);
                    if ($result->num_rows > 0) {
                        echo("<h2>Sorry, this e-mail is already in use.</h2>");
                    } else {
                        $password = $_POST["password"];
                        $salt = date('U');
                        $password_hash = hash('sha256', $password . $salt);
                        $sql = "INSERT INTO User (username, hash, salt, acc_type) VALUES ('{$username}', '{$password_hash}', '{$salt}', 'general_user')";
                        $db->query($sql);
                        echo("
				    <script>
					    document.getElementById('signup_form').style.display = 'none';
				    </script>
				    <h2>Your account has been successfully created, please log in.</h2>
				");
                    }
                }

                echo('
	            </section>
	        </div>
	  </div>          
    ');
            }
        }
echo('</div>');
?>