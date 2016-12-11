<?php
session_start();

include("navbar.php");
//TODO: REMOVE TESTING CODE
include("db_connect_test.php");

$sql = "SELECT * FROM Club WHERE club_id = {$_POST["club_id"]}";
$res = $db->query($sql);
if ($res->num_rows > 0) {
    $_SESSION["curr_club"] = $_POST["club_id"];
    $row = $res->fetch_array();
    $name = htmlspecialchars($row["name"], ENT_QUOTES | ENT_HTML5);
    $genre = htmlspecialchars($row["genre"], ENT_QUOTES | ENT_HTML5);
    $description = htmlspecialchars($row["description"], ENT_QUOTES | ENT_HTML5);
    $contact_info = htmlspecialchars($row["contact_info"], ENT_QUOTES | ENT_HTML5);
    echo ("
    <form action='javascript:return update_club()'>
    <input type='text' id='name' value='{$name}'>
    <input type='text' id='genre' value='{$genre}'>
    <input type='text' id='description' value='{$description}'>
    <input type='text' id='contact_info' value='{$contact_info}'>
    <input type='submit' value='submit' onclick='update_club()'>
    </form>
    
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

    if (isset($_SESSION{"error"})) {
        if($_SESSION["error"] == "club_name_already_exists") {
            echo("<h1>Oops! Two clubs can't have the same name.</h1>");
        }
    }
} else {
    echo("<h1>Club not found.</h1>");
}