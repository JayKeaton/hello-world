<?php

$listeJour = range(1,31);
$listeMois = array(1 => 'Janvier', 2 => 'Février', 3 => 'Mars', 4 => 'Avril', 5 => 'Mai', 6 => 'Juin', 7 => 'Juillet', 8 => 'Août', 9 => 'Septembre', 10 => 'Octobre', 11 => 'Novembre', 12 => 'Décembre');
$listeAnnee = range(1900, 2000+date("y"));

	if (!empty($_POST["submit"])){
		$erreur = array();

		$champsRequis = array("email", "pseudo", "mdp", "prenom", "nom", "jour", "mois", "annee", "sexe");
		foreach($champsRequis as $champ){
		    if (empty($_POST[$champ])){
		        $erreur[$champ] = "Veuillez remplir ce champ.";
            }
        }

		if($_POST["mdp"] != $_POST["mdpv"]){
            $erreur['mdpv'] = "Mot de passe différent de la confirmation";
        }
        if (verifMail($bdd,$_POST["email"])==true){
            $erreur['email'] = "Cette adresse mail est déjà utilisée.<br/><a href='".SOUS_DOMAINE."?page=signin'>Connectez vous.</a>";
		}
		if (!in_array($_POST['jour'], $listeJour) || !in_array($_POST['mois'], array_keys($listeMois)) || !in_array($_POST['annee'], $listeAnnee)){
            $erreur['dateNaissance'] = "Veuillez entrer une date valide.";
        }
        if (!in_array($_POST['sexe'], array("homme", "femme", "autre"))){
		    $erreur['sexe'] = "Veuillez selectionner un choix valide.";
        }
		if (!empty($erreur)){
			include("templates/signup.php");
		}
		else {
            $email = htmlspecialchars($_POST["email"]);
            $pseudo = htmlspecialchars($_POST['pseudo']);

            $mdp = sha1($_POST["mdp"]);

            $prenom = htmlspecialchars($_POST["prenom"]);
            $nom = htmlspecialchars($_POST["nom"]);

            $telephone = htmlspecialchars($_POST["telephone"]);

            $sexe = htmlspecialchars($_POST["sexe"]);
            $jour = htmlspecialchars($_POST['jour']);
            $mois = htmlspecialchars($_POST['mois']);
            $annee = htmlspecialchars($_POST['annee']);
            $dateNaissance = $annee."-".$mois."-".$jour;

            $codePostal = htmlspecialchars($_POST['codePostal']);
            $adresse = htmlspecialchars($_POST["adresse"]);

            $geolocalisation = !empty($_POST['geolocalisation']);

            $idUtilisateur = ajouterUtilisateur($email, $pseudo, $mdp, $prenom, $nom, $telephone, $sexe, $dateNaissance, $codePostal, $adresse, $geolocalisation);

            include("controllers/mailto.php");
            $randint = rand(1, 10000);
            $hash = date("Ymdhis" . $randint);
            envoyerMail($email, $hash, $nom, $prenom, $idUtilisateur, "activationUtilisateur");
            ajouterCle($bdd, $idUtilisateur, $hash);
            include("templates/validation.html");
        }
	}
	else {
		include("templates/signup.php");
	}

?>