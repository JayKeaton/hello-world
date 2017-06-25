<?php
   
	

$form_service = new Formulaire('form_service');
$form_service->add('text','nom')
	->required(true);
$form_service->add('email', 'email')
	->placeholder("example@email.fr")
	->required(true);

$form_service->add('text','telephone')
	->required(true);
$form_service->add('text','lien_site')
	->required(false);

$form_service->add('textarea', 'adresse')
	->placeholder("Entrez votre adresse ici.")
	->required(true);
$form_service->add('text','codePostal')
	->required(true);

$categorie=recupCategorie($bdd);
$listeCategorie=array();
foreach ($categorie as $value) {
	$listeCategorie[$value["code"]]=$value["traduction"];
}
$form_service->add('select','categorie')
	->affecterValeurs($listeCategorie)
	->required(true);

$form_service->add('select','langue')
	->affecterValeurs($LANGUAGES)
	->required(true);
$form_service->add('textarea', 'description')
	->placeholder("Décrivez ici votre service.")
	->required(true);
$form_service->set_values($_POST);


if ($form_service->isValid()){
	$data = $form_service->get_cleaned_values();

	$idService = ajouterService($bdd, $data['email'], $data['adresse'], $data['codePostal'], $data['telephone'], $data['lien_site'], $data['categorie'], $_SESSION['idUtilisateur'], $data['nom']);
  	/*saveGeolocation($idService, $adresse);*/
	$id2 = ajouterDescriptionService($bdd, $data['description'], $data['langue'], $idService);

	require_once("models/image.php");
	$result = traitementUploadImage('imageService', "media/imageService", $idService);
	$adresseImage=$result[1];
	ajouterAdresseImage($bdd,$adresseImage,$idService);
	include("templates/validation.html");

}
else {

	include("templates/ajoutServices.php");

}

?>
