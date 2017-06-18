<?php





/*
$coords=getXmlCoordsFromAdress("4 rue Joseph Kosma, Acheres");
$coords2=getXmlCoordsFromAdress("Paris");
echo $coords['status']." ".$coords['lat']." ".$coords['lon']."</br>";
echo $coords2['status']." ".$coords2['lat']." ".$coords2['lon'];
*/

//print_r(triListe($liste, $f));



$form = new Formulaire("recherche");
$listeCategories = array('' => "-----", 'soin' => "Soins", 'nourriture' => "Nourriture", 'logement' => "Logement");
$form->add('select', 'categorie')
    ->affecterValeurs($listeCategories)
    ->required(true);
$listeLangues = array('all' => "Toutes les langues", 'fr' => "Francais", 'en' => "Anglais", 'Jérémy' => "Jeremy");
$liste = listeLangues();
$listeLangues = array();
foreach ($liste as $langue) {
    $listeLangues[$langue['langue']] = $langue['langue'];
}
$form->add('select', 'langue')
    ->value('all')
    ->affecterValeurs($listeLangues)
    ->required(true);
$typeDeRecherche = array('note' => "Classement des services par note", 'localisation' => "Services les plus proche de votre position");
$form->add('radio', 'typeRecherche')
    ->affecterValeurs($typeDeRecherche)
    ->required(true)
    ->value('note');

if($form->isValid()){
    $form->set_values($_POST);
    $data = $form->get_cleaned_values();
    $listeServices = rechercheServices($data['categorie'], $data['langue'], $data['typeRecherche']);
}


include("templates/recherche.php");