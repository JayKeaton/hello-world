<link href="static/signin/signin.css" rel="stylesheet" type="text/css">
<div id='signin'>
	<h1 id="titreConnexion">Connexion :</h1>
	<form action="" method="post" id="conn">
		<?php echo((empty($erreur_verification)) ? "" : "<h3>".$erreur_verification."</h3>"); ?>
		<div>
			<h4>Email :</h4>
			<?php $form_login->echoInput('email'); ?>
		</div>
		<div>
		  	<h4>Mot de passe :</h4>
            <?php $form_login->echoInput('mdp'); ?>
		</div>
		<div>
            <?php $form_login->submit("Se connecter"); ?>
		</div>
		<p>
			Pas encore inscrit ?
			<a href=<?php echo(SOUS_DOMAINE."?page=signup"); ?> >Inscrivez-vous</a>
			<br/>
			<a href="#" style="font-size: 12px">Mot de passe oublié?</a><!--code css pour afficher la phrase en plus petit-->
		</p>
	</form>
</div>