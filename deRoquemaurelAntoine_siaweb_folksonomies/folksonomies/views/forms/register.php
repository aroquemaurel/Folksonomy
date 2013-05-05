<form method="post" action="register.php" id="postAddDocument" class="form-horizontal">
    <fieldset>
        <legend style="text-align: center">Inscription</legend>
	<div class="addDocument">
        <div class="control-group">
            <label class="control-label" for="pseudo">Pseudo</label>
            <div class="controls">
                <input type="text" class="input-large" style="height:25px;" id="pseudo" name="pseudo" required />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="email">Adresse e-mail</label>
            <div class="controls">
                <input class="input-large" style="height:25px;" type="email" id="email" name="email" required />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="mdp">Mot de passe</label>
            <div class="controls">
                <input type="password" class="input-large" style="height:25px;" id="mdp" name="mdp" required/>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="confMdp">Confirmation</label>
            <div class="controls">
                <input type="password" class="input-large" style="height:25px;" id="confMdp" name="confMdp" required />
            </div>
            <div class="alert alert-error hide alertsForms" id="confMdpAlert" >
                <h4 class="alert-heading">Erreur !</h4>
					Les deux mots de passes sont différents
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
            if($('#mdp').val() != $('#confMdp').val()) {
                $("#confMdpAlert").show("slow");
                retour = false;
            }

            return retour;
        });
    });</script>

</form>
