<?php

/**
 * Check if the movie already exist
 */
function checkAlreadyExistMovie()
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
function addMovie(): bool
{
	global $db;
	$data = [
		'title' => $_POST['title'],
		// 'slug' => $_POST['slug'],
		// 'poster' => $_POST['poster'],
		'releaseDate' => ($_POST['releaseDate']),
		'duration' => $_POST['duration'],
		'synopsis' => $_POST['synopsis'],
		'casting' => $_POST['casting'],
		'notePress' => $_POST['notePress'],
	];

	// try {
		$sql = 'INSERT INTO movies (title, releaseDate, duration, synopsis, casting, notePress) VALUES (:title, :releaseDate, :duration, :synopsis, :casting, :notePress)';
		$query = $db->prepare($sql);
		$query->execute($data);
		return true;
		// alert('Le film a bien été ajouté.', 'succes');
	// } catch (PDOException $e) {
	// 	if ($_ENV['DEBUG'] == 'true') {
	// 		var_dump($e->getMessage());
	// 		die;
	// 	} else {
	// 		alert('Une erreur est survenue.', 'danger');
	// 	}
	// }
}




/**
 * Update a movie in the database
 */
function updateMovie()
{
	global $db;
	$data = [
		'title' => $_POST['title'],
		// 'slug' => $_POST['slug'],
		// 'poster' => $_POST['poster'],
		'releaseDate' => ($_POST['releaseDate']),
		'duration' => $_POST['duration'],
		'synopsis' => $_POST['synopsis'],
		'casting' => $_POST['casting'],
		'notePress' => $_POST['notePress'],
		'id' => $_GET['id']


	];

	try {
		$sql = 'UPDATE movies SET title = :title, date = :releaseDate, duration = :duration, synopsis = :synopsis, casting = :casting, notePress = :notePress WHERE id = :id';
		$query = $db->prepare($sql);
		$query->execute($data);
		alert('Votre film a bien été modifié', 'succes');
	} catch (PDOException $e) {

		if ($_ENV['DEBUG'] == 'true') {
			var_dump($e->getMessage());
			die;
		} else {
			alert('Une erreur est survenue.', 'danger');
		}
	}
}


/**
 * Read movies from the database
 */
function getMovies()
{
	global $db;

	try {
		$sql = 'SELECT title, releaseDate, duration, synopsis, casting, notePress FROM movies WHERE id = :id';
		$query = $db->prepare($sql);
		$query->execute(['id' => $_GET['id']]);
		return $query->fetch();
	} catch (PDOException $e) {

		
		if ($_ENV['DEBUG'] == 'true') {
			var_dump($e->getMessage());
			die;
		} else {
			alert('Une erreur est survenue, réassayer plus tard', 'danger');
		}
	}
}

