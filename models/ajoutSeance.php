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

  function  ajoutSeance($nom,$description, $moment, $capacite, $idService){
  global $bdd;
  $req=$bdd->prepare("INSERT INTO `seances`(`nom`,`description`,`moment`, `capacite`, `idService`) VALUES (:nom, :description, :moment,:capacite,:idService");
  $req->bindParam("nom",$nom);
  $req->bindParam("description",$description);
  $req->bindParam("moment",$moment);
  $req->bindParam("capacite",$capacite);
  $req->bindParam("idService",$idService);
  $req->execute();
}
