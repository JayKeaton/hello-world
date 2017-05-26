<?php

$servername="localhost";
$username="root";
$password="root";
$dbname="error404";
$bdd = null;
try{
  $bdd=new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
  }
catch(PDOException $se)
  {
  echo "Connection failed: " . $se->getMessage();
  }

  function description($idService){
    global $bdd;
    $req=$bdd->prepare("SELECT texte FROM descriptions WHERE idService=:idService");
    $req->bindParam("idService",$idService);
    $req->execute();
    $description=array();
    $description=$req->fetch();
    return($description);
  }

  function noteService($idService){
    global $bdd;
    $req=$bdd->prepare("SELECT ROUND(AVG(note),2) FROM commentaires WHERE idService=:idService");
    $req->bindParam("idService",$idService);
    $req->execute();
    $note=$req->fetch();
    return $note;
  }

  function notesSeances($idService){
    global $bdd;
    $req1=$bdd->prepare("SELECT idSeance FROM commentaires WHERE idService=:idService");
    $req1->bindParam("idService",$idService);
    $req1->execute();
    $seances=$req1->fetchAll();
    foreach ($seances as &$value) {
      $req2=$bdd->prepare("SELECT ROUND(AVG(note),2) FROM commentaires WHERE idSeance=:idSeance");
      $req2->bindParam("idSeance",$value[0]);
      $req2->execute();
      $notesSeances=$req2->fetch();
    }
    return $notesSeances;
  }

  function contact($idService){
    global $bdd;
    $req=$bdd->prepare("SELECT * FROM services WHERE idService=:idService ");
    $req->bindParam("idService",$idService);
    $req->execute();
    $contact=$req->fetch();
    return($contact);
  }

  function commentaires($idService){
    global $bdd;
    $req=$bdd->prepare("SELECT * FROM commentaires WHERE idService=:idService ORDER BY DATE");
    $req->bindParam("idService",$idService);
    $req->execute();
    $commentaires=array();
    for($i=0; $i<10; $i++){
      $ligne=$req->fetch();
      if ($ligne != false){
        $commentaires[$i]=$ligne;
      }
    }
    return $commentaires;
  }

  function ajoutCommentaire($note, $texte,$idUtilisateur,$idService){
    global $bdd;
    $req=$bdd->prepare("INSERT INTO commentaires(note, texte, date, heure, censure, idUtilisateur, idService, idSeance) values(:note, :texte, CURDATE(), CURTIME(), 0, :idUtilisateur, :idService,0)");
    $req->bindParam("note",$note);
    $req->bindParam("texte",$texte);
    $req->bindParam("idUtilisateur",$idUtilisateur);
    $req->bindParam("idService",$idService);
    /*$req->bindParam("idSeance",$idSeance);*/
    $req->execute();
  }

  function profil($idService){
    global $bdd;
    $req=$bdd->prepare("SELECT avatar,pseudo FROM utilisateurs JOIN commentaires ON commentaires.idUtilisateur=utilisateurs.idUtilisateur WHERE idService=:idService ORDER BY date ");
    $req->bindParam("idService",$idService);
    $req->execute();
    $profil=$req->fetchAll();
    return($profil);
  }

  function profilSession($idUtilisateur){
    global $bdd;
    $req=$bdd->prepare("SELECT avatar,pseudo FROM utilisateurs WHERE idUtilisateur=:idUtilisateur");
    $req->bindParam("idUtilisateur",$idUtilisateur);
    $req->execute();
    $profilSession=$req->fetch();
    return($profilSession);
  }

  function seances($idService){
    global $bdd;
    $req=$bdd->prepare("SELECT * FROM seances WHERE idService=:idService ORDER BY DATE");
    $req->bindParam("idService",$idService);
    $req->execute();
    $seances=array();
    for($i=0; $i<10; $i++){
      $ligne=$req->fetch();
      if ($ligne != false){
        $seances[$i]=$ligne;
      }
    }
    return $seances;
  }

 function satisfaction($idService,$seances){
    global $bdd;
    $satisfaction=array();
    for($i=0; $i<count($seances); $i++){
      $req=$bdd->prepare("SELECT AVG(note) FROM commentaires WHERE idService=:idService AND (date BETWEEN :date1 AND :date2) ");
      $dateD=$seances[$i]["date"];
      $date1=$dateD;
      $date2 = date_create($dateD);
      date_modify($date2, '+3 day');
      $date2= $date2->format('Y-m-d');
      $req->bindParam("date1",$date1);
      $req->bindParam("date2",$date2);
      $req->bindParam("idService",$idService);
      $req->execute();
      $satisfaction[$i]=$req->fetch();
    }
    return $satisfaction;
  }

  function lesInscrits($idService){
    global $bdd;
    $req=$bdd->prepare("SELECT count(*), inscrits.idSeance FROM inscrits JOIN seances ON inscrits.idSeance=seances.idSeance WHERE idService=:idService GROUP BY seances.idSeance ORDER BY seances.idSeance ");
    $req->bindParam("idService",$idService);
    $req->execute();
    $lesInscrits=$req->fetch();
    return $lesInscrits;
  }

  function estInscrit($idService){
    global $bdd;
    $req=$bdd->prepare("SELECT idUtilisateur, idSeance FROM inscrits JOIN seances ON inscrits.idSeance=seances.idSeance WHERE idService=:idService");
    $req->bindParam("idService,$idService");
    $req->execute();
    $estInscrit=$req->fetch();
    return $estInscrits;
  }
 ?>
