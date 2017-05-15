<?php
	include ("models/SQLco");
	if(!empty($_POST['typeService'])){
		$typeService = $_POST['typeService'];
		include(models/verificationService.php);
		$data = dataTypeServices($typeService);
	}

include ("template/acceuil_admin")

?>