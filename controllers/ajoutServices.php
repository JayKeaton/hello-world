<?php

     
	if (!empty($_POST["email"])){
			$email=$_POST["email"];
			$adresse=$_POST["adresse"];
			$phone=($_POST["phone"]);
			$website=($_POST["website"]);
			$categorie=($_POST["categorie"]);
			$nom=($_POST["nom"]);
			$texte=($_POST["texte"]);
			$langue=($_POST["langue"]);
			$ids = ajouterService($bdd, $email, $adresse, $phone, $website, $categorie);
			$id2 = ajouterDescriptionService($bdd, $nom, $texte, $langue, $ids );

			include("templates/validation.html");
		}
		
	else {

		include("templates/ajoutServices.php");
	}

?>
