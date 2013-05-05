<?php
function isConnect() {
	return (isset($_SESSION['pseudo']) && $_SESSION['connect']);
}

function connect($xsPseudo) {
	$_SESSION['pseudo'] = $xsPseudo; 
	$_SESSION['connect'] = true;
	$_SESSION['id'] = getIdUser($xsPseudo);
	afficherAlert('success', 'Bienvenu '.$_SESSION['pseudo'].'! Vous êtes bien connectés');
}
