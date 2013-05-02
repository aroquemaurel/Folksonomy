<?php
	require_once('database/db_document.php');
	require_once('database/database.php');
    $page = 'Suppression de la base de données';
    include_once('views/header.php');
    include_once('views/alert.php');

if(isset($_GET['confirm']) && $_GET['confirm'] == 1) {
	removeDatabase();
} 
	require_once('database/database.php');	
    include_once('views/deleteBase.php');
    include_once('views/footer.php');
?>
