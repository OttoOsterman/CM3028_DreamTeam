<!---->
<!--<!DOCTYPE html>-->
<!--<html>-->
<!--<head>-->
<!--</head>-->
<!--<body>-->
<!--<p>-->
//
//    include("dbconnect.php");
//
//    //Connect to csdm-webserver and select database
//    $db = new mysqli(
//        'Us-cdbr-azure-southcentral-f.cloudapp.net',
//        'Be9b6ca39cad35',
//        'e7f30e0c',
//        'cm3028dreamteam'
//    );
//    //Test if connection was established, and print any errors
//    if($db->connect_errno){
//        die('Connectfailed['.$db->connect_error.']');
//    }
//    echo "It's alive!";
//
//    ?>
<!--</p>-->
<!--</body>-->
<!--</html>-->

<?
define('INCLUDE_DIR', dirname(__FILE__) . '/inc/');
$rules = array(
    //
    //main pages
    //
    'about' => "/about",
    'contactus' => "/contactus",
    'blog' => "/blog",
    'blog_article' => "/blog/(?'blogID'[\w\-]+)",
    //
    //Admin Pages
    //
    'login' => "/login",
    'create_article' => "/createarticle",
    'logout' => "/logout",
    //
    // Home Page
    //
    'home' => "/"
);
$uri = rtrim(dirname($_SERVER["SCRIPT_NAME"]), '/');
$uri = '/' . trim(str_replace($uri,
        ''
        , $_SERVER['REQUEST_URI']), '/');
$uri = urldecode($uri);
foreach ($rules as $action => $rule) {
    if (preg_match('~^' . $rule . '$~i', $uri, $params)) {
        include(INCLUDE_DIR . $action . '.php');
        exit();
    }
}
// nothing is found so handle the 404 error
include(INCLUDE_DIR . '404.php');
?>