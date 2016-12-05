<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="http://go-portlethen.azurewebsites.net/src/css/club.css"/>
    <link rel="stylesheet" type="text/css" href="http://go-portlethen.azurewebsites.net/src/css/navbar.css"/>
    <link rel="stylesheet" type="text/css" href="http://go-portlethen.azurewebsites.net/src/css/general.css"/>
</head>

<body>
    <?php include('scripts/navbar.php') ?>
<div id="clubContainer">
    <?php
    //TODO: Remove testing code
    include('scripts/db_connect_test.php');
    $request_array = explode("/", $_SERVER["REQUEST_URI"]);
    $club_id = end($request_array);
    $sql = "SELECT Club.name, Club.genre, Club.description, Club.contact_info FROM Club WHERE club_id = " . mysqli_real_escape_string($db, $club_id);
    $results = $db->query($sql);
    $row = $results->fetch_array();

    if(isset($row["name"]) && $row["name"] !== null) {
        echo("
        <section class='clubSection'>
        <h1 class='clubName'>{$row["name"]}</h1>
        <section class='clubGenre'>{$row["genre"]}</section>
        <section class='clubDesc'>{$row["description"]}</section>
        <section class='clubContact'>{$row["contact_info"]}</section>
        </section>");
    } else {
        echo ("<h1>Club not found</h1>");
    }
    ?>
</div>
</body>
</html>