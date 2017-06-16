<?php
include("models/gestionSeances.php");
if(empty($_GET['idService'])){
  header("Location: ".SOUS_DOMAINE."?page=error404");
  exit();
}
else{
  $idService=$_GET['idService'];
}
$seances=seances($idService);
$longueur=count($seances);
$lesInscrits=lesInscrits($idService);
if(!empty($_POST["valider"])){
  if (empty($_POST["nom"]) || empty($_POST["description"]) || empty($_POST["date"]) || empty($_POST["heure"]) || empty($_POST["capacite"])){
    ?> </br> <?php echo ("Merci de remplir tous les champs" ); ?> </br> <?php
  }
  if ($_POST["date"]<date("Y m d")){
    ?> </br> <?php print_r ("Merci de saisir une date valide"); ?> </br> <?php
  }
  else{
    $date=$_POST["date"];
    $heure=$_POST["heure"];
    $nom=htmlspecialchars($_POST["nom"]);
    $description=htmlspecialchars($_POST["description"]);
    print_r($_POST);
    ajoutSeance($nom,$description,$date, $heure, $_POST["capacite"], $idService );
  }
}

foreach($seances as $seance) {
  if(!empty($_POST["supprimerSeance".$seance["idSeance"]])){
    supprimerSeance($idService,$seance["idSeance"]);
    header("Location: ");
    exit();
  }
  if(!empty($_POST["modifierSeance"])){
    /*ENVOYER SUR LA PAGE CONCERNEE*/
  }
}

include("templates/gestionSeances.php");
