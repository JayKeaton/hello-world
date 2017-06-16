<?php

  function  ajoutSeance($nom,$description, $date, $heure, $capacite, $idService){
  global $bdd;

  $req=$bdd->prepare("INSERT INTO `seances`(`nom`,`description`,`date`, `heure`, `capacite`, `idService`) VALUES (:nom, :description, :date, :heure, :capacite,:idService)");
  $req->bindParam("nom",$nom);
  $req->bindParam("description",$description);
  $req->bindParam("date",$date);
  $req->bindParam("heure",$heure);
  $req->bindParam("capacite",$capacite);
  $req->bindParam("idService",$idService);
  print_r($req);
  $req->execute();
}

function seances($idService){
  global $bdd;
  $req=$bdd->prepare("SELECT * FROM seances WHERE idService=:idService ORDER BY date");
  $req->bindParam("idService",$idService);
  $req->execute();
  $seances=$req->fetchAll();
  return $seances;
}
function lesInscrits($idService){
  global $bdd;
  $req=$bdd->prepare("SELECT count(*), inscrits.idSeance FROM inscrits JOIN seances ON inscrits.idSeance=seances.idSeance WHERE idService=:idService GROUP BY seances.idSeance ORDER BY seances.idSeance ");
  $req->bindParam("idService",$idService);
  $req->execute();
  $lesInscrits=$req->fetchAll();
  return $lesInscrits;
}
function supprimerSeance($idService, $idSeance){
  global $bdd;
  $req=$bdd->prepare("DELETE FROM `seances` WHERE idService=:idService AND idSeance=:idSeance");
  $req->bindParam("idService",$idService);
  $req->bindParam("idSeance",$idSeance);
  $req->execute();
}
