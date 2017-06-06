<?php


$form_login = new Formulaire('login');
$form_login->add('email', 'email')
    ->required(true);
$form_login->add('password', 'mdp')
    ->required(true);


if ($form_login->isValid()){
    $data = $form_login->get_cleaned_values();
    $email = $data['email'];
    $mdp = sha1($data['mdp']);
    list($idUtilisateur,$mdpBdd,$verification,$droits) = connexionUtilisateur($email);
    if ($mdpBdd == false){
        $form_login->addError('email', "Utilisateur inconnu.");
    }
    elseif ($mdp !== $mdpBdd){
        $form_login->addError('mdp', "Mot de passe incorrect.");
    }
    elseif ($verification == false){
        $erreur_verification = "Adresse mail non vérifiée.";
    }
    else {
        $_SESSION['idUtilisateur'] = $idUtilisateur;
        $_SESSION['droits'] = $droits;
        if (empty($_GET['nextPage'])) {
            header("Location: " . SOUS_DOMAINE);
            exit();
        }
        else {
            header("Location: " . SOUS_DOMAINE . "?page=" . $_GET['nextPage']);
            exit();
        }
    }
}

include("templates/signin.php");
