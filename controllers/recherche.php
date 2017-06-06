<?php

function getXmlCoordsFromAdress($address)
{
    $coords=array();
    $base_url="http://maps.googleapis.com/maps/api/geocode/xml?";
// ajouter &region=FR si ambiguité (lieu de la requete pris par défaut)
    $request_url = $base_url . "address=" . urlencode($address).'&sensor=false';
    $xml = simplexml_load_file($request_url) or die("url not loading");
//print_r($xml);
    $coords['lat']=$coords['lon']='';
    $coords['status'] = $xml->status ;
    if($coords['status']=='OK')
    {
        $coords['lat'] = $xml->result->geometry->location->lat ;
        $coords['lon'] = $xml->result->geometry->location->lng ;
    }
    return $coords;
}



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
$ages = array('' => "-----", 'jeune' => "Jeune", 'adulte' => "Adulte", 'senior' => "Senior");
$form->add('select', 'age')
    ->affecterValeurs($ages);

if($form->isValid()){
    $data = $form->get_cleaned_values();
    $listeServices = obtenirServiceParCategorie($data['categorie']);
}


include("templates/recherche.php");