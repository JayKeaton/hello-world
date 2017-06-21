<?php

$liste = recupCategorie($bdd);
$listeCategories = array('' => "---");
foreach($liste as $categorie){
	$listeCategories[$categorie['code']] = $categorie['traduction'];
}

$form_categorie = new Formulaire('form_categorie');
$form_categorie->add('select', 'categorie')
					->affecterValeurs($listeCategories)
					->required(true);
$form_categorie->add('text', 'code')
				->value("")
				->required(true);
$form_categorie->add('text', 'traduction')
				->value("")
				->required(true);




include("templates/gererCategories.php");
