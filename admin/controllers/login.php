<?php


$login_form = new Formulaire('login_admin');
$login_form->add('text', 'email')
            ->required(true);
$login_form->add('password', 'mdp')
            ->required(true);

$erreur = array();

if ($login_form->isValid()){
    $data = $login_form->get_cleaned_values();
    $bddData = connexionUtilisateur($data['email']);
    if ($bddData == false){
    	$erreur['compte'] = "Cette adresse mail n'existe pas.";
    }
    else{
    	$mdp = sha1($data['mdp']);
    	if ($mdp != $bddData['mdp']){
    		$erreur['mdp'] = "Mot de passe incorrect.";
    	}
    	elseif ($bddData['droits'] != 'admin'){
    		$erreur['notAdmin'] = "Vous n'êtes pas administrateur. 
    		Vous n'avez pas l'autorisation d'acceder à cette section.";
    	}
    	elseif ($bddData['verification'] == false){
    		$erreur['verification'] = "Veuillez verifier votre adresse email";
    	}
    	else{
    		$_SESSION['idAdministrateur'] = $bddData['idUtilisateur'];
    		header("Location: ".SOUS_DOMAINE);
    		exit();
    	}
    }
}



include("templates/login.php");