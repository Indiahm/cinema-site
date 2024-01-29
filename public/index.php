<?php
require '../vendor/autoload.php';

// Constants
define('SRC', '../src/');

// Load environment variables from .env file
$dotenv = Dotenv\Dotenv::createImmutable(SRC . 'config');
$dotenv->load();

session_start();

require SRC . 'config/database.php';
require SRC . 'includes/forms.php';


$router = new AltoRouter();
$router->setBasePath('/movies');

require SRC . 'routes/public.php';
require SRC . 'routes/admin.php';

$match = $router->match();

require SRC . 'includes/functions.php';
logoutTimer();

//Twig
$loader = new \Twig\Loader\FilesystemLoader(SRC . 'views');
$twig = new \Twig\Environment($loader, ['cache' => false, 'debug' => true]);
$twig->addExtension(new \Twig\Extension\DebugExtension());
require_once SRC . 'includes/twig.php';



if (!empty($match['target'])) {
	checkAdmin($match, $router);
	$data=[]; // data to be sent to the view
	$_GET = array_merge($_GET, $match['params']);
	require SRC . 'models/' . $match['target'] . 'Model.php';
	require SRC . 'controllers/' . $match['target'] . 'Controller.php';


	// Load twig template or classic view
    if (file_exists(SRC . 'views/' . $match['target'] . '.twig')) {
        echo $twig->render($match['target'] . '.twig', $data);
    } else {
        require SRC . 'views/' . $match['target'] . 'View.php';
    }
	// require SRC . 'views/' . $match['target'] . 'View.php';
} else {
	header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
	//die '404';
}
