<?php
   
	

    $form_service = new Formulaire('login');
	  $form_service->add('email', 'email')
    ->required(true);
    
    $form_service->add('text','telephone')
    ->required(true);
    $form_service->add('text','lien_site')
    ->required(true);
    
    $form_service->add('text','nom')
    ->required(true);
    $form_service->add('select','langue')
    ->affecterValeurs($LANGUAGES)
    ->required(true);
    $categorie=recupCategorie($bdd);
    $listeCategorie=array();
    foreach ($categorie as $value) {
      $listeCategorie[$value["traduction"]]=$value["code"];
      
      # code...
    }
    $form_service->add('select','categorie')
    ->affecterValeurs($listeCategorie)
    ->required(true);
    $form_service->add('text','codePostal')
    ->required(true);
   
    
    if ($form_service->isValid()){
    		$data = $form_service->get_cleaned_values();
    		$texte=htmlspecialchars($_POST["texte"]);
			$adresse=htmlspecialchars($_POST["adresse"]);
			$categorie=htmlspecialchars($_POST["categorie"]);

			

			
			


			$idService = ajouterService($bdd, $data['email'], $adresse, $data['codePostal'], $data['telephone'], $data['lien_site'], $data['categorie'], $_SESSION['idUtilisateur'],$data['nom']);
      /*saveGeolocation($idService, $adresse);*/
			$id2 = ajouterDescriptionService($bdd, $texte, $data['langue'], $idService);

			require_once("models/image.php");
   			$result = traitementUploadImage('imageService', "media/imageService", $idService);
   			$adresseImage=$result[1];
   			ajouterAdresseImage($bdd,$adresseImage,$idService);

        /*ajouterService($bdd, $data['email'], $adresse, $data['codePostal'], $data['telephone'], $data['lien_site'], $categorie, $_SESSION['idUtilisateur'],$data['nom']);*/
			

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

		
			include("templates/serviceAjout.html");
		}
		
	else {
		include("templates/ajoutServices.php");
		

	}

?>
