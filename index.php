include("dbconnect.php");
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<p>
    <?php
    $myage = 7;
    $myname = "Pushon";
    print "Hi " . $myname . "! You can buy: ";
    if($myage > 16){
        print "specs";
    }
    if($myage > 18 && $myage < 22){
        print " and mugs.";
    }if($myage > 21){
        print ", mugs and sausage rolls.";
    }
    else{
        print "Nothing, soz!";
    }

    ?>
</p>
</body>
</html>
