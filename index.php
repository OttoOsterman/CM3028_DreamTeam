
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<p>
    <?php
    include("dbconnect.php");

    //Connect to csdm-webserver and select database
    $db = new mysqli(
        'Us-cdbr-azure-southcentral-f.cloudapp.net',
        'Be9b6ca39cad35',
        'e7f30e0c',
        'cm3028dreamteam'
    );
    //Test if connection was established, and print any errors
    if($db->connect_errno){
        die('Connectfailed['.$db->connect_error.']');
    }

    ?>
</p>
</body>
</html>
