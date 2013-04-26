<?php
	$nbDocs = getNbDocs();
echo '<div id="cloudWords">';
	foreach($keywords as $keyword) {
		$taille = 7 + ($keyword->nbKeyword / $nbDocs)*100;
		echo '<a href="search.php?s='.$keyword->motCle.'"><span class="keyword" style="color: rgb('.(round(160-$taille)+10).','.(round(150-$taille)+10).','.(round(240-$taille)+10).'); font-size: '.$taille.'pt">'.$keyword->motCle.'</span></a> ';
	}
	echo '</div>';
?>
<div id="search">
<form class="form-inline" method="get" action="?" >
<div class="input-prepend input-append">
<span class="add-on"><i class="icon-search"></i></span>
<input id="prependedInput" style="height: 30px" type="text" class="span2" placeholder="Search" name="k" />
<input type="submit" class="btn" value="Rechercher" />
</div>
</form>
</div>
<div class="row-fluid">
<?php
	if(isset($_GET['k'])) {
		$_GET['k'] = str_replace(' ', '|', $_GET['k']);
		include('search.php');
	}
?>
