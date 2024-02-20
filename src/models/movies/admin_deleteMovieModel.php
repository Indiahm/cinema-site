<?php function deleteMovie()
{
	global $db;

	try {
		$sql = 'DELETE title, releaseDate, duration, synopsis, casting, notePress FROM movies WHERE id = :id';
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