<?php
// Edit Movies 
$errorsMessage = [
	'title' => false,
	// 'slug' => false,
	// 'poster' => false,
	'releaseDate' => false,
	'duration' => false,
	'synopsis' => false,
	'casting' => false,
	'notePress' => false



];

if (!empty($_POST['title']) && !empty($_POST['releaseDate']) && !empty($_POST['synopsis']) && !empty($_POST['casting']) && !empty($_POST['duration']) && !empty($_POST['notePress'])) {
	// Vérifier si le film existe déjà
	if (!empty(checkAlreadyExistMovie())) {
		// Le film existe déjà
		$message = 'Ce film existe déjà. Voulez-vous le mettre à jour ?';
		// Afficher un message spécifique et proposer de mettre à jour le film
		alert($message, 'info');
	} else {
		// Tous les champs requis sont remplis et le film n'existe pas encore
		if (!empty($_GET['id'])) {
			// Si un ID est présent, cela signifie que le film est en cours de modification
			updateMovie();
			$message = 'Le film a bien été mis à jour.';
		} else {
			// Sinon, un nouveau film est ajouté
			addMovie();
			$message = 'Le film a bien été ajouté.';
		}
		// Afficher un message de succès
		alert($message, 'success');
	}
} else {
	// Certains champs requis sont vides
	alert('Merci de remplir tous les champs obligatoires.', 'warning');
}


