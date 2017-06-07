<?php

	if (!empty($_POST["submit"])){
		$erreur = array();

		$champsRequis = array("email", "prenom", "nom", "message");
		foreach($champsRequis as $champ){
		    if (empty($_POST[$champ])){
		        $erreur[$champ] = "Veuillez remplir ce champ.";
            }
        }

		if (!empty($erreur)){
			include("templates/contact.php");
		}
		else {
            $email = htmlspecialchars($_POST["email"]);
            
            $prenom = htmlspecialchars($_POST["prenom"]);
            $nom = htmlspecialchars($_POST["nom"]);

            $telephone = htmlspecialchars($_POST["telephone"]);

     
            $message = htmlspecialchars($_POST["message"]);

            include("controllers/mailto.php");
          
            envoyerMail($email, $message, $nom, $prenom, $telephone, "contact");

            include("templates/validationContact.html");
        }
	}
	else {
		include("templates/contact.php");
	}


?>