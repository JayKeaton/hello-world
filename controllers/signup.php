<?php

$listeJour = range(1,31);
$listeMois = array(1 => 'Janvier', 2 => 'Février', 3 => 'Mars', 4 => 'Avril', 5 => 'Mai', 6 => 'Juin', 7 => 'Juillet', 8 => 'Août', 9 => 'Septembre', 10 => 'Octobre', 11 => 'Novembre', 12 => 'Décembre');
$listeAnnee = range(1900, 2000+date("y"));

	if (!empty($_POST["nom"])){
		$erreur = false;
		if($_POST["mdp"] != $_POST["mdpv"]){
            $erreur_mdpv = "Mot de passe différent de la confirmation";
            $erreur = true;
        }
        if (verifMail($bdd,$_POST["email"])==true){
            $erreur_compte = "Cette adresse mail est déjà utilisée.<br/><a href='".SOUS_DOMAINE."/?page=signin'>Connectez vous.</a>";
            $erreur = true;
		}
		if (!in_array($_POST['jour'], $listeJour) || !in_array($_POST['mois'], array_keys($listeMois)) || !in_array($_POST['annee'], $listeAnnee)){
            $erreur_dateNaissance = "Veuillez entrer une date valide.";
            $erreur = true;
        }
		if ($erreur){
			include("templates/signup.php");
		}
		else {
            $email = $_POST["email"];
            $pseudo = $_POST['pseudo'];

            $mdp = sha1($_POST["mdp"]);

            $prenom = $_POST["prenom"];
            $nom = $_POST["nom"];

            $telephone = ($_POST["telephone"]);

            $sexe = $_POST["sexe"];
            $jour = $_POST['jour'];
            $mois = $_POST['mois'];
            $annee = $_POST['annee'];
            $dateNaissance = $annee."-".$mois."-".$jour;

            $codePostal = $_POST['codePostal'];
            $adresse = $_POST["adresse"];

            $geolocalisation = !empty($_POST['geolocalisation']);

            $idUtilisateur = ajouterUtilisateur($email, $pseudo, $mdp, $prenom, $nom, $telephone, $sexe, $dateNaissance, $codePostal, $adresse, $geolocalisation);

            include("controllers/mailto.php");
            $randint = rand(1, 10000);
            $hash = date("Ymdhis" . $randint);
            envoyerMail($email, $hash, $nom, $prenom, $idUtilisateur);
            ajouterCle($bdd, $idUtilisateur, $hash);
            include("templates/validation.php");
        }
	}
	else {
		include("templates/signup.php");
	}

?>
