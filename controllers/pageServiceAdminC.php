<?php
include("models/pageServiceAdmin.php");
$idService=1; /*$_GET['idService']; */
$seances=tableau($idService);
$commentaires=commentaires($idService);
$description=description($idService);
$contact=contact($idService);
$longueur=count($seances);
$longComment=count($commentaires);
include("templates/pageServiceAdmin.php");
 ?>
