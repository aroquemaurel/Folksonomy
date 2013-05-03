<?php
	require_once('database/db_document.php');
	require_once('database/database.php');
    $page = 'Création de la base de données';
    include_once('views/header.php');
    include_once('views/alert.php');

	createDatabase();
	afficherAlert("success", "La base de données à été créée avec succés");
    include_once('views/footer.php');
?>
