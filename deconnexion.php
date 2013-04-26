<?php
$page = "Deconnexion";
include_once('views/header.php');
include_once('functions/util.php');
require_once('database/connect.php');
if(isConnect()) {
	session_destroy();
	$_SESSION['connect'] = false;
	echo ' <div class="alert alert-success"><strong>Succès</strong>Vous êtes maintenant déconnecté.</div>';
} else {
	afficherAlert("error", "Vous n'avez pas le droit d'être ici");
}
redirection('index.php');
