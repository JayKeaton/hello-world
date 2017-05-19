<?php /*toutes les fonctions pour récupérer*/

	function recupLocalisation($idservice,$bdd){
		$req=$bdd->prepare("SELECT localisation FROM services WHERE idService=idService");
		$req->execute(array('idService' => $idService));
	    $data = $req->fetch();
		
		if ($data == null)
	        return null;
	    else{
	        return array($data['localisation']);


	}
	function recupCategorie($idservice,$bdd){
		$req=$bdd->prepare("SELECT categorie FROM services WHERE idService=idService");
		$req->execute(array('idService' => $idService));
	    $data = $req->fetch();
		
		if ($data == null)
	        return null;
	    else{
	        return array($data['categorie']);


	}
	function recupTelephone($idservice,$bdd){
		$req=$bdd->prepare("SELECT telephone FROM services WHERE idService=idService");
		$req->execute(array('idService' => $idService));
	    $data = $req->fetch();
		
		if ($data == null)
	        return null;
	    else{
	        return array($data['telephone']);


	}
	function recupMail($idservice,$bdd){
		$req=$bdd->prepare("SELECT mail FROM services WHERE idService=idService");
		$req->execute(array('idService' => $idService));
	    $data = $req->fetch();
		
		if ($data == null)
	        return null;
	    else{
	        return array($data['mail']);


	}
	function recupLien_site($idservice,$bdd){
		$req=$bdd->prepare("SELECT lien_site FROM services WHERE idService=idService");
		$req->execute(array('idService' => $idService));
	    $data = $req->fetch();
		
		if ($data == null)
	        return null;
	    else{
	        return array($data['lien_site']);


	}












 ?>