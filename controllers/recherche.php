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
$form->add('radio', 'typeRecherche')
    ->addOption('note', "Classement des services par note")
    ->addOption('localisation', "Services les plus proche de votre position (Vous devez activer la geolocalisation)", false)
    ->addOption('adresse', "Rechercher les services à proximité d'une adresse")
    ->required(true)
    ->value('note');
$form->add('text', 'adresseDeRecherche')
    ->required(false);

if($form->isValid()){
    $form->set_values($_POST);
    $data = $form->get_cleaned_values();
    if ($data["typeRecherche"] == 'note'){
        $listeServices = rechercheServices($data['categorie'], $data['langue'], 'note');
    }
    elseif ($data['typeRecherche'] == 'localisation' and !empty($_POST['coords']) and $_POST['coords'] != false){
        $coords = $_POST['coords'];
        $listeServices = rechercheServices($data['categorie'], $data['langue'], 'localisation');
        foreach ($listeServices as $key => $service){
            $dist = round(distance($coords, $service['geolocalisation']));
            $service['distance'] = $dist;
            $listeServices[$key] = $service;
        }
        function comparaison($serviceA, $serviceB){
            return ($serviceA['distance'] < $serviceB['distance']);
        }
        $listeServices = triListe($listeServices, 'comparaison');
    }
    else{
        if (!empty($data['adresseDeRecherche'])){
            $loc = getXmlCoordsFromAdress($data['adresseDeRecherche']);
            $coords = $loc['lat'].",".$loc['lon'];
            $listeServices = rechercheServices($data['categorie'], $data['langue'], 'localisation');
            foreach ($listeServices as $key => $service){
                $dist = round(distance($coords, $service['geolocalisation']));
                $service['distance'] = $dist;
                $listeServices[$key] = $service;
            }
            function comparaison($serviceA, $serviceB){
                return ($serviceA['distance'] < $serviceB['distance']);
            }
            $listeServices = triListe($listeServices, 'comparaison');
        }
    }
}

include("templates/recherche.php");