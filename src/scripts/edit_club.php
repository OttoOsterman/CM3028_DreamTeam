<?php
session_start();
?>
<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <title>Edit Club</title>
    <link rel="stylesheet" type="text/css" href="../src/css/edit_club.css"/>
    <link rel="stylesheet" type="text/css" href="../src/css/navbar.css"/>
    <link rel="stylesheet" type="text/css" href="../src/css/general.css"/>
</head>
<body>

<?php include ("navbar.php"); ?>
<!--TODO: REMOVE TESTING CODE-->

<!--Header for the page-->
    <h2 id="editClubHeader">Edit Club</h2>
<!--Container for content-->
<div id="editContainer">

<?php
// Connect to database
include ("db_connect_test.php");
$sql = "SELECT * FROM Club WHERE club_id = {$_POST["club_id"]}";
$res = $db->query($sql);
if ($res->num_rows > 0) {
    $_SESSION["curr_club"] = $_POST["club_id"];
    $row = $res->fetch_array();
    $name = htmlspecialchars($row["name"], ENT_QUOTES | ENT_HTML5);
    $genre = htmlspecialchars($row["genre"], ENT_QUOTES | ENT_HTML5);
    $description = htmlspecialchars($row["description"], ENT_QUOTES | ENT_HTML5);
    $contact_info = htmlspecialchars($row["contact_info"], ENT_QUOTES | ENT_HTML5);

    $sql = "SELECT * FROM User LEFT JOIN ClubMember ON User.user_id = ClubMember.user_id WHERE club_id = {$_POST["club_id"]}";
    $res = $db->query($sql);

    echo ("
    <form action='javascript:return update_club()'>
    <label class='editLabel'>Club name:</label>
    <input type='text' id='name' value='{$name}'>
    <label class='editLabel'>Club genre:</label>
    <input type='text' id='genre' value='{$genre}'>
    <label class='editLabel'>Club description:</label>
    <input type='text' id='description' value='{$description}'>
    <label class='editLabel'>Contact info:</label>
    <input type='text' id='contact_info' value='{$contact_info}'>
    <div id='buttonContainer'>
    <input type='submit' value='submit' class='greenButton2' onclick='update_club()'>
    </div>
    </form>
    </div>
    <script>
    function update_club() {
        var name = encodeURIComponent(document.getElementById('name').value);
        var genre = encodeURIComponent(document.getElementById('genre').value);
        var description = encodeURIComponent(document.getElementById('description').value);
        var contact_info = encodeURIComponent(document.getElementById('contact_info').value);
        if (name != '' && genre != '' && description !='' && contact_info != '') {
            var args = 'name=' + name + '&genre=' + genre + '&description=' + description + '&contact_info=' + contact_info;
            var req = new XMLHttpRequest();
            req.onreadystatechange = function() {
                if (req.readyState == XMLHttpRequest.DONE) {
                 window.location = 'https://go-portlethen.azurewebsites.net/profile';
                }
            };
            req.open('POST', 'https://go-portlethen.azurewebsites.net/updateclub');
            req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            req.send(args);
        }
    }
    </script>
    ");

    while ($row = $res->fetch_array()) {
        echo("
            <form action='javascript:return remove_user({$row['user_id']})' id='{$row['user_id']}'>
            <label>{$row['username']}</label>
            <input type='submit' value='remove' class='greenButton2' onclick='remove_user({$row['user_id']})'>
            </form>
        ");
    }

    echo("
        <script>
        function remove_user(user_id) {
            var retval = 'user_id=' + user_id;
            var req = new XMLHttpRequest();
            req.onreadystatechange = function() {
                if(req.readyState == XMLHttpRequest.DONE) {
                    var remove_form = document.getElementById('' + user_id);
                    remove_form.parentNode.removeChild(remove_form);
                    return false;
                }
            };
            req.open('POST', 'https://go-portlethen.azurewebsites.net/removeclubuser');
            req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            req.send(retval);
        }
        </script>
    ");

    $sql = "SELECT User.username, User.user_id, ClubMember.club_id FROM User LEFT JOIN ClubMember on User.user_id = ClubMember.user_id";
    $res = $db->query($sql);
    echo("<select id='add_user_select'>");
    while ($row = $res->fetch_array()) {
        if ($row['club_id'] != $_POST['club_id']) {
            echo("
            <option>{$row['username']}</option>
            ");
        }
    }
    echo("
    </select>
    <form action='javascript:return add_to_group()'>
        <input type='submit' class='greenButton2' value='Add to group' onclick='add_to_group()'>
    </form>
    
    <script>
    function add_to_group() {
        var username = document.getElementById('add_user_select').options[document.getElementById('add_user_select').selectedIndex].text;
        
        var retval = 'username=' + username + '&club_id=' + {$_POST['club_id']};
            var req = new XMLHttpRequest();
            req.onreadystatechange = function() {
                if(req.readyState == XMLHttpRequest.DONE) {
                    var form = document.createElement('form');
                    form.method = 'POST';
                    form.action = 'https://go-portlether.azurewebsites.net/edit_club';
                    
                    var username_input = document.createElement('input');
                    username_input.type = 'hidden';
                    username_input.name = 'username';
                    username_input.value = username;
                    form.appendChild(username_input);
                    
                    var club_id_input = document.createElement('input');
                    username_input.type = 'hidden';
                    username_input.name = 'club_id';
                    username_input.value = {$_POST['club_id']};
                    form.appendChild(club_id_input);
                    
                    form.submit();
                    return false;
                }
            };
            req.open('POST', 'https://go-portlethen.azurewebsites.net/add_club_user');
            req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            req.send(retval);
    }
    </script>
    ");



    if (isset($_SESSION{"error"})) {
        if($_SESSION["error"] == "club_name_already_exists") {
            echo("<h1>Oops! Two clubs can't have the same name.</h1>");
        }
    }
} else {
    echo("<h1>Club not found.</h1>");
}
?>
</body>