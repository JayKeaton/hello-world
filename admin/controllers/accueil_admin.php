<?php
	if(!empty($_POST['typeService']) or !empty($_POST['nomService']) or !empty($_POST['adresse']) or !empty($_POST['dejaValide'])){
		$typeService = $_POST['typeService'];
		$nomService = $_POST['nomService'];
		$adresse = $_POST['adresse'];
		include("models/verificationService.php");
		if(!empty($_POST['page'])){
			$page = $_POST['page'];
		}
		else{
			$page = 1;
		}
		$retour = dataTypeService($page);
		$data = $retour[0];
		$nombreDePages = $retour[1];
		$pageActuelle = $retour[2];
		}
include("templates/accueil_admin.php");
?>
