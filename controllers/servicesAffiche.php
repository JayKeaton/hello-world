<?php

    $geolocaliser = (empty($_SESSION['idUtilisateur']) or geolocaliserUtilisateur($_SESSION['idUtilisateur']));

	$listeServices=recupAll($bdd);
    $listePlusProcheServices = array();

	if (!empty($_POST['utiliserLoc']) and !empty($_POST['coords'])){
        $coords = $_POST['coords'];
    }
    elseif (!empty($_POST['adresse'])){
        $loc = getXmlCoordsFromAdress($_POST['adresse']);
        $coords = $loc['lat'].",".$loc['lon'];
    }

    if (!empty($coords)) {
        foreach ($listeServices as $key => $service) {
            $dist = round(distance($coords, $service['geolocalisation']));
            $service['distance'] = $dist;
            $listeServices[$key] = $service;
        }
        function comparaison($serviceA, $serviceB)
        {
            return ($serviceA['distance'] < $serviceB['distance']);
        }
        $listeServices = triListe($listeServices, 'comparaison');
        for ($i = 0; $i < min(5,count($listeServices)); $i++){
            $listePlusProcheServices[$i] = $listeServices[$i];
        }
        //print_r($listePlusProcheServices);
    }



	include("templates/servicesAffiche.php");



?>