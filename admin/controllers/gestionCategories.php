<?php

$listeCategories = recupCategorie($bdd);
$listeCategoriesSelect = array('0' => "---");
$listeCategoriesCode = array();
foreach($listeCategories as $categorie){
    $listeCategoriesSelect[$categorie['idCategorie']] = $categorie['traduction'];
    $listeCategoriesCode[$categorie['idCategorie']] = $categorie['code'];
}

$form_categorie = new Formulaire('form_categorie');
$form_categorie->add('select', 'categorie')
                ->affecterValeurs($listeCategoriesSelect)
                ->required(true);
$form_categorie->add('text', 'traduction')
				->value("")
				->required(true);
$form_categorie->set_values($_POST);

$data = array();
$erreur = array();

if ($form_categorie->isValid()){
    $data = $form_categorie->get_cleaned_values();
    if ($_POST['form_categorie'] == "Supprimer cette categorie"){
        supprimerCategorie($data['categorie']);
        header("Location: ");
        exit();
    }
    else {
        modifierCategorie($data['categorie'], $data['traduction']);
        if (!empty($_FILES['iconeCategorie']['tmp_name'])){
            require_once("../models/image.php");
            $result = traitementUploadImage('iconeCategorie', '../media/pictogrammes', $listeCategoriesCode[$data['categorie']], array('image/png'));
            if (!$result[0]){
                $erreur['iconeCategorie'] = $result[1];
            }
        }
        header("Location: ");
        exit();
    }
}


$form_ajouterCategorie = new Formulaire('form_ajoutCategorie');
$form_ajouterCategorie->add('text', 'code')
                        ->value("")
                        ->maxlength(10)
                        ->required(true);
$form_ajouterCategorie->add('text', 'traduction')
                        ->value("")
                        ->required(true);


if ($form_ajouterCategorie->isValid()){
    $data = $form_ajouterCategorie->get_cleaned_values();
    if (!empty($_FILES['iconeCategorie']['tmp_name'])){
        require_once("../models/image.php");
        $result = traitementUploadImage('iconeCategorie', '../media/pictogrammes', $data['code'], array('image/png'));
        if (!$result[0]){
            $erreur['iconeCategorieAjout'] = $result[1];
        }
    }
    else{
        copy("../media/pictogrammes/inconnu.png", "../media/pictogrammes/".$data['code'].".png");
    }
    if (empty($erreur['iconeCategorieAjout'])) {
        ajouterCategorie($data['code'], $data['traduction']);
        header("Location: ");
        exit();
    }
}




include("templates/gestionCategories.php");
