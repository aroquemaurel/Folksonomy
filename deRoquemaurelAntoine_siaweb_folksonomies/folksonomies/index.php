﻿<?php
	require_once('database/db_document.php');
	require_once('database/db_terme.php');
    $page = 'Accueil';
    include_once('views/header.php');

	$keywords = getAllKeywords();
	if(isset($_GET['p']) && $_GET['p'] == 'connect') {
		include('connexion.php');
	}
    include_once('views/index.php');
    include_once('views/footer.php');
?>
