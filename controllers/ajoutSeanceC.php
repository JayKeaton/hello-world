<?php
include("models/ajoutSeance");
$idService=1;   /*$_GET["idService"];*/

if(!empty($_POST["valider"])){
  if (empty($_POST["nom"]) || empty($_POST["description"]) || empty($_POST["date"]) || empty($_POST["heure"]) || empty($_POST["capacite"])){
    echo "Merci de remplir tous les champs"
  }
  if ($_POST["date"]){
    echo "Merci de saisir une date valide"
  }
  else{
    $date=$_POST["date"];
    $heure=$_POST["heure"];
    $moment=$date." "$heure;
    echo $moment;
    $nom=htmlspecialchars($_POST["nom"]);
    $description=htmlspecialchars($_POST["description"]);
    ajoutSeance($nom,$description,$_POST["moment"],$_POST["capacite"], $idService );
  }
}
