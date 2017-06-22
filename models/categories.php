<?php



function modifierCategorie($idCategorie, $traduction){
    global $bdd;
    $req = $bdd->prepare("UPDATE categories SET traduction=:traduction WHERE idCategorie=:idCategorie");
    $req->bindParam('traduction', $traduction);
    $req->bindParam('idCategorie', $idCategorie);
    $req->execute();
}


function supprimerCategorie($idCategorie){
    global $bdd;
    $req = $bdd->prepare("DELETE FROM categories WHERE idCategorie=:idCategorie");
    $req->bindParam('idCategorie', $idCategorie);
    $req->execute();
}

function ajouterCategorie($code, $traduction){
    global $bdd;
    $req = $bdd->prepare("INSERT INTO categories(code,langue,traduction) VALUES(:code,'fr',:traduction)");
    $req->bindParam('code', $code);
    $req->bindParam('traduction', $traduction);
    $req->execute();
}