<?php
//echo $_POST['categorie'];
$categorie = $_POST['categorie'];
include ("models/TriServices.php");
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