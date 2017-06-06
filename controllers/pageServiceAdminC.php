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

$admin=0;
if(!empty($_SESSION["idAdministrateur"])){
  $admin=1;
}

if (!empty($_POST["valider"])){
  $note=$_POST["note"];
  $texte=htmlspecialchars($_POST["text"]);
  ajoutCommentaire($note[0],$texte,$_SESSION["idUtilisateur"],$idService);  /*$_POST["idSeance"]*/
  ajoutNote($idService,noteService($idService)["note"]);
  header("Location: ");
  exit();
}

if (!empty($_POST["validerInscript"])){
  echo("test");
  /*print_r($_POST["inscription"]);*/
  /*exit();*/
  foreach($seances as $seance){
    $check1=0;
    $check2=0;
    print_r('    ///checkS///');
    print_r($check1);
    print_r($check2);
    print_r('     /////idSeance//');
    print_r($seance["idSeance"]);
    if(empty($_POST["inscription"])){
      modifInscription(false,$idService,$seance["idSeance"],$_SESSION["idUtilisateur"]);
    }
    else{
      if (in_array($seance["idSeance"],$_POST["inscription"])){
        $check2=1;
      }
      if (in_array($seance["idSeance"],$estInscrit)){
        $check1=1;
      }
      print_r($check1, $check2);
      if($check1!=$check2){
        if($check2==0){
          modifInscription(false,$idService,$seance["idSeance"],$_SESSION["idUtilisateur"]);
        }
        else{
          modifInscription(true,$idService,$seance["idSeance"],$_SESSION["idUtilisateur"]);
        }
      }
    }
  }
  /*header("Location: ");
  exit();*/
}

if (!empty($_POST["validerAdmin"])){
  validationService($idService,1);
}
if (!empty($_POST["bloquerAdmin"])){
  validationService($idService,0);
}

for ($index=0;$index<$longComment;$index ++){
  $idCommentaire = $commentaires[$index]["idCommentaire"];
  if (!empty($_POST["censureCommentaire".$idCommentaire])){
    censureCommentaire($idCommentaire,1);
    header("Location: ");
    exit;
  }
  if (!empty($_POST["rehabiliterCommentaire".$idCommentaire])){
    censureCommentaire($idCommentaire,0);
    header("Location: ");
    exit;
  }
}

/*print_r($seances);*/

include("templates/pageServiceAdmin.php");
 ?>
