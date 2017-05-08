<?php

// Récupération des variables nécessaires à l'activation
$idu = $_GET['log'];
$cle = $_GET['cle'];
 
// Récupération de la clé correspondant au $login dans la base de données

$clebdd=recupCle($bdd, $idu);
 
if($clebdd == $cle) // On compare nos deux clés	
       {
          // Si elles correspondent on active le compte !	
          echo "Votre compte a bien été activé !";
 
          // La requête qui va passer notre champ actif de 0 à 1
          active($bdd, $idu);
       }
     else // Si les deux clés sont différentes on provoque une erreur...
       {
          echo "Erreur ! Votre compte ne peut être activé...";
       }
  