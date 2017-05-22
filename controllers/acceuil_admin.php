<?php
	if(!empty($_POST['typeService']) or !empty($_POST['nomService']) or !empty($_POST['arrondissement'])){
		$typeService = $_POST['typeService'];
		$nomService = $_POST['nomService'];
		$arrondissement = $_POST['arrondissement'];
		include("models/verificationService.php");
		if(!empty($_POST['page'])){
			$page = $_POST['page'];
		}
		else{
			$page = 1;
		}
		$data = dataTypeService($typeService,$nomService,$arrondissement,$page);
	}
include("templates/acceuil_admin.php")
?>
