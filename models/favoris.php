<?php

function tableauFavoris($idUtilisateur){
  global $bdd;
    $request1=$bdd->prepare("SELECT nom, categorie, lien_site FROM services JOIN favoris ON services.idService=favoris.idService WHERE favoris.idUtilisateur=:idUtilisateur ORDER BY nom ASC");
    $request1->bindParam("idUtilisateur",$idUtilisateur);
    $request1->execute();
	  $rowAll = $request1->fetchAll();
    return $rowAll;
  }

function supprimerFavoris(){
  global $bdd;
  if(!empty($_POST['suppr']))
    {// Requete sql pour supprimer la ligne de la BDD qui est coché dans le tableau
      $request2 = $bdd->prepare('DELETE FROM t_fournisseur WHERE idFour = '.$donnees['idFour'].'');
      $request2->execute(array());
       }
     }
?>