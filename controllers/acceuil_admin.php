<?php
	if(!empty($_POST['typeService'])){
		$typeService = $_POST['typeService'];
		include("models/verificationService.php");
		$data = dataTypeServices($typeService);
	}

include("templates/acceuil_admin.php")


?>