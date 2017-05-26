<?php
include("models/pageServiceAdmin.php");
$idService=1; /*$_GET['idService']; */
$seances=seances($idService);
$noteService=noteService($idService);
$satisfaction=satisfaction($idService,$seances);
$commentaires=commentaires($idService);
$profil=profil($idService);
$profilSession=profilSession($_SESSION["idUtilisateur"]);
$description=description($idService);
$contact=contact($idService);
$longueur=count($seances);
$longComment=count($commentaires);
$lesInscrits=lesInscrits($idService);
$notesSeances=notesSeances($idService);

if (!empty($_POST["valider"])){
  $note=$_POST["note"];
  $texte=htmlspecialchars($_POST["text"]);
  ajoutCommentaire($note,$texte,$_SESSION["idUtilisateur"],$idService);  /*$_POST["idSeance"]*/
  header("Location: ");
  exit();
}

include("templates/pageServiceAdmin.php");
 ?>
