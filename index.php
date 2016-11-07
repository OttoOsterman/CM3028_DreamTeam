<?

define('INCLUDE_DIR', dirname(__FILE__) . '/src/');

$rules = array(
		//TODO: REMOVE TESTING CODE
		'database' => "/adminer",
		
		'home' => '/',
		'clubs_societies' => '/clubs_societies',
		'health_wellbeing' => '/health_wellbeing',
		'map' => '/map'
);

$uri = rtrim(dirname($_SERVER["SCRIPT_NAME"]), '/');
$uri = '/' . trim(str_replace($uri, '', $_SERVER['REQUEST_URI']), '/');
$uri = urldecode($uri);

foreach($rules as $action => $rule) {
	if (preg_match('~^' . $rule . '$~i', $uri, $params)) {
		include(INCLUDE_DIR . $action . '.php');
		exit();
	}
}

include(INCLUDE_DIR . '404.php');

?>