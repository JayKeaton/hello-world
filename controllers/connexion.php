<?php

if (!empty($_POST['identifiant'])){
    $identifiant = $_POST['identifiant'];
    $mdp = sha1($_POST['mdp']);
    list($idUtilisateur,$mdpBdd) = mdpUtilisateur($identifiant);
    if ($mdpBdd == false){
        $erreur = "Identifiant inconnu.";
    }
    elseif ($mdp !== $mdpBdd){
        $erreur = "Mot de passe incorrect.";
    }
    else {
        $_SESSION['idUtilisateur'] = $idUtilisateur;
        header("Location: ".SOUS_DOMAINE);
    }
}
else{
    include("templates/connexion.html");
}