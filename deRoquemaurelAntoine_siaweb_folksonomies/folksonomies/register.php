<?php
	require_once('database/db_document.php');
	require_once('database/db_users.php');
	require_once('functions/util.php');

    $page = 'Inscription';
    include_once('views/header.php');
	require_once('views/alert.php');

	if(!isConnect()) {
		if(isset($_POST['pseudo']) && isset($_POST['email']) && isset($_POST['mdp'])) {
			if($_POST['mdp'] != $_POST['confMdp']) {
				afficherAlert('error', 'Les mots de passes sont différents');	
			} else {
				$postRegister = true;
				$mdp = md5($_POST['mdp']);
				insertUser($_POST['pseudo'], $_POST['email'], $mdp);	
				afficherAlert("success", "Votre inscription s'est déroulée correctement !");
				connect($_POST['pseudo']);
			}

		}
		include_once('views/forms/register.php');
	} else {
		afficherAlert("error", "Vous n'avez pas le droit d'être ici");
		redirection('index.php');
	}

    include_once('views/footer.php');
?>
