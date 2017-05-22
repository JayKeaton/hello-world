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
    $req=$bdd->prepare("SELECT nom, texte FROM descriptions WHERE idService=:idService");
    $req->bindParam("idService",$idService);
    $req->execute();
    $description=array();
    $description=$req->fetch();
    return($description);
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

  function tableau($idService){
    global $bdd;
    $req=$bdd->prepare("SELECT * FROM seances WHERE idService=:idService ORDER BY DATE");
    $req->bindParam("idService",$idService);
    $req->execute();
    $tableau=array();
    for($i=0; $i<10; $i++){
      $ligne=$req->fetch();
      if ($ligne != false){
        $tableau[$i]=$ligne;
      }
    }
    return $tableau;
  }

  function satisfaction($idService,$seances){
    global $bdd;
    $satisfaction=array();
    /*date_default_timezone_set('Paris'); */
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
 ?>
