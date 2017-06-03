<?php

// Récupération des variables nécessaires à l'activation
$idu = $_GET['log'];
$cle = $_GET['cle'];
$root = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';

// Récupération de la clé correspondant au $login dans la base de données

$clebdd=recupCle($bdd, $idu);
 
if($clebdd == $cle) // On compare nos deux clés	
       {
          // Si elles correspondent on active le compte !
		  echo "</br></br>";

          echo "<h1>Félicitation ! Votre compte a bien été activé !</h1>";
		   echo "<a href='".$root."'> Retour à l'accueil</a>";
 
          // La requête qui va passer notre champ actif de 0 à 1
          active($bdd, $idu);
		 
		  if(verifMailAdmin($bdd, recupMail($bdd, $idu))==true){
			  $email = recupMail($bdd, $idu);
			  activeAdmin($bdd, $email);
			  echo "</br>Votre compte a reçu une demande pour devenir administrateur !</br>";
			  echo "</br>Vous allez reçevoir un mail pour confirmer cette demande à cette adresse : ".$email;
			  include("controllers/mailto.php");
			  envoyerMail($email, recupCleAdmin($bdd, $email), "", "", $idu, "activationAdminAvecInscription");
		  }
			  
			  
			  
       }
     else // Si les deux clés sont différentes on provoque une erreur...
       {
          include("templates/erreurValidation.html");
       }
  ?>