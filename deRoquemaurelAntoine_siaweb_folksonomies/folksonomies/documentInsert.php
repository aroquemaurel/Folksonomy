<?php
$page = 'Saisir un document';
require_once('database/connect.php');
require_once('database/db_document.php');

include_once('views/header.php');
include_once('views/documentInsert.php');

if(isset($_POST['titre']) && isset($_POST['url']) && isset($_POST['keywords'])) {
	$aKeywords = explode(';', $_POST['keywords']);
	foreach($aKeywords as $keyword) {
		$keyword = trim($keyword);
	}
	insertDocument($_POST['titre'], $_POST['url'], $aKeywords, $_SESSION['id'], $_POST['description']);
} 
