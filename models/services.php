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


	function getCoordonnees($adresse){
		$apiKey = "AIzaSyDPhN2sS9mIsr2Qwyzp1Pu7S95KTNK564M";//Indiquez ici votre clé Google maps !
		$url = "http://maps.google.com/maps/geo?q=".urlencode($adresse)."&output=csv&key=".$apiKey;
		$csv = file($url);
		$donnees = split(",",$csv[0]);
		return $donnees[2].",".$donnees[3];
	}
	function ajouterService($bdd, $email, $adresse, $phone, $website, $categorie){
		$req = $bdd->prepare("insert into services(localisation, categorie, telephone, mail, lien_site) values(:adresse, :categorie, :phone, :email, :website)");
		$result = $req->execute(array("adresse"=>$adresse, "categorie"=>$categorie, "phone"=>$phone, "email"=>$email, "website"=>$website));
		return $bdd->lastInsertId();
	}

	function recupLocalisation($bdd){
		
		$req = $bdd->prepare("SELECT localisation FROM description");
	    $req->execute(array('idService' => $idService));
	    $data = $req->fetch();
		
		if ($data == null)
	        return null;
	    else{
	        return array($data['localisation']);
        }
		
	}

?>