<?php



	$adresses=recupLocalisation($bdd);
	$listeServices=recupAll($bdd);
	include("templates/servicesAffiche.php");



?>