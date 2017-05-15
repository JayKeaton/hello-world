<?php
include("models/pageServiceAdmin.php");
$seances=tableau();
$commentaires=commentaires();
$longueur=count($seances);
$longComment=count($commentaires);
include("templates/pageServiceAdmin.php");
 ?>
