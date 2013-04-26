<?php
	require_once('database/connect.php');
	function insertUser($xsUser, $xsEmail, $xsMdp) {
		mysql_query("insert into utilisateur (pseudo, mdp, adresseMail) values('$xsUser', '$xsMdp', '$xsEmail')");
	}

	function getMdpUser($xsUser) {
		$result = mysql_query("select mdp from utilisateur where pseudo='$xsUser'");
		$user = mysql_fetch_object($result);
		return(isset($user->mdp) ? $user->mdp : NULL);
	}

	function getIdUser($xsUser) {
		$result = mysql_query("select idUtilisateur from utilisateur where pseudo='$xsUser'");
		$user = mysql_fetch_object($result);
		return(isset($user->idUtilisateur) ? $user->idUtilisateur : NULL);
	}
