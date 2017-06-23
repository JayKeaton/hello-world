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
	$dataServicesUtilisateur=recupServicesUtilisateur($_SESSION['idUtilisateur'],$bdd);
	$n=0;
    $idService=0;
    $form_modifierService = new Formulaire('login');
    $form_idService = new Formulaire('login');
     foreach ($dataServicesUtilisateur as $value) {
        $listeService[$value["idService"]]=$value["nom"];
    }

    $form_idService->add('select','idService')
    ->affecterValeurs($listeService)
    

    ->required(true);
    if ($form_idService->isValid()){
        $idService = $form_idService->get_cleaned_values();
        if(empty($idService['idService'])){
            
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
            /*->value($dataDescription[0][2])
            ->required(true);
            $listeService=array();
   
            $allCategorie=recupCategorie($bdd);
            $listeCategorie=array();
            foreach ($allCategorie as $value) {
                $listeCategorie[$value["traduction"]]=$value["code"];
            }
            $form_modifierService->add('select','categorie')
            ->affecterValeurs($listeCategorie)
            ->value($dataServicesUtilisateur[6])
            ->required(true);

    
            $form_modifierService->add('text','codePostal')
            ->required(true);
            
        }
        if(!empty($idService['idService'])){

            
            $form_modifierService->add('email', 'email')
            ->value($dataServicesUtilisateur[$idService['idService']][8])
            ->required(true);

    
            $form_modifierService->add('text','telephone')
            ->value($dataServicesUtilisateur[$idService['idService']][7])
            ->required(true);
            $form_modifierService->add('text','lien_site')
            ->value($dataServicesUtilisateur[$idService['idService']][9])
            ->required(true);
    
            $form_modifierService->add('text','nom')
            ->value($dataServicesUtilisateur[$idService['idService']][2])
    
            ->required(true);
            $liste=array("fr"=>"Francais","En"=>"Anglais","Ar"=>"Arabe","kl"=>"Klingon");
            $form_modifierService->add('select','langue')
            ->affecterValeurs($liste)
            /*->value($dataDescription[0][2])*/
            ->required(true);
            $listeService=array();
   
            $allCategorie=recupCategorie($bdd);
            $listeCategorie=array();
            foreach ($allCategorie as $value) {

                $listeCategorie[$value["traduction"]]=$value["code"];
            
            }
            $form_modifierService->add('select','categorie')
            ->affecterValeurs($listeCategorie)
            ->value($dataServicesUtilisateur[6])
            ->required(true);

    
            $form_modifierService->add('text','codePostal')
            ->required(true);
        
    
	}
	/*$idService=1;
	$idDescription=0;*/
	
	


	if ($form_modifierService->isValid()){
    	$data = $form_service->get_cleaned_values();
    	
    	$texte=htmlspecialchars($_POST["texte"]);
		$adresse=htmlspecialchars($_POST["adresse"]);
		echo "lolcamarche";
			/*$categorie=($_POST["categorie"]);*/
		
		
		modifierService($bdd, $data['nom'], $data['email'], $adresse, $data['telephone'],$data['lien_site'], $data['categorie'], $data['idService']);
		/*saveGeolocation($idService, $adresse);*/
	}
	$idUtilisateur=$_SESSION['idUtilisateur'];
	
	$dataDescription=recupDescriptionService($idService,$bdd);

}

	/*foreach ($data as $element => $value) {

		html? il faut modifier
		# code...
	}*/
	include("templates/modifierServices.php");
?>

