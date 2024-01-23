<?php
// Movies
$router->map( 'GET', '/', 'home');
$router->map( 'GET', '/recherche', 'search');
$router->map( 'GET', '/details/[i:id]', 'details');

// Pages
$router->map( 'GET', '/politique-confidentialite', 'privacy');
$router->map( 'GET', '/mentions-legales', 'legalNotice');