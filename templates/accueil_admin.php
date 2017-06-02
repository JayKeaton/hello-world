<!DOCTYPE html>
	<html>
		<head>
			<meta charset="utf-8" />
			<link href="static/accueil_admin/acceuil_admin.css" rel="stylesheet" type="text/css">
		</head>
		
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
				if($data[$i]['validation']=0){
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
			for($i=1; $i<=$nombreDePages; $i++) 
				{
     				if($i==$pageActuelle)
     					{
        					 echo ' [ '.$i.' ] '; 
     					}	
     				else
    				 	{
          		echo ' <a href="accueil_admin.php?page='.$i.'">'.$i.'</a> ';
     			}
}
echo '</p>';
}
		?> 
	</div>
	
	<div id="actualite">
		<?php
		global $bdd;
		$fileActu=$bdd ->prepare("SELECT nom,texte,validation FROM descriptions JOIN services ON descriptions.idService = services.idService Group By dateAjout");
		$fileActu->execute();
		$actuTrier=$fileActu-> fetchAll();
		$valide2 = null;
		for($i=0; $i<=10; $i++){
				if($actuTrier[$i]['validation']=0){
					$valide2 = '<a class="rouge"> non validé</a>';
				}
				else{
					$valide2 = '<a class="vert"> validé</a>';
				}
     				$contenu2='<p class="servicesData"> nom du service :'
					.$actuTrier[$i]['nom'].
    				'</br> description :'.$actuTrier[$i]['texte'].$valide2.
    				'</br> <a href=" ">Voir l’annonce</a></p>' ;

				echo $contenu2;
     			}
		
		?>
	</div>
</html>
