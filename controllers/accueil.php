<?php


if (!empty($_POST['NOM A METTRE'])){
    $categorie = $_POST['categorie'];
    $geolocalisation = $_POST['geolocalisation'];
    $lieu = $_POST['lieu'];

    $data = obtenirServiceParCategorie($categorie);











    include("templates/accueil.php");
}
else{
    include ("templates/accueil.php");
}

?>