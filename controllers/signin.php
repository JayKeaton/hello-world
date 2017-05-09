<?php

if (!empty($_POST['identifiant'])){
    $identifiant = $_POST['identifiant'];
    $mdp = sha1($_POST['mdp']);
    list($idUtilisateur,$mdpBdd,$verification) = connexionUtilisateur($identifiant);
    if ($mdpBdd == false){
        $erreur = "Identifiant inconnu.";
        echo $erreur;
    }
    elseif ($mdp !== $mdpBdd){
        $erreur = "Mot de passe incorrect.";
        echo $erreur;
    }
    elseif ($verification == false){
        $erreur = "Adresse mail non vérifiée.";
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
