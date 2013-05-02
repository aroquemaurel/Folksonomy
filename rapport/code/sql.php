<?php
function insertDocument($xsTitle, $xsUrl, $xasKeywords, $xiIdUser, $xsDescription) {
	// si l'url n'existe pas dans la base, on l'insère
	if(!($urlFound = urlExist($xsUrl))) { 
		$iIdDocument = uniqid(rand(), true);
		mysql_query("insert into document(numeroD, titre, url) values('$iIdDocument', '$xsTitle', '$xsUrl')") or die(mysql_error());
	} else { // sinon, on récupère son ID
		$iIdDocument = $urlFound->numeroD;
	}

	// maintenant on insère les mots clefs, s'ils n'existent pas déjà
	foreach($xasKeywords as $keyword) {
		if(!($keywordFound = keywordExist($keyword))) {
			$iIdTerme = uniqid(rand(), true);
			mysql_query("insert into terme(numeroT, motCle) values 
				('$iIdTerme', '".trim($keyword)."')") or die(mysql_error());
		} else {
			$iIdTerme = $keywordFound->numeroT;
		}

		if(!decritExist($iIdDocument, $iIdTerme)) {	
			mysql_query("insert into decrit(numeroD, numeroT, idUtilisateur) values 
				('$iIdDocument', '$iIdTerme', '$xiIdUser')") or die(mysql_error());
		}

		if(!documentUserExist($iIdDocument, $xiIdUser)) {
			mysql_query("insert into sauvegarde(numeroD, idUtilisateur, description) values 
				('$iIdDocument', '$xiIdUser', '$xsDescription')") or die(mysql_error());
		}
	}
}
