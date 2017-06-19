<?php
	if(!empty($_POST['typeService']) or !empty($_POST['nomService']) or !empty($_POST['adresse']) or !empty($_POST['dejaValide']) or !empty($_get['page2'])){
		$typeService = $_POST['typeService'];
		$nomService = $_POST['nomService'];
		$adresse = $_POST['adresse'];
		$messagesParPage=5;
		
		
		$retour = dataTypeService($typeService,$messagesParPage);
		$data = $retour[0];
		$nombreDePages = $retour[1];
		}
	$categorie_service = new Formulaire('login');
	$categorie=recupCategorie($bdd);
    $listeCategorie=array('' => "...");
    foreach ($categorie as $value) {
    	$listeCategorie[$value["traduction"]]=$value["code"];
      			# code...
    	}
    $categorie_service->add('select','typeService')
    				->affecterValeurs($listeCategorie)
    				->required(false);
    if ($categorie_service->isValid()){
    	$dataCategorie = $categorie_service->get_cleaned_values();
    	$categorie_service->get('typeService')
    						->value($dataCategorie['typeService']);
    }
$actuTrier=actualite();    
include("templates/accueil_admin.php");
?>
