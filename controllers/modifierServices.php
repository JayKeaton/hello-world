<?php

$erreur = array();

$form_idService = new Formulaire('form_idService');

$services = recupServicesUtilisateur($_SESSION['idUtilisateur'], $bdd);
$listeServices = array();
foreach ($services as $value) {
    $listeServices[$value["idService"]] = $value["nom"];
}

$form_idService->add('select','idService')
    ->affecterValeurs($listeServices)
    ->required(true);
$form_idService->set_values($_POST);



$form_modifierService = new Formulaire('form_modifierService');
$form_modifierService->add('hidden', 'idService')
    ->value(0)
    ->required(true);
$form_modifierService->add('hidden', 'form_idService')
    ->value("form_idService")
    ->required(true);
$form_modifierService->add('text','nom')
    ->required(true);
$form_modifierService->add('email', 'email')
    ->required(true);
$form_modifierService->add('textarea', 'adresse')
    ->required(true);
$form_modifierService->add('text','telephone')
    ->required(true);
$form_modifierService->add('text','lien_site')
    ->required(true);
$allCategories=recupCategorie($bdd);
$listeCategories=array();
foreach ($allCategories as $value) {
    $listeCategories[$value["code"]] = $value["traduction"];
}
$form_modifierService->add('select','categorie')
    ->affecterValeurs($listeCategories)
    ->required(true);
$form_modifierService->add('select','traductionsExistantes')
    ->affecterValeurs(array())
    ->required(false);
$form_modifierService->add('textarea', 'description')
    ->required(false);
$form_modifierService->set_values($_POST);




$form_ajouterDescription = new Formulaire('$form_ajouterDescription');
$form_ajouterDescription->add('hidden', 'idService')
    ->value(0)
    ->required(true);
$form_ajouterDescription->add('hidden', 'form_idService')
    ->value("form_idService")
    ->required(true);
$form_ajouterDescription->add('select', 'langue')
    ->affecterValeurs($LANGUAGES)
    ->required(true);
$form_ajouterDescription->add('textarea', 'nouvelleDescription')
    ->required(true);




$afficher = false;
$data = array();
$idService = 0;

if ($form_idService->isValid()) {
    $idService = $form_idService->get_cleaned_values()['idService'];
    $data = getService($idService);
    $data['idService'] = $idService;
    $form_modifierService->set_values($data);
    $form_ajouterDescription->set_values($data);
    $listeDescriptions = recupDescriptionService($idService, $bdd);
    $listeLangues = array(0 => "---");
    foreach ($listeDescriptions as $description) {
        $listeLangues[$description['idDescription']] = $LANGUAGES[$description['langue']];
    }
    $form_modifierService->get('traductionsExistantes')
        ->affecterValeurs($listeLangues);
    $afficher = true;
}


if ($form_modifierService->isValid()) {
    $data = $form_modifierService->get_cleaned_values();
    if ($_POST['form_modifierService'] == "modifier") {
        modifierService($bdd, $data['nom'], $data['email'], $data['adresse'], $data['telephone'], $data['lien_site'], $data['categorie'], $data['idService']);
        saveGeolocation($data['idService'], $data['adresse']);
        if ($data['traductionsExistantes'] != 0) {
            modifierDescription($data['traductionsExistantes'], $data['description']);
        }
        if (!empty($_FILES['imageService']['name'])){
            require_once("models/image.php");
            $result = traitementUploadImage('imageService', 'media/imageService', $data['idService']);
            if ($result[0] == false){
                $erreur['imageService'] = $result[1];
            }
            else{
                $adresseImage=$result[1];
                ajouterAdresseImage($bdd,$adresseImage,$data['idService']);
            }
        }
    }
    else {
        supprimerDescription($data['traductionsExistantes']);
    }
    if ($erreur == array()) {
        header("Location: ");
        exit();
    }
}


if ($form_ajouterDescription->isValid()) {
    echo("test");
    $data = $form_ajouterDescription->get_cleaned_values();
    ajouterDescription($data['nouvelleDescription'],$data['langue'],$data['idService']);
    header("Location: ");
    exit();
}



include("templates/modifierServices.php");
?>

