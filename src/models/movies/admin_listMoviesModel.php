<?php

/**
 * Get all movies from the database
 * @param PDO $db PDO connection instance
 * @return array Array of movie objects
 */
function getMovies(){
    global $db;

    $sql = 'SELECT id, title FROM movies';
    $query = $db->prepare($sql);
    $query->execute();

    return $query->fetchAll(PDO::FETCH_ASSOC);
}
