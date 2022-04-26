
<h2>Identification utilisateur</h2>

<form method="POST" action="login">

	<div id='message_erreur_form_creation' class="col-md-12 form-group">

		<?php if (isset($erreur['form_login']['erreur'])): ?>
			<h3>&#x26A0 Erreur</h3>
			<div class="alert alert-danger" role="alert">
				<ul> <?php foreach ($erreur['form_login']['erreur'] as $erreur): ?>
					<li> <?php echo $erreur; ?>
					</li> <?php endforeach;?>
	 	       </ul>
     	   </div>
		<?php endif;?>
	</div>

	<p>
		<label for="nom">Login*</label>
   	 	<input id="login" type="text" name="login"  size="30" maxlength="45" value="<?php echo ($saisie['form_login']['login']) ?? null; ?>">
	</p>

	<p>
		<label for="mdp">Mot de passe*</label>
		<input id="mdp"  type="password"  name="mdp" size="30" maxlength="45">
	</p>

	<p>
        <input type="submit" value="Valider" name="valider">
        <input type="reset" value="Effacer" name="effacer">
    </p>
</form>

<a href="reinitialiser_mdp">J'ai oublié mon mot de passe</a>

