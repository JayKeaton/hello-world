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
 ?>
