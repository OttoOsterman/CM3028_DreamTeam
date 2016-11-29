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
<div>
    <?php
    //TODO: Remove testing code
    include("scripts/db_connect_test.php");
    echo("working");
    $sql = $db->prepare("SELECT Club.name, Club.genre, Club.description, Club.contact_info FROM Club WHERE club_id = ?");
    $request_array = explode("/", $_SERVER["REQUEST_URI"]);
    $club_id = substr(1,end($request_array));
    echo($club_id);
    echo("working");
    $sql->bind_param("s", $club_id);
    $results = $sql->execute();
    $row = $results->fetch_array();
    echo("working");

    if(isset($row["name"]) && $row["name"] !== null) {
        echo("
            {$row["name"]}
        ");
    } else {
        echo ("<h1>Club not found</h1>");
    }
    echo("working");
    ?>
</div>
</body>
</html>