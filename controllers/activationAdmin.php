<?php

// Récupération des variables nécessaires à l'activation
$cle = $_GET['cle'];
$email= $_GET['email'];
 
// Récupération de la clé correspondant au $login dans la base de données

$clebdda=recupCleAdmin($bdd, $email);
$inORnot=verifMailAdmin($bdd, $email);
 
if($clebdda == $cle && $inORnot == true) // On compare nos deux clés	
       {
          // Si elles correspondent on active le compte !	
          echo "Votre compte a bien été activé !";
 
          // La requête qui va passer notre champ actif de 0 à 1
          activeAdmin($bdd, $email);
		  enleverEmailsAdmin($bdd, $email);
			  
       }

     else // Si les deux clés sont différentes on provoque une erreur...
       {
		   
          include("templates/erreurValidation.html");
		   
       }
  ?>