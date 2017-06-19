<?php 
	/*on commence par récupérer le service puis on modifie ce service*/
	/*$_SESSION['idUtilisateur']
	on fait un while ou on parcourt la base de donnée et a chaque fois qu'on trouve un servicecorrespondant a l'idutilisateur on fait un écho de son service pour pouvoir le modifier après..
	une requète sql, on récupère tout les truc de l'idutilisateur, on fait une option de select pour chacun d'entre eux ...
	$req=$bdd->prepare("SELECT * FROM services WHERE idUtilisateur=idUtilisateur");
	$req->execute(array('idUtilisateur'=>$_SESSION['idUtilisateur']));
	$data=$req->fetchall();*/
	/*$req=$bdd->prepare("SELECT * FROM descriptions");
	$rep->execute(array());
	$descriptions=$req->fetchall();*/
	$form_modifierService = new Formulaire('login');
	$form_modifierService->add('email', 'email')
    ->required(true);
    
    $form_modifierService->add('text','telephone')
    ->required(true);
    $form_modifierService->add('text','lien_site')
    ->required(true);
    
    $form_modifierService->add('text','nom')
    ->required(true);
    $liste=array("fr"=>"Francais","En"=>"Anglais","Ar"=>"Arabe","kl"=>"Klingon");
    $form_modifierService->add('select','langue')
    ->affecterValeurs($liste)
    ->required(true);
    $categorie=recupCategorie($bdd);
    $listeCategorie=array();
    foreach ($categorie as $value) {
      $listeCategorie[$value["traduction"]]=$value["code"];
      
      # code...
    }
    $form_modifierService->add('select','categorie')
    ->affecterValeurs($listeCategorie)
    ->required(true);
    $form_modifierService->add('text','codePostal')
    ->required(true);
	$idService=1;
	$idDescription=0;
	if (!empty($_POST['idService'])){
		$idService=$_POST['idService'];
	}


	 if ($form_modifierService->isValid()){
    		$data = $form_service->get_cleaned_values();
    		$texte=($_POST["texte"]);
			$adresse=($_POST["adresse"]);
			$categorie=($_POST["categorie"]);
		
		$idService=$_POST["idService"];
		$idService=modifierService($bdd, $data['nom'], $data['email'], $adresse, $data['telephone'],$data['lien_site'], $data['categorie'], $idService);
		/*saveGeolocation($idService, $adresse);*/
	}


  	 


	$idUtilisateur=$_SESSION['idUtilisateur'];
	$dataServicesUtilisateur=recupServicesUtilisateur($_SESSION['idUtilisateur'],$bdd);
	$dataDescription=recupDescriptionService($idService,$bdd);
	$n=0;
	
	
	

	/*foreach ($data as $element => $value) {

		html? il faut modifier
		# code...
	}*/
	include("templates/modifierServices.php");
?>

