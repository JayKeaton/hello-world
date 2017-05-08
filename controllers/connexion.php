<?php

if (!empty($_POST['identifiant'])){
    $identifiant = $_POST['identifiant'];
    $mdp = sha1($_POST['mdp']);
    list($idUtilisateur,$mdpBdd) = mdpUtilisateur($identifiant);
    if ($mdpBdd == false){
        $erreur = "Identifiant inconnu.";
        echo $erreur;
    }
    elseif ($mdp !== $mdpBdd){
        $erreur = "Mot de passe incorrect.";
        echo $erreur;
    }
    else {
        $_SESSION['idUtilisateur'] = $idUtilisateur;
        header("Location: ".SOUS_DOMAINE);
    }
}
else{
    include("templates/connexion.html");
}