<?php /*toutes les fonctions pour récupérer*/

	function recupServicesUtilisateur($idUtilisateur,$bdd){
		$req=$bdd->prepare("SELECT * FROM description WHERE idUtilisateur=idUtilisateur");
	$req->execute(array('idUtilisateur'=>$idUtilisateur));
	$data=$req->fetchall();
	return $data;
	}

	/*function recupLocalisation($idService,$bdd){
		$req=$bdd->prepare("SELECT localisation FROM services WHERE idService=idService");
		$req->execute(array('idService' => $idService));
	    $data = $req->fetch();
		
		if ($data == null){
	        return null;
		}
	    else{
	        return $data['localisation'];
	    }


	}
	function recupCategorie($idService,$bdd){
		$req=$bdd->prepare("SELECT categorie FROM services WHERE idService=idService");
		$req->execute(array('idService' => $idService));
	    $data = $req->fetch();
		
		if ($data == null){
	        return null;
		}
	    else{
	        return $data['categorie'];
	    }


	}
	function recupTelephone($idService,$bdd){
		$req=$bdd->prepare("SELECT telephone FROM services WHERE idService=idService");
		$req->execute(array('idService' => $idService));
	    $data = $req->fetch();
		
		if ($data == null)
	        return null;
	    else{
	        return $data['telephone'];
	    }


	}
	function recupMail($idService,$bdd){
		$req=$bdd->prepare("SELECT mail FROM services WHERE idService=idService");
		$req->execute(array('idService' => $idService));
	    $data = $req->fetch();
		
		if ($data == null)
	        return null;
	    else{
	        return $data['mail'];
	    }


	}
	function recupLien_site($idService,$bdd){
		$req=$bdd->prepare("SELECT lien_site FROM services WHERE idService=idService");
		$req->execute(array('idService' => $idService));
	    $data = $req->fetch();
		
		if ($data == null)
	        return null;
	    else{
	        return $data['lien_site'];
	    }


	}
function recupcodePostal($idService,$bdd){
		$req=$bdd->prepare("SELECT codePostal FROM services WHERE idService=idService");
		$req->execute(array('idService' => $idService));
	    $data = $req->fetch();
		
		if ($data == null){
	        return null;
		}
	    else{
	        return $data['codePostal'];
	    }


	}
	function recupcodePostal($idService,$bdd){
		$req=$bdd->prepare("SELECT codePostal FROM services WHERE idService=idService");
		$req->execute(array('idService' => $idService));
	    $data = $req->fetch();
		
		if ($data == null){
	        return null;
		}
	    else{
	        return $data['codePostal'];
	    }


	}*/

?>
