<?php
include("models/ajoutSeance.php");
$idService=1;   /*$_GET["idService"];*/

if(!empty($_POST["valider"])){
  if (empty($_POST["nom"]) || empty($_POST["description"]) || empty($_POST["date"]) || empty($_POST["heure"]) || empty($_POST["capacite"])){
    print_r ("Merci de remplir tous les champs");
  }
  if ($_POST["date"]){
    print_r ("Merci de saisir une date valide");
  }
  else{
    $date=$_POST["date"];
    $heure=$_POST["heure"];
    $moment=$date." "$heure;
    print_r( $moment);
    $nom=htmlspecialchars($_POST["nom"]);
    $description=htmlspecialchars($_POST["description"]);
    print_r($_POST);
    ajoutSeance($nom,$description,$_POST["moment"],$_POST["capacite"], $idService );
  }
}

include("templates/ajoutSeance.php");
