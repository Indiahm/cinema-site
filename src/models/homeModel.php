<?php

function getAllUsers ($db) {
	$sql = "SELECT * FROM users";
	$request = $db->prepare($sql);
	$request->execute();

	return $request->fetchAll();
}
