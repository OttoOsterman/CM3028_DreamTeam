<?php
define('INCLUDE_DIR', dirname(__FILE__) . '/src/');

$rules = array(
		'scripts/locations' => "/locations",
		'scripts/login' => '/login',
		'scripts/logout' => '/logout',
		'scripts/edit_club' => '/edit_club',
		'scripts/updateclub' => '/updateclub',
		'scripts/add_club' => '/add_club',
		'scripts/remove_club' => '/remove_club',
		'scripts/removeclubuser' => '/removeclubuser',

		'home' => '/',
		'clubs_societies' => '/clubs_societies',
        'club' => '/club/(?\'club_id\'[\w\-]+)',
		'health_wellbeing' => '/health_wellbeing',
		'map' => '/map',
        'signup' => '/signup',
        'profile' => '/profile',
		'edit_users' => '/edit_users'
);

$uri = rtrim(dirname($_SERVER["SCRIPT_NAME"]), '/');
$uri = '/' . trim(str_replace($uri, '', $_SERVER['REQUEST_URI']), '/');
$uri = urldecode($uri);

foreach($rules as $action => $rule) {
    if(preg_match('~^' . $rule . '$~i', $uri, $params)) {
        include(INCLUDE_DIR . $action . '.php');
        exit();
    }
}

include(INCLUDE_DIR . '404.php');
?>