<?php
	
	//if($_SESSION['droits'] == "admin"){
	
		include("templates/ajoutAdmin.php");
		$idUtilisateur=$_SESSION["idAdministrateur"];


		if (!empty($_POST["submit"])){
			$inORnot=verifMailAdmin($bdd, $_POST["email"]);
			if(sha1($_POST["mdp"]) != mdpUtilisateur($idUtilisateur)){ //$_SESSION["idAdministrateur"]
				echo("Erreur, mot de passe incorrect");
				}
			elseif($inORnot==true){ //$_SESSION["idAdministrateur"]

				echo("</br>Erreur, ce mail est déjà en attente d'administration");

				}

			else{

				$email = htmlspecialchars($_POST["email"]);
				include("../controllers/mailto.php");
				$randint = rand(1, 10000);
				$hash = date("Ymdhis" . $randint);

				if (verifMail($bdd,$_POST["email"])==true && verifMailAdmin($bdd,$_POST["email"])==true){ //si existe

					envoyerMail($email, $hash, "", "", $idUtilisateur, "activationAdminAvecInscription");
					ajouterEmailsAdmin($bdd, $email, $hash);
					include("templates/validation.html");

                }
				else{//sinon

					envoyerMail($email, $hash, "" , "", $idUtilisateur, "activationAdminSansInscription");
					ajouterEmailsAdmin($bdd, $email, $hash);
					echo "L'email vient d'être ajouté à la base de données, il recevra un mail prochainement.";

				}

			}
		}
//	}

//	else{
		
//		echo($_SESSION['email']);
//		echo "</br></br><h1>Vous n'avez pas ces droits</h1>";
//	}

?>