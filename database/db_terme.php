<?php
function keywordExist($xsKeywords) {
	$result = mysql_query("select numeroT from terme where motCle='$xsKeywords'");

	return ($object = mysql_fetch_object($result));
}

function decritExist($xiDocumentD, $xiDocumentT) {
	$result = mysql_query("select * from decrit 
		where numeroT='$xiDocumentT'
			AND numeroD='$xiDocumentD'	
		") or die(mysql_error());

	return ($object = mysql_fetch_object($result));
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
