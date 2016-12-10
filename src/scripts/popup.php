<?php

	                if (isset($_SESSION{"error"}) && !(is_null($_SESSION["error"]))) {
		                if($_SESSION["error"] == "username_not_found") {
			                echo("<label>The username entered wasn\'t found, please try again</label>");
		                } elseif ($_SESSION["error"] == "wrong_password") {
			                echo("<label>The password entered didn\'t match the username, please try again</label>");
		                }
	                }

echo('
                    </form>
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
            </div>
	    
        </div>
');
    ?>