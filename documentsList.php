<?php
	require_once('database/connect.php');
	require_once('database/db_documents.php');
    $page = 'Lister les documents';
    include_once('views/header.php');
    include_once('views/documents.php');

	$documents = getAllDocuments();
	listDocuments($documents);	
    include_once('views/footer.php');
?>
