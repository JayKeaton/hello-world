<?php


ob_start();
?>
<link href="static/signin/signin.css" rel="stylesheet" type="text/css">
<div id='signin'>
	<form action="" method="post" id="conn">
		<div><!--la petite case pour le login-->
			<label for="identifiant">Email :</label>
			<input type="text" id="identifiant" name="identifiant" />
		</div>
		<div><!--la petite case pour le MDP-->
		  		<label for="mdp">Mot de passe :</label>
		  		<input type="text" id="mdp" name="mdp"/>
			</div>
				<input type="submit" value="valider"> 
			<p>
				Nouveau contributeur ? <a href="/?page=signup">Inscrivez-vous</a><br/>
			<a href="adresse ou fichiers dans le dossier" style="font-family: Verdana,'Arial', 'Arial Black','Times New Roman';font-size: 12px">Mot de passe oublié?</a><!--code css pour afficher la phrase en plus petit-->
		</p>
	</form>
</div>
<?php
$contenu = ob_get_clean();
include("gabarit.php");



