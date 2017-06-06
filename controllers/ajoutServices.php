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
			$id2 = ajouterDescriptionService($bdd, $texte, $langue, $idService);

			require_once("models/image.php");
   			$result = traitementUploadImage('imageService', "media/imageService", $idService);
   			$adresseImage=$result[1];
   			ajouterAdresseImage($bdd,$adresseImage,$idService);
			

   			/*echo($result[1]); renvoie le nom de l'image*/

   			/*move_uploaded_file("imageService", "media/imageService");*/
    		/*if ($result[0] == false){
       		 $erreur['imageService'] = $result[1];
   			 }*/
			
    		/*else{
        	modifierImageService($idService, $result[1]);
        	header("Location: ");
        	exit();
    }*/

		
			include("templates/validation.html");
		}
		
	else {
		include("templates/ajoutServices.php");
	}

?>
