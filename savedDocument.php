<?php
	require_once('database/db_documents.php');
    $page = 'Documents sauvegardés';
    include_once('views/header.php');
    include_once('views/documents.php');

	listDocuments(getMyDocuments($_SESSION['id']), true, false);
	
    include_once('views/footer.php');
?>
