<?php
error_reporting(0);
//echo $_POST['categorie'];
include ("models/TriServices.php");
$categorie = $_POST['categorie'];


/*$form_service = new Formulaire('login');
$categorie=recupCategorie($bdd);
    $listeCategorie=array();
    foreach ($categorie as $value) {
      $listeCategorie[$value["traduction"]]=$value["code"];
      
      # code...
    }
    $form_service->add('select','categorie')
    ->affecterValeurs($listeCategorie)
    ->required(true);*/
/*include ("models/services.php");  déjà appelé dans l'index:""require_once("models/services.php")"";*/
if(!empty($_POST['categorie'])&&(!empty($_POST['adresse']))){
	$data=obtenirServiceParLocalisationEtCategorie($categorie, $adresse);
}
else if(!empty($_POST['categorie'])&&(empty($_POST['adresse']))){
	$data=obtenirServiceValidesParCategorie($categorie);
}
else if(empty($_POST['categorie'])&&(!empty($_POST['adresse']))){
	$data=obtenirServiceParLocalisation($adresse);
}
else {
	$data="Pas de catégorie sélectionnée";
	$data=obtenirSansEntree();

}
include ("templates/accueil.php");
?>