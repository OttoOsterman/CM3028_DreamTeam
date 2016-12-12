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
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $sql = "SELECT user_id, username, acc_type FROM User";
        $acc_type_sql = "SELECT acc_type FROM Permission";

        $result = $db->query($sql);
        $acc_types = $db->query($acc_type_sql);
        while ($row = $result->fetch_array()) {
            echo("<label>{$row["username"]}</label><select class='selected' id='{$row["user_id"]}'>");
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

        //TODO: REMOVE DEBUG CODE
        echo("
        <form action='javascript:return edit_users()'>
        <div id='buttonContainer'>
            <input type='submit' class='greenButton2' onclick='edit_users()'>
            </div>
        </form>
        
        <form id='to_submit' action='edit_users' METHOD='POST'></form>

        <script>
        function edit_users() {
            var selected = document.getElementsByClassName('selected');
            var form = document.getElementById('to_submit');
            for (var i = 0; i < selected.length; i++) {
                var new_input = document.createElement('input');
                new_input.type = 'hidden';
                new_input.name = selected.item(i).id;
                new_input.value = document.getElementById(new_input.name).options[document.getElementById(new_input.name).selectedIndex].text;
                form.appendChild(new_input);
            }
            form.submit();
        }
        </script>
        ");
    } else {
        //This is really, REALLY expensive and should only be done sparingly
        $sql = "SELECT user_id FROM User";
        $result = $db->query($sql);
        while ($row = $result->fetch_array()) {
            if (isset($_POST[$row['user_id']])) {
                $sql = "UPDATE User SET acc_type = '" . $_POST[$row["user_id"]] . "'WHERE user_id = " . $row["user_id"];
                $db->query($sql);
            }
        }
        header("Location: https://go-portlethen.azurewebsites.net/profile");
    }
    ?>
</div>
</body>