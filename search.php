<?php
	require_once('database/db_documents.php');
	require_once('database/db_users.php');
    $page = 'Accueil';
    include_once('views/header.php');
    include_once('views/documents.php');

	if(isset($_GET['k'])) {
		$aKeywords = explode('|', $_GET['k']);
		foreach($aKeywords as $key) {
			$key = trim($key);
		}
		listDocuments(getDocumentsByKeywords($aKeywords));
	} else if(isset($_GET['u'])) {
		echo '<h3>Documents de <em>'.$_GET['u'].'</em></h3>';
		listDocuments(getDocumentsByUser(getIdUser($_GET['u'])), false, false);
	}

