<?php
	require_once('database/db_documents.php');
    $page = 'Accueil';
    include_once('views/header.php');
    include_once('views/documents.php');

	if(isset($_GET['k'])) {
		$aKeywords = explode('|', $_GET['k']);
		foreach($aKeywords as $key) {
			$key = trim($key);
		}
		listDocuments(getDocumentsByKeywords($aKeywords));
	}
