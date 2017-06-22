<?php

$listeCategories = recupCategorie($bdd);
$listeCategoriesSelect = array('' => "---");
foreach($listeCategories as $categorie){
    $listeCategoriesSelect[$categorie['idCategorie']] = $categorie['traduction'];
}

$form_categorie = new Formulaire('form_categorie');
$form_categorie->add('select', 'categorie')
                ->affecterValeurs($listeCategoriesSelect)
                ->required(true);
$form_categorie->add('text', 'traduction')
				->value("")
				->required(true);
$form_categorie->set_values($_POST);

print_r($_POST);

if ($form_categorie->isValid()){
    $data = $form_categorie->get_cleaned_values();
    if ($_POST['form_categorie'] == "Supprimer cette categorie"){
        supprimerCategorie($data['categorie']);
        header("Location: ");
        exit();
    }
    else {
        modifierCategorie($data['categorie'], $data['traduction']);
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
    ajouterCategorie($data['code'], $data['traduction']);
    header("Location: ");
    exit();
}




include("templates/gestionCategories.php");
