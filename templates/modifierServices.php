<!doctype html>
<html>
	<head>

		<meta charset="utf-8">
		<title>Modifier Services</title>
	</head>

	<body>
	<h1>Choisissez votre service a modifier</h1>

	<form method="post" action="" >

		<select name="idService" id="idService">
			<?php
				$donnees = null;
				foreach ($data as $value) {

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
		<form method="post" action="">
			<label>Nom:
				<input type="text" id="nom" name="nom" value="<?php echo($donnees['nom']) ?>" placeholder="" required="required" />
			</label></br>
			<label>Email
				<input type="email" id="email" name="email" value="<?php echo($donnees['email']) ?>" placeholder="" required="required" />
			</label></br>
			<label>Adresse:
				<input type="adresse" id="adresse" name="adresse" value="<?php echo($donnees['adresse']) ?>" placeholder="" required="required" />
			</label></br>
		
		
		</br>

		
		






		
			<label>Categorie:
				<input type="text" id="categorie" name="categorie" value="<?php echo($donnees['categorie']) ?>" placeholder="" required="required" />
			</label></br>
			<label>Telephone
				<input type="phone" id="telephone" name="telephone" value="<?php echo($donnees['telephone']) ?>" placeholder="" required="required" />
			</label></br>
			<label>Lien de votre site Internet:
				<input type="" id="lien_site" name="lien_site" value="<?php echo($donnees['lien_site']) ?>" placeholder="" required="required" />
			</label></br>

			<input type="submit" value="Modifier" id="submit" />


		</form>

		

	</body>
	

</html>





