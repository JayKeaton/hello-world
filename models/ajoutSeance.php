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

  function  ajoutSeance($nom,$description, $date, $heure, $capacite, $idService){
  global $bdd;
  $req=$bdd->prepare("INSERT INTO `seances`(`nom`,`description`,`date`, `heure`, `capacite`, `idService`) VALUES (:nom, :description, :date, :heure, :capacite,:idService");
  $req->bindParam("nom",$nom);
  $req->bindParam("description",$description);
  $dateCalibree='"'.$date.'"';
  $heureCalibree='"'.$heure.'"';
  $req->bindParam("date",$dateCalibree);
  $req->bindParam("heure",$heureCalibree);
  $req->bindParam("capacite",$capacite);
  $req->bindParam("idService",$idService);
  $req->execute();
}
