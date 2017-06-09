<?php

include("models/favoris.php");
$idUtilisateur=$_SESSION["idUtilisateur"];
/*tableauFavoris($_SESSION["idUtilisateur"]);*/
$rowAll=tableauFavoris($idUtilisateur);
$NbrData=count($rowAll);
include("templates/favoris.php");
 ?>
