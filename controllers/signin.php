<?php

if (!empty($_POST['identifiant'])){
    $identifiant = $_POST['identifiant'];
    $mdp = sha1($_POST['mdp']);
    list($idUtilisateur,$mdpBdd,$verification) = connexionUtilisateur($identifiant);
    if ($mdpBdd == false){
        $erreur_utilisateur = "Utilisateur inconnu.";
        include("templates/signin.php");
    }
    elseif ($mdp !== $mdpBdd){
        $erreur_mdp = "Mot de passe incorrect.";
        include("templates/signin.php");
    }
    elseif ($verification == false){
        $erreur_verification = "Adresse mail non vérifiée.";
        include("templates/signin.php");
    }
    else {
        $_SESSION['idUtilisateur'] = $idUtilisateur;
        if (empty($_GET['nextPage']))
            header("Location: ".SOUS_DOMAINE);
        else
            header("Location: ".SOUS_DOMAINE."?page=".$_GET['nextPage']);
    }
}
else{
    include("templates/signin.php");
}
