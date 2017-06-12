<!doctype html>
<html>
	<head>

		<meta charset="utf-8">
		<link rel="stylesheet" href="static/modifierService/modifierService.css"/>
		<title>Modifier Services</title>
	</head>

	<body>
	<h1>Choisissez votre service a modifier</h1>

	<form method="post" action="" >


		<select name="idService" id="idService">
			<?php                  /*mettre ca dans le formulaire*/
				$donnees = null;
				foreach ($dataServicesUtilisateur as $value) {

			?>
			<option value="<?php echo $value['idService'] ; ?>" <?php
					if ($value['idService']==$idService){
						$donnees = $value;
						echo("selected='selected'");
					} ?> 
			/>
			<?php 
				echo($value['nom']);
			?>
			</option>

		<?php
		}
		?>
		</select>
		
		<input type="submit" value="choisissez votre service" id="submit" />


	</form>

	
	</script>
		<form method="post" action="" enctype="multipart/form-data">
		<fieldset>
	<legend>Contact</legend>
			<label>Nom:</br>
				<input type="text" id="nom" name="nom" value="<?php echo($donnees['nom']) ?>" placeholder="" required="required" />
			</label>
				</br>
			<label>Email:</br>
				<input type="email" id="email" name="email" value="<?php echo($donnees['email']) ?>" placeholder="" required="required" />
			</label>
				</br>
			<label>Adresse:
				<input type="text" id="adresse" name="adresse" value="<?php echo($donnees['adresse']) ?>" placeholder="" required="required" />
			</label></br>
			<label>Telephone:
				<input type="text" id="telephone" name="telephone" value="<?php echo($donnees['telephone']) ?>" placeholder="" required="required" />
			</label>
			</br>
			<label>Lien de votre site Internet:
				<input type="text" id="lien_site" name="lien_site" value="<?php echo($donnees['lien_site']) ?>" placeholder="" required="required" />
			</label>
		
		</fieldset>
		</br>
		<fieldset>
		<legend>Image :</legend>
    <div>
        <img src="<?php echo("media/imageService/".$donnees['adresseImage']); ?>" height="150" width="150" />
        <input type="file" name="avatar" id="avatar"/>
        <?php echo((empty($erreur['avatar']) ? "" : "<p>".$erreur['avatar']."</p><br/>")); ?>
    </div>
    </fieldset>
    

		
		






		
			 <fieldset>

        	<legend>Catégorie</legend>
            	<?php $form_modifierService->echoInput("categorie"); ?>

        		<!--<textarea id="categorie" name="categorie" value="<?php/* echo((empty($_POST['categorie'])) ? "" : $_POST['categorie']);*/ ?>" placeholder="Entrez votre categorie ici"></textarea>-->

        	</fieldset>
			</br>
			<fieldset>

        	<legend>Description</legend>
			<Label>Langue
        	<?php $form_modifierService->echoInput("langue"); ?>
     	</Label>
			<!--<select name="descriptions" id="descriptions">
				<?php /*
					foreach ($dataDescription as $valueDescription) {
				?>
			<option valueDescription="
				<?php echo $valueDescription['idDescription'] ; ?>"
				 <?php
					if ($valueDescription['idDescription']==$idDescription){
						$donnees = $valueDescription;
						echo("selected='selected'");
					} ?> 
			/>
			<?php 
				echo($valueDescription['langue']);
			*/?>-->
			</br>
			<label>Description:
			 <textarea id="texte" name="texte" value="<?php echo($dataDescription); ?>" ></textarea></label>
			 </fieldset>
			

			<input type="submit" value="Modifier" id="submit" />


		</form>

		<form method="post" action="" >


		<?php
		?>



		

	</body>
	

</html>





