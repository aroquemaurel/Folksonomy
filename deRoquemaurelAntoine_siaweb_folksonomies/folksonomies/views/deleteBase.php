<div id="confirmDelete" class="modal hide fade">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h3>Suppression de la base de données</h3>
	</div>
	<div class="modal-body">
	<p>Toutes les données contenus dans la base seront définitivement perdus.<br/> Voulez vous vraiment supprimer celle-ci ?</p>
	</div>
	<div class="modal-footer">
		<a href="index.php" class="btn">Fermer</a>
		<a href="?confirm=1" class="btn btn-danger">Supprimer la base de données</a>
	</div>
</div>
<?php
if(isset($_GET['confirm']) && $_GET['confirm'] == 1) {
	afficherAlert("success", "La base de données à été supprimée avec succés");
} else {
	echo '
<script type="text/javascript">
$(\'#confirmDelete\').modal(\'show\');
</script>';
}
