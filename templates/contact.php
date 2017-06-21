<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Contact</title>
		<link href="static/signup/style.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		
		<h1 id="title">Veuillez renseigner vos informations pour nous contacter</h1>
		<h4 id="titlebis">Chez SoliLink, nous prenons à coeur la sécurité de vos données, et les données que vous entrez ne peuvent être utilisées que par nous, afin de garantir une meilleure utilisation de nos services.</h4>

		<article id="inscription">
			<form method="post" action="" id="formulaireContact">
				<div>
					<h2>Utilisateur</h2>
					<div>
						<div>
							<h5>
								Email: <span class="required">*</span>
							</h5>
							<input type="email" id="email" name="email" value="<?php echo((empty($_POST['email'])) ? "" : $_POST['email']); ?>" placeholder="example@email.fr" required="required" />
							<?php echo((empty($erreur['email'])) ? "" : "<p style='color: red;'>".$erreur['email']."</p>"); ?>
						</div>
					</div>
				</div>

				<div>
					<h2>Informations personnelles</h2>
					<div>
						<div>
							<h5>
								Prenom: <span class="required">*</span>
							</h5>
							<input type="text" id="prenom" name="prenom" placeholder="Votre prénom" value="<?php echo((empty($_POST['prenom'])) ? "" : $_POST['prenom']); ?>" required="required" />
							<?php echo((empty($erreur['prenom'])) ? "" : "<p style='color: red;'>".$erreur['prenom']."</p>"); ?>
						</div>
						<div>
							<h5>
								Nom: <span class="required">*</span>
							</h5>
							<input type="text" id="Nom" name="nom" value="<?php echo((empty($_POST['nom'])) ? "" : $_POST['nom']); ?>" placeholder="Votre nom" required="required" autofocus />
							<?php echo((empty($erreur['nom'])) ? "" : "<p style='color: red;'>".$erreur['nom']."</p>"); ?>
						</div>
					</div>
				</div>

				<div>
					<h2>Contact</h2>
					<div>
						<div>
							<h5>Numéro de téléphone:</h5>
							<input type="tel" id="telephone" name="telephone" placeholder="01 40 21 29 29" value="<?php echo((empty($_POST['telephone'])) ? "" : $_POST['telephone']); ?>" />
							<?php echo((empty($erreur['telephone'])) ? "" : "<p style='color: red;'>".$erreur['telephone']."</p>"); ?>
						</div>
					</div>
				</div>
				
				<div>
					<h2>Message</h2>
					<div>
						<div>
							<h5>
								Message : <span class="required">*</span>
							</h5>
							<TEXTAREA name="message" id="message" rows=4 cols=40 placeholder="Votre message" ></TEXTAREA>
						</div>	
					</div>
				</div>

				<div id="div_submit">
					<input type="submit" name="submit" value="Envoyer !" id="submit" />
				</div>
			</form>
		</article>

		<div id="google_translate_element"></div><script type="text/javascript">
		function googleTranslateElementInit() {
		  new google.translate.TranslateElement({pageLanguage: 'fr', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, autoDisplay: false, multilanguagePage: true}, 'google_translate_element');
		}
		</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
	
	</body>
</html>
