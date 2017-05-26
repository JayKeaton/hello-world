<?php



	if(empty($_GET['adresse'])){
		header("Location: ?page=locate");
		exit();
	}


	$localisation=$_GET['adresse']; /*recupAdresse($bdd, $idService);*/
	include("templates/servicesMaps.php");



?>
