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
$estInscrit=estInscrit($idService);

if (!empty($_POST["valider"])){
  $note=$_POST["note"];
  $texte=htmlspecialchars($_POST["text"]);
  ajoutCommentaire($note,$texte,$_SESSION["idUtilisateur"],$idService);  /*$_POST["idSeance"]*/
  header("Location: ");
  exit();
}

if (!empty($_POST["validerInscript"])){
  echo("test");
  /*exit();*/
  foreach($seances as $seance){
    echo(empty($_POST["inscription_".$seance['idSeance']]) == $_POST["hidden_".$seance['idSeance']]);
    if(!empty($_POST["inscription_".$seance['idSeance']])!=$_POST["hidden_".$seance['idSeance']]){
      echo('test');
      if (!empty($_POST["inscription_".$seance['idSeance']])){
        modifInscription(true,$idService, $seance['idSeance'],$_SESSION["idUtilisateur"]);
      }
      else{
        modifInscription(false,$idService, $seance['idSeance'],$_SESSION["idUtilisateur"]);
      }
    }
  }
  /*header("Location: ");
  exit();*/
}

if (!empty($_POST["validerAdmin"])){
  censureService($idService,0);
}
if (!empty($_POST["bloquerAdmin"])){
  censureService($idService,1);
}

include("templates/pageServiceAdmin.php");
 ?>
