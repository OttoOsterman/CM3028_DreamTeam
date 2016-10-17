<!DOCTYPE html>
<html>
<head>
</head>
<body>

<p>
    <?php

    echo "Where would you like to say hello?";


    ?>
</p>

<form action="helloPrinter.php" method ="post">
    <input type="submit" value="Earth" name="earth">
    <input type="submit" value="Mars" name="mars">
    <input type="submit" value="Uranus" name="uranus">
</form>

</body>
</html>