<link href="static/signin/signin.css" rel="stylesheet" type="text/css">
<div id='signin'>
	<h1 id="titreConnexion">Connexion :</h1>
	<form action="" method="post" id="conn">
		<?php echo((empty($erreur_verification)) ? "" : "<h3>".$erreur_verification."</h3>"); ?>
		<div><!--la petite case pour le login-->
			<h4>Email :</h4>
			<input type="text" id="identifiant" name="identifiant" required='required'/>
			<?php echo((empty($erreur_utilisateur)) ? "" : "<p>".$erreur_utilisateur."</p>"); ?>
		</div>
		<div><!--la petite case pour le MDP-->
		  	<h4>Mot de passe :</h4>
		  	<input type="password" id="mdp" name="mdp" required='required'/>
		  	<?php echo((empty($erreur_mdp)) ? "" : "<p>".$erreur_mdp."</p>"); ?>
		</div>
		<div>
			<input type="submit" value="valider"> 
		</div>
		<p>
			Nouveau contributeur ? 
			<a href=<?php echo(SOUS_DOMAINE."/?page=signup"); ?> >Inscrivez-vous</a>
			<br/>
			<a href="adresse ou fichiers dans le dossier" style="font-family: Verdana,'Arial', 'Arial Black','Times New Roman';font-size: 12px">Mot de passe oublié?</a><!--code css pour afficher la phrase en plus petit-->
		</p>
	</form>
</div>