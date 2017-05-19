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

	function ajouterService($bdd, $email, $adresse, $phone, $website, $categorie,$idContributeur){
		$req = $bdd->prepare("insert into services (localisation, categorie, telephone, mail, lien_site, idContributeur) values(:adresse, :categorie, :phone, :email, :website, :idContributeur)");
		$result = $req->execute(array("adresse"=>$adresse, "categorie"=>$categorie, "phone"=>$phone, "email"=>$email, "website"=>$website, "idContributeur"=>$idContributeur));
		
		return $bdd->lastInsertId();
		
	}

	function ajouterDescriptionService($bdd, $nom, $texte, $langue, $ids){
		$req = $bdd->prepare("insert into descriptions (nom, texte, langue, idService) values(:nom, :texte, :langue, :idService)");
		$result = $req->execute(array("nom"=>$nom, "texte"=>$texte,"langue"=>$langue, "idService"=>$ids));
		return $bdd->lastInsertId();
  }


	

?>