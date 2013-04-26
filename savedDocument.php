<?php
	require_once('database/db_documents.php');
	require_once('functions/user.php');
	require_once('functions/util.php');
	require_once('views/alert.php');
    $page = 'Documents sauvegardés';
    include_once('views/header.php');
    include_once('views/documents.php');

	if(isConnect()) {
		listDocuments(getDocumentsByUser($_SESSION['id']), true, false);
	} else {
		afficherAlert("error", "Vous n'avez pas le droit d'être ici");
		redirection('index.php');
	}
	
    include_once('views/footer.php');
?>
