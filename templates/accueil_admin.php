<!DOCTYPE html>
	<html>
		<head>
			<meta charset="utf-8" />
			<link href="static/accueil_admin/acceuil_admin.css" rel="stylesheet" type="text/css">
		</head>

		<p id="titre">
			Bienvenue chers administrateurs
		</p>

		<body>
			<form action="" method="post" id="recherche">
				<a id="recherche1">
					<div><!--la petite case pour le nom du service-->
						<label for="nomService">nom du service :</label>
						<input type="text" id="nomService" name="nomService" />
					</div>
					<div><!--la petite case pour le type du service-->
						type de service :
      		  			<select name="typeService">
    						<option value="" selected>...</option>
    						<option value="nourriture">Nourriture</option>
    						<option value="logement">Logement</option>
    						<option value="Formalités administrative">Formalités administrative</option>
    						<option value="accompagnement médical">Accompagnement médical</option>
    					</select>

    		</select>
   					</div>
   					<div> <!-- la petite case pour l adresse -->
      		  			<label for="adresse">adresse :</label>
      		  			<input type="text" id="adresse" name="adresse"/>
   					</div>
   				</a>
   				<b id="recherche2">
   					<input type="checkbox" name="tri"> tri par date de la plus ancienne a la plus récente</br>
   					<input type="checkbox" name="dejaValidé"> cacher les services deja validé</br>
   					<input type="checkbox" name="serviceModifié"> montrer les services qui veule être modifié</br>
   				</b>
   				<input type="submit" value="valider" id="valider">
   				
			</form>
		</body>

		<p id="titreRecherche">
			résultat de la recherche (par default de la plus anciènne a la plus récente)
		</p>
		
		<?php
		if(!empty($_POST['typeService']) or !empty($_POST['nomService']) or !empty($_POST['adresse'])){	
			for($i=0;$i<count($data);$i++){
    			$contenu='<p class="servicesData"> nom du service :'
				.$data[$i]['nom'].
    			'</br> description :'.$data[$i]['texte']. 
    			'</br> <a href=" ">Voir l’annonce</a></p>' ;

			echo $contenu;

		}
}

		?> 
		
		<form action="" method="post" id="page">
			<div>	<!--la petite case pour la page -->
						<label for="page">page :</label>
						<input type="text" id="page" name="page" />
			</div>
				<input type="submit" value="valider">
		</form>

<html>
