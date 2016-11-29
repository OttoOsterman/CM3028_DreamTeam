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
    echo($params["club_id"]);
    $sql = $db->prepare("SELECT Club.name, Club.genre, Club.description, Club.contact_info FROM Club WHERE club_id = ?");
    $club_id = mysqli_real_escape_string($params["club_id"]);
    $sql->bind_param("s", $club_id);
    $results = $sql->execute();
    $row = $results->fetch_array();

    if(!(is_null($row["name"])) && isset($row["name"])) {
        echo("
            {$row["name"]}
        ");
    } else {
        echo ("<h1>Club not found</h1>");
    }
    ?>
</div>
</body>
</html>