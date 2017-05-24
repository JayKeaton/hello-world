<?php
include("models/pageServiceAdmin.php");
$idService=1; /*$_GET['idService']; */
$seances=tableau($idService);
$note=note($idService);
$satisfaction=satisfaction($idService,$seances);
$commentaires=commentaires($idService);
$profil=profil($idService);
$profilSession=profilSession($_SESSION["idUtilisateur"]);
$description=description($idService);
$contact=contact($idService);
$longueur=count($seances);
$longComment=count($commentaires);
$lesInscrits=lesInscrits($idService);
include("templates/pageServiceAdmin.php");
 ?>
