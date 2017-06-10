<?php
	if(!empty($_POST['typeService']) or !empty($_POST['nomService']) or !empty($_POST['adresse']) or !empty($_POST['dejaValide']) or !empty($_get['page2'])){
		$typeService = $_POST['typeService'];
		$nomService = $_POST['nomService'];
		$adresse = $_POST['adresse'];
		$messagesParPage=5;
		$retour = dataTypeService($typeService,$messagesParPage);
		$data = $retour[0];
		$nombreDePages = $retour[1];
		}
include("templates/accueil_admin.php");
?>
