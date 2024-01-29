<?php

$movie = detailsMovie();
if ($movie) {
    $data['movie'] = $movie;
} else {
    header($_SERVER['SERVER_PROTOCOL'] . '404 not found');
    die('404 - Page not found');
}
