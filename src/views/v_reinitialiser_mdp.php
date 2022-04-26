
<h2>Réinitialisation du mot de passe</h2>

<form method="POST" action="reinitialiser_mdp_verif">

	<div id='message_erreur_form_creation' class="col-md-12 form-group">

		<?php if (isset($erreur['form_reinitialiser_mdp']['erreur'])): ?>
			<h3>&#x26A0 Erreur</h3>
			<div class="alert alert-danger" role="alert">
				<ul> <?php foreach ($erreur['form_reinitialiser_mdp']['erreur'] as $erreur): ?>
					<li> <?php echo $erreur; ?>
					</li> <?php endforeach;?>
	 	       </ul>
     	   </div>
		<?php endif;?>
	</div>

	<p>
		<label for="login">Login*</label>
   	 	<input id="login" type="text" name="login"  size="30" maxlength="45">
	</p>

	<p>
		<label for="email">Adresse e-mail associée*</label>
		<input id="email"  type="text"  name="email" size="30" maxlength="45">
	</p>

	<p>
	<strong>IMPORTANT :</strong> un mot de passe aléatoire vous sera envoyé sur votre adresse e-mail en cas de concordance.
	Pensez à consulter votre votre dossier spam.
	</p>

	<p>
        <input type="submit" value="Réinitialiser" name="reinitialiser">
        <input type="reset" value="Effacer" name="effacer">
    </p>

</form>

