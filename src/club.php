<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="./src/css/club.css"/>
    <link rel="stylesheet" type="text/css" href="./src/css/navbar.css"/>
    <link rel="stylesheet" type="text/css" href="./src/css/general.css"/>
</head>

<body>
<div id="navbar">
    <?php include('scripts/navbar.php') ?>
</div>
<div>
    <?php
    if(isset($_GET["club_id"]) && !(is_null($_GET["club_id"]))) {
        //TODO: Remove testing code
        include("scripts/db_connect_test.php");
        $sql = $db->prepare("SELECT Club.name, Club.genre, Club.description, Club.contact_info FROM Club WHERE club_id = ?");
        $club_id = mysqli_real_escape_string($_GET["club_id"]);
        $sql->bind_param("s", $club_id);
        $results = $sql->execute();
        $row = $results->fetch_array();

        if(!is_null($row["name"]) && isset($row["name"])) {
            echo("
                {$row["name"]}
            ");
        } else {
            echo ("<h1>Club not found</h1>");
        }


    }
    ?>
</div>
</body>
</html>