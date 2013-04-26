<?php
	require_once('database/db_documents.php');
	require_once('database/db_users.php');
    $page = 'Inscription';
    include_once('views/header.php');
	require_once('views/alert.php');

	if(isset($_POST['pseudo']) && isset($_POST['email']) && isset($_POST['mdp'])) {
		if($_POST['mdp'] != $_POST['confMdp']) {
			afficherAlert('error', 'Les mots de passes sont différents');	
		} else {
			$mdp = md5($_POST['mdp']);
			insertUser($_POST['pseudo'], $_POST['email'], $mdp);	
			connect($_POST['pseudo']);
		}

	}
    include_once('views/register.php');
    include_once('views/footer.php');
?>
