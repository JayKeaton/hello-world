activationContributeur<?php


	

	if(recupDroits($bdd, $_SESSION['idUtilisateur'])=="utilisateur"){

		echo ("<h1>Vous n'êtes pas contributeur actuellement !</h1>");
		echo("<p>Si vous souaitez devenir contributeur cliquer sur le boutton, vous recevrez un email de confirmation</p>");
		echo("<form><input type="'submit'" name="'submit'" value="'Devenir contributeur'" id="'submit'" /></form>");

		if (!empty($_POST["submit"])){
			include("controllers/mailto.php");
			$email = recupMail($bdd, $_SESSION['idUtilisateur']);
			envoyerMail($email, recupCle($bdd, $_SESSION['idUtilisateur']), "", "", $_SESSION['idUtilisateur'], "activationAdminAvecInscription");

		}


	}

	if(recupDroits($bdd, $_SESSION['idUtilisateur'])=="contributeur"){
		
		include("controllers/ajoutServices.php")

	}




?>