<?php
$servername="localhost";
$username="root";
$password="root";
$dbname="error404";

try{
  $bdd=new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
catch(PDOException $err)
  {
  echo "Connection failed: " . $err->getMessage();
  }


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