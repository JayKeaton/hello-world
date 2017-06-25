<?php



	$cle = $_GET['cle'];
	$idu= $_GET['log'];
	$root = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';

	// Récupération de la clé correspondant au $login dans la base de données

	$clebdda=recupCle($bdd, $idu);

	if($clebdda == $cle) // On compare nos deux clés
		   {
			  // Si elles correspondent on active le compte !	
			  echo "</br></br>";

			  echo "<h1>Félicitation ! Vos droits ont été actualisé !</h1>";
			  echo "<h1>Vous êtes maintenant Contributeur</h1>";
			  echo "<p>Quelques règles d'usages :</br>Vous ne devez pas proposer n'importe quoi, vous représentez l'image de ce service d'aide. Vous ne devez en aucun cas transmettre des informations ou donner des privilèges. Vos services seront validés par un admin.</p>";
			  echo "<a href='".$root."'> Retour à l'accueil</a>";

			  // La requête qui va passer notre champ actif de 0 à 1
			  activeContributeur($bdd, $idu);
			  if (!empty($_SESSION['idUtilisateur']) and $_SESSION['droits'] != "admin") {
                  $_SESSION['droits'] = "contributeur";
              }
			  

		   }

		 else // Si les deux clés sont différentes on provoque une erreur...
		   {

			  include("templates/erreurValidation.html");

		   }

?>