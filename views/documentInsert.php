<?php
require_once('views/alert.php');
echo '<div class="row-fluid">';
if(isset($_POST['titre']) && isset($_POST['url']) && isset($_POST['keywords'])) {
	afficherAlert('success', 'Votre document à bien été ajouté');
}
include('views/forms/addDocument.php');

