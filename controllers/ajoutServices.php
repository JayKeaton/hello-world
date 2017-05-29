<?php

     
	if (!empty($_POST["email"])){
			$email=$_POST["email"];
			$adresse=$_POST["adresse"];
			

			$telephone=($_POST["telephone"]);
			$lien_site=($_POST["lien_site"]);
			$categorie=($_POST["categorie"]);
			$nom=($_POST["nom"]);
			$texte=($_POST["texte"]);
			$langue=($_POST["langue"]);
			$codePostal=($_POST["codePostal"]);

			$idService = ajouterService($bdd, $email, $adresse, $codePostal, $telephone, $lien_site, $categorie, $_SESSION['idUtilisateur'],$nom);
			$id2 = ajouterDescriptionService($bdd, $texte, $langue, $idService );
		
			include("templates/validation.html");
		}
		
	else {
		include("templates/ajoutServices.php");
	}

?>
