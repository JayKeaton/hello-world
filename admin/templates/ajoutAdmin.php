<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>ajoutAdmin</title>
		<link href="static/ajoutAdmin/style.css" rel="stylesheet" type="text/css">
	</head>

	<body>

		<h1>Ajout d'un administrateur</h1>
		
		<p>Nous vous proposons ici de pouvoir lier une adresse mail à un compte administrateur. Si cette personne est déjà inscrite elle recevra un mail confirmant qu'elle est administrateur. Si elle n'est pas inscrite, elle recevra un mail pour s'inscrire</p>
		
		<p>Vous devez confirmer l'ajout de cet administrateur en rentrant votre mot de passe</p>
		</br>
		
		<div id="block">
			<form method="post" action="" id="formulaireAdmin">
				<h3>Email :</h3>
                <input type="email" id="email" name="email" value="<?php echo((empty($_POST['email'])) ? "" : $_POST['email']); ?>" placeholder="example@email.fr" required="required" />
				</br>
				<h3>Votre mot de passe :</h3>
				<input type="password" id="mdp" name="mdp" value="" placeholder="" required="required" />
				</br>
				</br>
					

		</div>
		<input type="submit" name="submit" value="Ajouter ce mail" id="submit" />
	</body>
</html>
