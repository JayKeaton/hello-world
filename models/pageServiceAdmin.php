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





  /*$req = $bdd->prepare("SELECT idUtilisateur,mdp,verification FROM utilisateurs WHERE identifiant=:identifiant");
  	    $req->execute(array('identifiant' => $identifiant));
        $req->bindValue('identifiant', $identifiant);

  	    $data = $req->fetch(); */





  function commentaires(){
    global $bdd;
    $req=$bdd->prepare("SELECT * FROM commentaires ORDER BY DATE ") /* WHERE page="???" */;
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

  function tableau(){
    global $bdd;
    /*$bdd="SELECT * FROM Seance";
    $nbreLignes="SELECT count(*) FROM Seance"; */
    $req=$bdd->prepare("SELECT * FROM seances ORDER BY Date ") /* WHERE page="???" */;
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
