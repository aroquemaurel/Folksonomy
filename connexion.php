<?php
    include_once('views/header.php');
    require_once('views/alert.php');
    require_once('functions/util.php');
    require_once('database/connect.php');
    require_once('database/db_users.php');
    if(isset($_POST['user']) && isset($_POST['mdp'])) { 
		if(md5($_POST['mdp']) == getMdpUser($_POST['user'])) {
			connect($_POST['user']);
		} else {
			afficherAlert('error', 'Couple utilisateur/mot de passe incorrect');
		}
        redirection('index.php');
    } else {
        echo '<div class="alert alert-error"><strong>Erreur</strong> Identifiants de connexion incorrects</div>';
    }
