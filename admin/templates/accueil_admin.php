
		<head>
			<meta charset="utf-8" />
			<link href="static/accueil_admin/acceuil_admin.css" rel="stylesheet" type="text/css">
		</head>

		<div id="placement">

		<div id="actualite">
		<p id="petitTitre"> Dernière annonce non validé </p>
		<?php
		global $bdd;
		$fileActu=$bdd ->prepare("SELECT descriptions.idService as idService,nom,texte,validation FROM descriptions JOIN services ON descriptions.idService = services.idService where services.validation = 0 ORDER By dateAjout");
		$fileActu->execute();
		$actuTrier=$fileActu-> fetchAll();
		$valide2 = null;
		$taille=count($actuTrier);
		if($taille>=10){
		for($i=0; $i<10; $i++){
				if($actuTrier[$i]['validation']==0){
					$valide2 = '<a class="rouge"> non validé</a>';
				}
				else{
					$valide2 = '<a class="vert"> validé</a>';
				}
     				$contenu2='<p class="actuData"> nom du service :'
					.$actuTrier[$i]['nom'].
    				'</br> description :'.$actuTrier[$i]['texte'].'</br>'.$valide2.
    				'</br> <a href="'.SOUS_DOMAINE.'?page=descriptionService&idService='.$actuTrier[$i]['idService'].'">Voir l’annonce</a></p>' ;

				echo $contenu2;
     			}
     	}
     	else if($taille==0){
     		$contenu2='<p class="actuData"> Il n y a pas de nouvelle donnée
    				</p>' ;
    		echo $contenu2;

     	}
     	else {for($i=0; $i<$taille; $i++){
				if($actuTrier[$i]['validation']==0){
					$valide2 = '<a class="rouge"> non validé</a>';
				}
				else{
					$valide2 = '<a class="vert"> validé</a>';
				}
     				$contenu2='<p class="actuData"> nom du service :'
					.$actuTrier[$i]['nom'].
    				'</br> description :'.$actuTrier[$i]['texte'].$valide2.
    				'</br> <a href="'.SOUS_DOMAINE.'?page=descriptionService&idService='.$actuTrier[$i]['idService'].'">Voir l’annonce</a></p>' ;

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

						<div id='typeService'> type de service :
						<?php
						$categorie_service->echoInput('typeService');

						?>
						</div>
   						<div> <!-- la petite case pour l adresse -->
      		  				<label for="adresse">adresse :</label>
      		  				<input type="text" id="adresse" name="adresse" value="<?php echo(empty($_POST['adresse']) ? "" : $_POST['adresse']); ?>"/>
   						</div>
   						<input type="checkbox" name="dejaValide"<?php echo(empty($_POST['dejaValide']) ? "" : "checked='checked'"); ?>> cacher les services deja validé</br>
   					</div>
   				</div>
   				<?php $categorie_service->submit('Valider'); ?>

			</form>


		<p id="titreRecherche">
			résultat de la recherche (par default de la plus ancienne a la plus récente)
		</p>

		<div class="div_servicesData">
		<?php
		if(!empty($_POST['typeService']) or !empty($_POST['nomService']) or !empty($_POST['adresse']) or !empty($_POST['dejaValide'])){
			for($i=0;$i<$nombreDePages;$i++){
				echo("<div id='page".$i."'>");
				for($j=$i*$messagesParPage;$j<min(count($data),($i+1)*$messagesParPage);$j++){
					$valide = null;
					if($data[$j]['validation']==0){
						$valide = '<a class="rouge"> non validé</a>';
					}
					else{
						$valide = '<a class="vert"> validé</a>';
					}
					if($data[$j]['adresseImage']==null){
						$image = '';
					}
					else{
						$image = '<img src="../media/imageService/'.$data[$j]['adresseImage'].'"class="imageService"/>';
					}
	    			$contenu='<div class="positionData">'.$image.'<p class="servicesData">  nom du service :'
					.$data[$j]['nom'].
	    			'</br> description :'.$data[$j]['texte'].$valide.
	    			'</br> <a href="'.SOUS_DOMAINE_ROOT.'?page=descriptionService&idService='.$data[$i]['idService'].'">Voir l’annonce</a></p></div>' ;

					echo $contenu;

				}
				echo("</div>");
			}
		echo '<p align="center">Page : ';
			for($j=1; $j<=$nombreDePages; $j++)
				{
          		echo '<a href="#" onclick="pagination('.($j-1).');return false">'.$j.'</a> ';
				}
				echo '</p>';
				}
		?>
	</div>
	</div>


	</div>


	<script>
	function pagination(page){
		for (var k = 0; k < <?php echo($nombreDePages); ?>; k++){
			var div = document.getElementById('page' + k);
			if (k == page){
				div.style.display = "";
			}
			else{
				div.style.display = "none";
			}
		}
	}
	pagination(0);
	</script>


</html>
