
<h2>Modification du mot de passe</h2>

<form method="POST" action="modifier_mdp_verif">

	<div id='message_erreur_form_creation' class="col-md-12 form-group">

		<?php if (isset($erreur['form_modifier_mdp']['erreur'])): ?>
			<h3>&#x26A0 Erreur</h3>
			<div class="alert alert-danger" role="alert">
				<ul> <?php foreach ($erreur['form_modifier_mdp']['erreur'] as $erreur): ?>
					<li> <?php echo $erreur; ?>
					</li> <?php endforeach;?>
	 	       </ul>
     	   </div>
		<?php endif;?>
	</div>

	<p>
		<label for="mdpnew">Nouveau mot de passe*</label>
   	 	<input id="mdpnew" type="password" name="mdpnew"  size="30" maxlength="45">
	</p>

	<p>
		<label for="mdp">Répéter le mot de passe*</label>
		<input id="mdp"  type="password"  name="mdp" size="30" maxlength="45">
	</p>

	<p>
        <input type="submit" value="Valider" name="valider">
        <input type="reset" value="Effacer" name="effacer">
    </p>
</form>

