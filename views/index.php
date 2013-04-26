<?php
	$nbDocs = getNbDocs();
echo '<div class="page-header"><h2>Accueil <small>Le site contient '.$nbDocs.' documents avec '.count($keywords).' mots clés</small></h2></div>';
echo '<div id="cloudWords">';
	foreach($keywords as $keyword) {
		$taille = 7 + ($keyword->nbKeyword / $nbDocs)*100;
		echo '<a href="search.php?s='.$keyword->motCle.'"><span class="keyword" style="color: rgb('.(round(160-$taille)+10).','.(round(150-$taille)+10).','.(round(240-$taille)+10).'); font-size: '.$taille.'pt">'.$keyword->motCle.'</span></a> ';
	}
	echo '</div>';
include('views/forms/search.php');
echo '<div class="row-fluid">';
	if(isset($_GET['k'])) {
		$_GET['k'] = str_replace(' ', '|', $_GET['k']);
		include('search.php');
	}
?>
