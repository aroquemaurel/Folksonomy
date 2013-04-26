<?php
$page = "Deconnexion";
include_once('views/header.php');
include_once('functions/util.php');
require_once('database/connect.php');

session_destroy();
$_SESSION['connect'] = false;

echo ' <div class="alert alert-success"><strong>Succès</strong>Vous êtes maintenant déconnecté.</div>';
redirection('index.php');
