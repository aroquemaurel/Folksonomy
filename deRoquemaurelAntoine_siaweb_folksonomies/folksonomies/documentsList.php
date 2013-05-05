<?php
	require_once('database/connect.php');
	require_once('database/db_document.php');
    $page = 'Lister les documents';
    include_once('views/header.php');
    include_once('views/documents.php');

	echo '<div class="page-header"><h2>Liste de tous les documents du site</h2></div>';
	listDocuments(getAllDocuments());	
    include_once('views/footer.php');
?>
