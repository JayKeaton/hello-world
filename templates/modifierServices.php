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
		<?php $form_idService->echoInput("idService"); ?>



		
		
		<input type="submit" value="choisissez votre service" id="submit" />


	</form>

	
	</script>
		<form method="post" action="" enctype="multipart/form-data">
		<fieldset>
	<legend>Contact</legend>
			<input type="hidden" name="idService" value="<?php echo(empty($idService) ? "" : $idService); ?>" />
			<label>Nom:</br>
				<?php $form_modifierService->echoInput('nom'); ?>
			</label>
				</br>
			<label>Email:</br>
				<?php $form_modifierService->echoInput('email'); ?>
				<!--<input type="email" id="email" name="email" value="<?php echo($donnees['email']) ?>" placeholder="" required="required" />-->
			</label>
				</br>
			<label>Adresse:
				<input type="text" id="adresse" name="adresse" value="<?php foreach ($dataServicesUtilisateur as $value) {
					if($value[0]==$idService){
						echo($value[5]);

					}
				}
				?>" placeholder="" required="required" />
			</label></br>
			<label>Telephone:</br>
				<?php $form_modifierService->echoInput('telephone'); ?>
-			</label>
			</br>
			<label>Lien de votre site Internet:
			<?php $form_modifierService->echoInput('lien_site'); ?>
				<!--<input type="text" id="lien_site" name="lien_site" value="<?php echo($donnees['lien_site']) ?>" placeholder="" required="required" />-->
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
			<textarea id="texte" name="texte"  ><?php 
			foreach ($dataDescription as $ligneDescription) {
				if($ligneDescription[2]=='fr'){
					echo($ligneDescription[1]);
				}
			} ?></textarea>
			</label>
			</fieldset>

			

			<input type="submit" value="Modifier" id="submit" />


		</form>

		<form method="post" action="" >


		<?php
		?>



		

	</body>
	

</html>





