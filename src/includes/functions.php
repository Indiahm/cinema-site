<?php

/**
 * Get the header
 * @param  string $title  The title of the page
 * @param  string $layout The layout to use
 * @return void
 */
function get_header(string $title, string $layout = 'public'): void
{
	global $router;
	require_once '../src/views/layouts/' . $layout . '/header.php';
}

/**
 * Get the footer
 * @param  string $layout The layout to use
 * @return void
 */
function get_footer(string $layout = 'public'): void
{
	global $router;
	require_once '../src/views/layouts/' . $layout . '/footer.php';
}

/**
 * Create notification alert
 * @param string $message The message to save in alert
 * @param string $type    The type of alert
 * @return void
 */
function alert(string $message, string $type = 'danger'): void
{
	$_SESSION['alert'] = [
		'message' => $message,
		'type' => $type
	];
}

/**
 * Display alert session
 * @return void
 */
function displayAlert(): void
{
	if (!empty($_SESSION['alert'])) {
		echo '<div class="alert alert-' . $_SESSION['alert']['type'] . '" role="alert">' . $_SESSION['alert']['message'] . '</div>';

		unset($_SESSION['alert']);
	}
}

/**
 * @param array $match The match array from Altorouter
 * 
 */
function checkAdmin(array $match, AltoRouter $router)
{
	// var_dump($_SESSION);
	// die; 
	$existAdmin = strpos($match['target'], "admin");
	if ($existAdmin !== false && empty($_SESSION['user']['id'])) {
		header('Location: ' . $router->generate('login'));
	}
	// var_dump($match);
	// die;
}

function logoutTimer ()
{
    global $router;

    if (!empty($_SESSION['user']['lastLogin'])) {
        $expireHour = 1;

        $now = new DateTime();
        $now->setTimezone(new DateTimeZone('Europe/Paris'));

        $lastLogin = new DateTime($_SESSION['user']['lastLogin']);

        if ($now->diff($lastLogin)->i >= $expireHour) {
            unset($_SESSION['user']);
            alert('Vous avez été déconnecté pour inactivité', 'danger');
            header('Location: ' . $router->generate('login'));
            die;
        }
    }
}
