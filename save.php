<?php
	require_once('database/db_documents.php');
    $page = 'Enregistrer un document';
    include_once('views/header.php');

	if(isset($_SESSION['pseudo']) && $_SESSION['connect']) {
		include_once('views/forms/save.php');
	}
    include_once('views/footer.php');
?>
