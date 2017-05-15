<?php

     
	if (!empty($_POST["email"])){
			$email=$_POST["email"];
			$adresse=$_POST["adresse"];
			$phone=($_POST["phone"]);
			$website=($_POST["website"]);
			$categorie=($_POST["categorie"]);
			$ids = ajouterService($bdd, $email, $adresse, $phone, $website, $categorie);
		
			include("templates/validation.html");
		}
		
	else {
		include("templates/ajoutServices.php");
	}

?>
