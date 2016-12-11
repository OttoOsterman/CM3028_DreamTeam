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
        var name = document.getElementById('name').value;
        var genre = document.getElementById('genre').value;
        var description = document.getElementById('description').value;
        var contact_info = document.getElementById('contact_info').value;
        var args = 'name=' + name + '&genre=' + genre + '&description=' + description + '&contact_info=' + contact_info;
        //REMOVE DEBUG CODE
        document.getElementById('debug').innerHTML = args;
        var req = new XMLHttpRequest();
        req.onreadystatechange = function() {
            if (req.readyState == XMLHttpRequest.DONE) {
                window.location('https://go-portlethen.azurewebsites.net/profile');
            }
        };
        req.open('POST', 'https://go-portlethen.azurewebsites.net/update_club');
        req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        req.send(args);
    }
    </script>
    <!-- REMOVE ASAP -->
    <div id='debug'>
    
</div>
    ");
} else {
    echo("<h1>Club not found.</h1>");
}