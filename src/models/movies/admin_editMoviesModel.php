<?php

/**
 * Check if the movie already exist
 */
function checkAlreadyExistMovie ()
{
	global $db;
	$sql = 'SELECT title FROM movies WHERE title = :title';
	$query = $db->prepare($sql);
	$query->bindParam(':title', $_POST['title'], PDO::PARAM_STR);
	$query->execute();
	

	return $query->fetch();
}

/**
 * Add a movie in the database
 */
function addMovie ()
{
	global $db;
	$data = [
		'title' => $_POST['title'],
		'releaseDate' => ($_POST['releaseDate']),
		'duration' => $_POST['duration'],
		'synopsis' => $_POST['synopsis'],
		'casting' => $_POST['casting'],
		'notePress' => $_POST['notePress'],
	];

	try {
		$sql = 'INSERT INTO movies (title, releaseDate, duration, synopsis, casting, notePress) VALUES (:title, :releaseDate, :duration, :synopsis, :casting, :notePress)';
		$query = $db->prepare($sql);
		$query->execute($data);
	} catch (PDOException $e) {
		var_dump($e->getMessage());
		die;
	}
}


/**
 * Update a movie in the database
 */
function updateMovie ()
{
	global $db;
	$data = [
		'title' => $_POST['title'],
		'releaseDate' => $_POST['releaseDate'],
		'duration' => $_GET['duration'],
		'synopsis' => $_POST['synopsis'],
		'casting' => $_POST['casting'],
		'notePress' => $_POST['notePress'],



	];

	$sql = 'UPDATE movies SET title = :title, date = :date, duration = :duration, synopsis = :synopsis, casting = :casting, notePress = :notePress WHERE id = :id';
	$query = $db->prepare($sql);
	$query->execute($data);
}
