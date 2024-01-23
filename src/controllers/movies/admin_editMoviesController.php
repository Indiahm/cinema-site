<?php
// Edit Movies 
$errorsMessage = [
	'title' => false,
	'releaseDate' => false,
	'duration' => false,
	'synopsis' => false,
	'casting' => false,
	'notePress' => false


];

if (!empty($_POST)) {
	// Check if movie already exist
	if (!empty($_POST['title'])) {

		$errorsMessage['title'] = 'Film déjà existant';
	} else if (!empty(checkAlreadyExistMovie())) {
		$errorsMessage['title'] = 'Merci de remplir le titre du film';
	}
}



// Save movie in database
if (!empty($_POST['title']) && !empty($_POST['releaseDate']) && !empty($_POST['duration']) && !empty($_POST['synopsis']) && !empty($_POST['casting']) && !empty($_POST['notePress'])) {
	if (!$errorsMessage['title'] && !$errorsMessage['releaseDate'] && !$errorsMessage['duration'] && !$errorsMessage['synopsis'] && !$errorsMessage['casting'] && !$errorsMessage['notePress']) {

		if (!empty($_GET['id'])) {
			updateUser();
		} else {
			addUser();
		}

		alert('Un utilisateur a bien été ajouté.', 'success');
	} else {
		alert('Erreur lors de l\'ajout de l\'utilisateur.');
	}
} else {
	alert('Merci de remplir tous les champs obligatoires.');
}
