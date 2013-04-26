<?php
function listDocuments($xaDocuments, $desc=false, $pseudo=true) {
	echo '
	<table class="table table-striped"> ';
	foreach($xaDocuments as $doc) {
		echo '<tr>';
		echo '<td><a href="'.$doc['url'].'">'.$doc['titre'].'</a>&nbsp;&nbsp; ';
		echo'	</td>';
		if($desc) {
			echo '<td>'.$doc['description'].'</td>';
		}
		echo '<td>';
		$doc['motCle'] = array_unique($doc['motCle']);
		foreach($doc['motCle'] as $keyword) {
			echo '<a href="search.php?s='.$keyword.'"><span class="label label-info">'.$keyword.'</span></a> ';
		}
		if($pseudo) {
			$doc['utilisateur'] = array_unique($doc['utilisateur']);
			echo '<td>';
			foreach($doc['utilisateur'] as $user) {
				echo '<a href="search.php?u='.$user.'"><span class="label">'.$user.'</span></a> ' ;
			}
			echo	'</td>';
		}
		echo '</td>';
		echo '</tr>';
	}
	echo '</table>';
}
