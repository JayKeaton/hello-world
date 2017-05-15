<?php


	include("models/services.php");
	$adresses=recupLocalisation($bdd);
	
	for($i=0; $i<count(adresses); $i++){
		
		$adresses[$i]=getCoordonnees($adresses[$i]);
	}
	
	include("templates/servicesAffiche.php");




?>