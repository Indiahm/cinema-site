<?php

require_once '/Applications/MAMP/htdocs/movies/src/models/homeModel.php';

$movies = listMovies();
// var_dump($movies);

include '/Applications/MAMP/htdocs/movies/src/views/homeView.php';

?>

