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


	function ajouterService($bdd, $email, $adresse, $codePostal, $telephone, $lien_site, $categorie,$idUtilisateur, $nom){
		$req = $bdd->prepare("insert into services (adresse, codePostal, categorie, telephone, email, lien_site, nom, idUtilisateur ) values(:adresse, :codePostal, :categorie, :telephone, :email, :lien_site,:nom, :idUtilisateur )");
		$result = $req->execute(array("adresse"=>$adresse, "codePostal"=>$adresse, "categorie"=>$categorie, "telephone"=>$telephone, "email"=>$email, "lien_site"=>$lien_site, "nom"=>$nom, "idUtilisateur"=>$idUtilisateur));
		return $bdd->lastInsertId();
	}


	function ajouterDescriptionService($bdd, $texte, $langue, $idService){
		$req = $bdd->prepare("insert into descriptions ( texte, langue, idService) values( :texte, :langue, :idService)");
		$result = $req->execute(array( "texte"=>$texte,"langue"=>$langue, "idService"=>$idService));
		return $bdd->lastInsertId();
  }


	function recupLocalisation($bdd){
		
		$req = $bdd->prepare("SELECT adresse, categorie, nom FROM services");
	    $req->execute();
	    $data = $req->fetchAll();
		
		if ($data == array())
	        return false;
	    else{
	        return $data;
        }
	}



	
	function recupAll($bdd){
		
		$req = $bdd->prepare("SELECT adresse, categorie, telephone, nom FROM services");
	    $req->execute();
	    $data = $req->fetchAll();
		if ($data == array())
	        return false;
	    else{
	        return $data;
        }
		
		
	}


	function obtenirServiceParCategorie($categorie){
	    global $bdd;
	    $req = $bdd->prepare("SELECT * FROM services WHERE categorie=:categorie");
	    $req->bindParam('categorie', $categorie);
	    $req->execute();
	    $data = $req->fetchAll();
	    return $data;
    }

?>