<!DOCTYPE html>
	<html>
		<head>
			<meta charset="utf-8" />
			<link href="static/accueil_admin/acceuil_admin.css" rel="stylesheet" type="text/css">
		</head>
		
		<div id="placement">
		
		<div id="actualite">
		<p id="petitTitre"> Dernière annonce non validé </p>
		<?php
		global $bdd;
		$fileActu=$bdd ->prepare("SELECT nom,texte,validation FROM descriptions JOIN services ON descriptions.idService = services.idService where services.validation = 1 ORDER By dateAjout");
		$fileActu->execute();
		$actuTrier=$fileActu-> fetchAll();
		$valide2 = null;
		$taille=count($actuTrier);
		if($taille>=10){
		for($i=0; $i<10; $i++){
				if($actuTrier[$i]['validation']=1){
					$valide2 = '<a class="rouge"> non validé</a>';
				}
				else{
					$valide2 = '<a class="vert"> validé</a>';
				}
     				$contenu2='<p class="actuData"> nom du service :'
					.$actuTrier[$i]['nom'].
    				'</br> description :'.$actuTrier[$i]['texte'].$valide2.
    				'</br> <a href=" ">Voir l’annonce</a></p>' ;

				echo $contenu2;
     			}
     	}
     	else if($taille==0){
     		$contenu2='<p class="actuData"> Il n y a pas de nouvelle donnée
    				</p>' ;
    		echo $contenu2;
     	
     	}
     	else {for($i=0; $i<$taille; $i++){
				if($actuTrier[$i]['validation']==1){
					$valide2 = '<a class="rouge"> non validé</a>';
				}
				else{
					$valide2 = '<a class="vert"> validé</a>';
				}
     				$contenu2='<p class="actuData"> nom du service :'
					.$actuTrier[$i]['nom'].
    				'</br> description :'.$actuTrier[$i]['texte'].$valide2.
    				'</br> <a href=" ">Voir l’annonce</a></p>' ;

				echo $contenu2;
     			}
     	}
		
			?>
		</div>
		
		<div id="accueilAdmin">
		
		<p id="titre">
			Bienvenue chers administrateurs
		</p>

			<form action="" method="post" id="recherche">
				<div id="recherche_div">
					<div id="recherche1">
						<div><!--la petite case pour le nom du service-->
							<label for="nomService">nom du service :</label>
							<input type="text" id="nomService" name="nomService" value="<?php echo(empty($_POST['nomService']) ? "" : $_POST['nomService']); ?>" />
						</div>
						<div><!--la petite case pour le type du service-->
							type de service :
      		  				<select name="typeService">
    							<option value="" <?php echo(empty($_POST['typeService']) ? 'selected' : ''); ?> >...</option>
    							<option value="nourriture" <?php echo((!empty($_POST['typeService']) && $_POST['typeService'] == 'nourriture') ? 'selected' : ''); ?>>Nourriture</option>
    							<option value="logement" <?php echo((!empty($_POST['typeService']) && $_POST['typeService'] == 'logement') ? 'selected' : ''); ?>>Logement</option>
    							<option value="Formalités administrative" <?php echo((!empty($_POST['typeService']) && $_POST['typeService'] == 'Formalités administrative') ? 'selected' : ''); ?>>Formalités administrative</option>
    							<option value="accompagnement médical" <?php echo((!empty($_POST['typeService']) && $_POST['typeService'] == 'accompagnement médical') ? 'selected' : ''); ?>>Accompagnement médical</option>
    						</select>
    					
   						</div>
   						<div> <!-- la petite case pour l adresse -->
      		  				<label for="adresse">adresse :</label>
      		  				<input type="text" id="adresse" name="adresse" value="<?php echo(empty($_POST['adresse']) ? "" : $_POST['adresse']); ?>"/>
   						</div>
   						<input type="checkbox" name="dejaValide"<?php echo(empty($_POST['dejaValide']) ? "" : "checked='checked'"); ?>> cacher les services deja validé</br>
   					</div>
   					<div id="recherche2">
   					</div>
   				</div>
   				<input type="submit" value="valider" id="valider" />
   				
			</form>
		

		<p id="titreRecherche">
			résultat de la recherche (par default de la plus ancienne a la plus récente)
		</p>
		
		<div class="div_servicesData">
		<?php
		if(!empty($_POST['typeService']) or !empty($_POST['nomService']) or !empty($_POST['adresse']) or !empty($_POST['dejaValide'])){	
			for($i=0;$i<count($data);$i++){
				$valide = null;
				if($data[$i]['validation']==1){
					$valide = '<a class="rouge"> non validé</a>';
				}
				else{
					$valide = '<a class="vert"> validé</a>';
				}
    			$contenu='<p class="servicesData"> nom du service :'
				.$data[$i]['nom'].
    			'</br> description :'.$data[$i]['texte'].$valide.
    			'</br> <a href=" ">Voir l’annonce</a></p>' ;

			echo $contenu;

		}
		echo '<p align="center">Page : '; 
			for($j=1; $j<=$nombreDePages; $j++) 
				{
     				if($j==$pageActuelle)
     					{
        					 echo ' [ '.$j.' ] '; 
     					}	
     				else
    				 	{
          		echo ' <a href=SOUS_DOMAINE."/?page=accueil_admin&page2='.$j.'">'.$j.'</a> ';
     				}
				}
				echo '</p>';
				}
		?> 
	</div>
	</div>
	
	
	</div>
</html>
