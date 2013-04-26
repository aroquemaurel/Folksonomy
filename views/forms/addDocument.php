<form method="post" action="documentInsert.php" id="postAddDocument" class="form-horizontal">
    <fieldset>
        <legend style="text-align: center">Formulaire d'ajout d'un document.</legend>
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
            <label class="control-label" for="titre">Titre</label>
            <div class="controls">
                <input type="text" class="input-large" style="height:25px;" id="titre" name="titre" required />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="description">Description</label>
            <div class="controls">
				<textarea name="description" id="description"></textarea>
            </div>
            <div class="alert alert-error hide alertsForms" id="titreAlert" >
                <h4 class="alert-heading">Erreur !</h4>
				Le champ ne peut être vide 
			</div>
        </div>
        <div class="control-group">
            <label class="control-label" for="url">URL</label>
            <div class="controls">
                <input class="input-large" style="height:25px;" type="url" id="url" name="url" required />
            </div>
            <div class="alert alert-error hide alertsForms" id="urlAlert" >
                <h4 class="alert-heading">Erreur !</h4>
				Le champ ne peut être vide 
			</div>
        </div>
        <div class="control-group">
            <label class="control-label" for="url">Mots clés</label>
            <div class="controls">
                <input type="text" class="input-large" style="height:25px;" id="keywords" name="keywords" required />
            </div>
            <div class="alert alert-error hide alertsForms" id="keywordsAlert" >
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
		/* au cas ou le navigateur ne supporte pas le html5, on check en javascript */
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
