<?php
require_once('database/connect.php');

function createJoinsDocuments() {
	return ('left join decrit on decrit.numeroD = document.numeroD
			 left join terme on terme.numeroT = decrit.numeroT
			 left join utilisateur on utilisateur.idUtilisateur = decrit.idUtilisateur
			 left join sauvegarde on sauvegarde.idUtilisateur = utilisateur.idUtilisateur');
}

function keywordExist($xsKeywords) {
	$result = mysql_query("select numeroT from terme where motCle='$xsKeywords'");

	return ($object = mysql_fetch_object($result));
}
function urlExist($xsUrl) {
	$result = mysql_query("select numeroD from document where url='$xsUrl'");

	return (mysql_fetch_object($result));
}

function decritExist($xiDocumentD, $xiDocumentT) {
	$result = mysql_query("select * from decrit 
		where numeroT='$xiDocumentT'
			AND numeroD='$xiDocumentD'	
		") or die(mysql_error());

	return ($object = mysql_fetch_object($result));
}

function documentUserExist($xiDocumentD, $xiUser) {
	$result = mysql_query("select * from sauvegarde  
		where numeroD='$xiDocumentD'
			AND idUtilisateur='$xiUser'	
		") or die(mysql_error());

	return ($object = mysql_fetch_object($result));
}

function insertDocument($xsTitle, $xsUrl, $xasKeywords, $xiIdUser, $xsDescription) {
	if(!($urlFound = urlExist($xsUrl))) {
		$iIdDocument = uniqid(rand(), true);
		mysql_query("insert into document(numeroD, titre, url) values('$iIdDocument', '$xsTitle', '$xsUrl')") or die(mysql_error());
	} else {
		$iIdDocument = $urlFound->numeroD;
	}


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

function getMyDocuments($xidUtilisateur) {
	$return = array();
	$result = mysql_query("select document.numeroD, titre, url, motCle, description from document".createJoinsDocuments()."
		where utilisateur.idUtilisateur = $xidUtilisateur 
		order by titre
		") or die(mysql_error());

        while($object = mysql_fetch_object($result)) {
            $return[$object->numeroD]['idDoc'] = $object->numeroD;
            $return[$object->numeroD]['titre'] = $object->titre;
            $return[$object->numeroD]['url'] = $object->url;
            $return[$object->numeroD]['motCle'][] = $object->motCle;
            $return[$object->numeroD]['description'] = $object->description;
        }

	return $return;
}
function getAllDocuments() {
	$return = array();
	$result = mysql_query("select document.numeroD, titre, url, motCle,pseudo from document".createJoinsDocuments()."
		order by titre
		") or die(mysql_error());

        while($object = mysql_fetch_object($result)) {
            $return[$object->numeroD]['idDoc'] = $object->numeroD;
            $return[$object->numeroD]['titre'] = $object->titre;
            $return[$object->numeroD]['url'] = $object->url;
            $return[$object->numeroD]['motCle'][] = $object->motCle;
            $return[$object->numeroD]['utilisateur'][] = $object->pseudo;
        }

	return $return;
}
function getNbDocs() {
	$result = mysql_query("select count(*) as nbDoc from document") or die(mysql_error());

	$return = $object = mysql_fetch_object($result);
	return $return->nbDoc; 
}
function getAllKeywords() {
	$return = array();
	$result = mysql_query("select motCle, count(motCle) as nbKeyword
		from terme
		left join decrit
		on decrit.numeroT = terme.numeroT
		group by motCle
		order by motCle 
		") or die(mysql_error());

	while($object = mysql_fetch_object($result)) {
		$return[] = $object;
	}

	return $return;
}

function getDocumentsByKeywords($xasKeywords) {
	$return = array();
	$sql = "select document.numeroD, titre, url, motCle, terme.numeroT, pseudo from document ".createJoinsDocuments();

	$sql .= ' WHERE (1 AND 0) ';
	foreach($xasKeywords as $key) {
		$sql .= "OR decrit.numeroD IN(
					select numeroD from decrit left join terme on terme.numeroT = decrit.numeroT where motCle LIKE '%$key%' 
				) ";
	}
	$sql .=	' order by titre';
		$result = mysql_query($sql) or die(mysql_error());

        while($object = mysql_fetch_object($result)) {
            $return[$object->numeroD]['titre'] = $object->titre;
            $return[$object->numeroD]['url'] = $object->url;
            $return[$object->numeroD]['motCle'][] = $object->motCle;
            $return[$object->numeroD]['utilisateur'][] = $object->pseudo;
        }

	return $return;
}
