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
    $req=$bdd->prepare("SELECT nom, texte FROM description WHERE idService=$idService");
    $req->execute();
    $description=array();
    $description[0]=$req->fetch();
    $description[1]=$req->fetch();
    return($description);
  }

  function contact($idService){
    global $bdd;
    $req=$bdd->prepare("SELECT * FROM services WHERE idService=$idService ");
    $req->execute();
    $ligne=$req->fetch();
    $contact=array();
    for($i=0;$i<=7;$i++){
      $contact[$i]=$ligne[$i+2];
    }
    return($contact);
  }

  function commentaires($idService){
    global $bdd;
    $req=$bdd->prepare("SELECT * FROM commentaires ORDER BY DATE WHERE idService=$idService");
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
    $req=$bdd->prepare("SELECT * FROM seances ORDER BY Date WHERE idService=$idService" );
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
