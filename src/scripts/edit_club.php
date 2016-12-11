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
    echo ("
    <form action='javascript:return update_club()'>
    <input type='text' id='name' value='{$row["name"]}'>
    <input type='text' id='genre' value='{$row["genre"]}'>
    <input type='text' id='description' value='{$row["description"]}'>
    <input type='text' id='contact_info' value='{$row["contact_info"]}'>
    <input type='submit' value='submit'>
    </form>
    
    <script>
    function update_club() {
        var name = document.getElementById('name').value;
        var genre = document.getElementById('genre').value;
        var description = document.getElementById('description').value;
        var contact_info = document.getElementById('contact_info').value;
        var args = 'name=' + name + '&genre=' + genre + '&description=' + description + '&contact_info=' + contact_info;
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
    ");
} else {
    echo("<h1>Club not found.</h1>");
}