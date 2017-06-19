<?php

$req = $bdd->prepare("SELECT idService,adresse,geolocalisation FROM services");
$req->execute();
$data = $req->fetchAll();


foreach ($data as $service){
    if (empty($service['geolocalisation'])){
        saveGeolocation($service['idService'], $service['adresse']);
    }
}
