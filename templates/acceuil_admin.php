<!DOCTYPE html>
	<html>
		<head>
			<meta charset="utf-8" />
			<link href="static/acceuil_admin/acceuil_admin.css" rel="stylesheet" type="text/css">
		</head>

		<p id="titre">
			Bienvenu chers administrateurs
		</P>

		<body>
			<form action="" method="post" id="recherche">
				<a>
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
   					<div> <!-- la petite case pour l arrondissement -->
      		  			<label for="arrondissement">arrondissement:</label>
      		  			<input type="text" id="arrondissement" name="arrondissement"/>
   					</div>
   				</a>
   				<b>
   					<input type="checkbox" name="tri"> tri par date de la plus ancienne a la plus récente</br>
   					<input type="checkbox" name="dejaValidé"> cacher les services deja validé</br>
   					<input type="checkbox" name="serviceModifié"> montrer les service qui veule être modifié</br>
   				</b>
   				<input type="submit" value="valider">
   				
			</form>
		</body>

		<p id="titreRecherche">
			résultat de la recherche (par default de la plus anciènne a la plus récente)
		</P>

	<html>