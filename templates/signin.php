<?php


ob_start();
?>
<link href="static/signin/signin.css" rel="stylesheet" type="text/css">
<div id='signin'>
	<h1 id="titreConnexion">Connexion :</h1>
	<form action="" method="post" id="conn">
		<div><!--la petite case pour le login-->
			<h4>Email :</h4>
			<input type="text" id="identifiant" name="identifiant" />
		</div>
		<div><!--la petite case pour le MDP-->
		  	<h4>Mot de passe :</h4>
		  	<input type="text" id="mdp" name="mdp"/>
		</div>
		<div>
			<input type="submit" value="valider"> 
		</div>
		<p>
			Nouveau contributeur ? 
			<a href="/?page=signup">Inscrivez-vous</a>
			<br/>
			<a href="adresse ou fichiers dans le dossier" style="font-family: Verdana,'Arial', 'Arial Black','Times New Roman';font-size: 12px">Mot de passe oublié?</a><!--code css pour afficher la phrase en plus petit-->
		</p>
	</form>
</div>
<?php
$contenu = ob_get_clean();
include("gabarit.php");



