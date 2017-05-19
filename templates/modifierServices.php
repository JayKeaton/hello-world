<!doctype html>
<html>
	<head>

		<meta charset="utf-8">
		<title>Modifier Services</title>
	</head>

	<body>
		<p>lol</p>
		<?php
		foreach ($data as $element => $value) {
		?>
		<option> mettre le nom</option>
		<?php
		}
		?>
		
		<input type="email" id="email" name="email" value="<?php echo($data[0]['mail']) ?>" placeholder="" required="required" /></br>
		
		






		
		<input type="categorie" id="categorie" name="categorie" value="<?php echo($data[0]['categorie']) ?>" placeholder="" required="required" /></br>
		<input type="telephone" id="telephone" name="telephone" value="<?php echo($data[0]['telephone']) ?>" placeholder="" required="required" /></br>
		<input type="lien_Site" id="lien_Site" name="lien_Site" value="<?php echo($data[0]['lien_site']) ?>" placeholder="" required="required" /></br>

		

	</body>
	

</html>





