<form method="post" action="register.php" id="postAddDocument" class="form-horizontal">
    <fieldset>
        <legend style="text-align: center">Inscription</legend>
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
            <label class="control-label" for="pseudo">Pseudo</label>
            <div class="controls">
                <input type="text" class="input-large" style="height:25px;" id="pseudo" name="pseudo" />
            </div>
            <div class="alert alert-error hide alertsForms" id="titreAlert" >
                <h4 class="alert-heading">Erreur !</h4>
				Le champ ne peut être vide 
			</div>
        </div>
        <div class="control-group">
            <label class="control-label" for="email">Adresse e-mail</label>
            <div class="controls">
                <input class="input-large" style="height:25px;" type="email" id="email" name="email" />
            </div>
            <div class="alert alert-error hide alertsForms" id="urlAlert" >
                <h4 class="alert-heading">Erreur !</h4>
				Le champ ne peut être vide 
			</div>
        </div>
        <div class="control-group">
            <label class="control-label" for="mdp">Mot de passe</label>
            <div class="controls">
                <input type="password" class="input-large" style="height:25px;" id="mdp" name="mdp" />
            </div>
            <div class="alert alert-error hide alertsForms" id="keywordsAlert" >
                <h4 class="alert-heading">Erreur !</h4>
				Le champ ne peut être vide 
			</div>
        </div>
        <div class="control-group">
            <label class="control-label" for="confMdp">Confirmation</label>
            <div class="controls">
                <input type="password" class="input-large" style="height:25px;" id="confMdp" name="confMdp" />
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
