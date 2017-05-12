<?php

	function recupAdresse($bdd, $idService){
		
		$req = $bdd->prepare("SELECT localisation FROM description WHERE idService=:idService");
	    $req->execute(array('idService' => $idService));
	    $data = $req->fetch();
		
		if ($data == null)
	        return null;
	    else{
	        return array($data['localisation']);
        }
		
	}

?>