<form method="post" action="documentInsert.php" id="postAddDocument" class="form-horizontal">
    <fieldset>
	<legend style="text-align: center">Sauvegarder le document <em><?php echo $_GET['titre'] ?></em></legend>
	<div class="addDocument">
            <?php
            if(isset($postDocument) && $postDocument) { // Si on a posté undocument 
                if(isset($resultDocument) && $resultDocument) { //aucune erreur, c'est bon.
                    afficherAlert('success', 'Votre document à bien été ajouté');
                } else {
                    afficherAlert('error', 'Erreur dans l\'insertion du document! ');
                }
            }
            ?>

        <div class="control-group">
            <label class="control-label" for="titre">Description</label>
            <div class="controls">
				<textarea></textarea> <!-- TODO -->
            </div>
            <div class="alert alert-error hide alertsForms" id="titreAlert" >
                <h4 class="alert-heading">Erreur !</h4>
				Le champ ne peut être vide 
			</div>
        </div>

        <div class="form-actions">
            <div class="" style="margin-left: 35%;">
				<input type="submit" class="btn btn-primary">
				<input type="reset" class="btn">
			</div>
		</div>
        </div>
    </fieldset>
</form>

<script>

    $(function(){
        $("#postAddDocument").on("submit", function(){
            $("div.alert").hide();
            var retour = true;
            if($('#titre').val().length <= 0) {
                $("#titreAlert").show("slow");
                retour = false;
            }
            if($('#url').val().length <= 0) {
                $("#urlAlert").show("slow");
                retour = false;
            }
            if($('#keywords').val().length <= 0) {
                $("#keywordsAlert").show("slow");
                retour = false;
            }

            return retour;
        });
    });</script>

</form>
