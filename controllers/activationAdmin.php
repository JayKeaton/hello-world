<?php

// Récupération des variables nécessaires à l'activation
$cle = $_GET['cle'];
$email= $_GET['email'];
$root = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';
 
// Récupération de la clé correspondant au $login dans la base de données

$clebdda=recupCleAdmin($bdd, $email);
$inORnot=verifMailAdmin($bdd, $email);
 
if($clebdda == $cle && $inORnot == true) // On compare nos deux clés	
       {
          // Si elles correspondent on active le compte !	
          echo "</br></br>";

          echo "<h1>Félicitation ! Votre compte a bien été activé !</h1>";
		  echo "<h1>Vous êtes maintenant administrateur</h1>";
		  echo "<p>Quelques règles d'usages :</br>Vous ne devez pas accepter n'importe qui, vous représentez l'image de ce service d'aide. Vous ne devez en aucun cas transmettre des informations ou donner des privilèges.</p>";
		  echo "<a href='".$root."'> Retour à l'accueil</a>";
 
          // La requête qui va passer notre champ actif de 0 à 1
          activeAdmin($bdd, $email);
		  enleverEmailsAdmin($bdd, $email);
			  
       }

     else // Si les deux clés sont différentes on provoque une erreur...
       {
		   
          include("templates/erreurValidation.html");
		   
       }
  ?>