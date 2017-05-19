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


	
	function ajouterService($bdd, $email, $adresse, $phone, $website, $categorie){
		$req = $bdd->prepare("insert into services(localisation, categorie, telephone, mail, lien_site) values(:adresse, :categorie, :phone, :email, :website)");
		$result = $req->execute(array("adresse"=>$adresse, "categorie"=>$categorie, "phone"=>$phone, "email"=>$email, "website"=>$website));
		return $bdd->lastInsertId();
	}

	function recupLocalisation($bdd){
		
		$req = $bdd->prepare("SELECT localisation, categorie, nom FROM services");
	    $req->execute();
	    $data = $req->fetchAll();
		
		if ($data == array())
	        return false;
	    else{
	        return $data;
        }
		
	}



	
	function recupAll($bdd){
		
		$req = $bdd->prepare("SELECT localisation, categorie, telephone FROM services");
	    $req->execute();
	    $data = $req->fetchAll();
		if ($data == array())
	        return false;
	    else{
	        return $data;
        }
		
		
	}

?>