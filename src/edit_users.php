<?php
session_start();
?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>Edit Users</title>
    <link rel="stylesheet" type="text/css" href="../src/css/edit_club.css"/>
    <link rel="stylesheet" type="text/css" href="../src/css/navbar.css"/>
    <link rel="stylesheet" type="text/css" href="../src/css/general.css"/>
</head>
<body>

<?php include("scripts/navbar.php"); ?>

<h2 id="editUsersHeader">Edit Users</h2>

<div id="editUsersContainer">

    <!--TODO: REMOVE TESTING CODE-->
    <?php
    include("scripts/db_connect_test.php");
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $sql = "SELECT username, acc_type FROM User";
        $acc_type_sql = "SELECT acc_type FROM Permission";

        $result = $db->query($sql);
        $acc_types = $db->query($acc_type_sql);
        while ($row = $result->fetch_array()) {
            echo("<label>{$row["username"]}</label><select class='selected' id='id_{$row["username"]}'>");
            while ($acc_row = $acc_types->fetch_array()) {
                if ($row["acc_type"] == $acc_row["acc_type"]) {
                    echo("<option selected='selected'>{$acc_row["acc_type"]}</option>");
                } else {
                    echo("<option>{$acc_row["acc_type"]}</option>");
                }
            }
            $acc_types->data_seek(0);
            echo("</select><br>");
        }

        echo("
    <script>
    var selected = document.getElementsByClassName('selected');
    var retval = selected.item(0).id + '=' + document.getElementById(selected.item(0).id).options[document.getElementById(selected.item(0).id).selectedIndex].text;
    for (var i = 1; i < selected.length; i++) {
        retval  = retval + '&' + selected.item(i).id + '=' + document.getElementById(selected.item(i).id).options[document.getElementById(selected.item(i).id).selectedIndex].text;
    }
    </script>
    ");
    }


    $sql = "UPDATE User SET acc_type";
    ?>
</div>
</body>
    