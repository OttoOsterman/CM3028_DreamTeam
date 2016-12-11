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

    <h2 id="editClubHeader">Edit Club</h2>
<div id="editContainer">

<?php
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
    echo ("
    <form action='javascript:return update_club()'>
    <label class='editLabel'>Club name:</label>
    <input type='text' id='name' value='{$name}'>
    <label class='editLabel'>Club genre:</label>
    <input type='text' id='genre' value='{$genre}'>
    <label class='editLabel'>Club description:</label>
    <!--<input type='text' id='description' value='{$description}'>-->
    <textarea id='clubDescription'> </textarea>
    <script>
      document.getElementById(\"clubDescription\").value = \"{$description}\";
    </script>
    <label class='editLabel'>Contact info:</label>
    <input type='text' id='contact_info' value='{$contact_info}'>
    <div id='buttonContainer'>
    <input type='submit' value='submit' class='greenButton2' onclick='update_club()'>
    </div>
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
?>
</div>
</body>