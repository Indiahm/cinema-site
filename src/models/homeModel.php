<?php

function listMovies()
{
    global $db;
    $sql = 'SELECT id, poster, title, releaseDate FROM movies';
    $query = $db->prepare($sql);
    $query->execute();

    return $query->fetchAll();
}

?>
