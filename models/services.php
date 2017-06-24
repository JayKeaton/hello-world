<?php

	function getService($idService){
		global $bdd;
		$req = $bdd->prepare("SELECT * FROM services WHERE idService=:idService");
		$req->bindParam('idService', $idService);
		$req->execute();
		$data = $req->fetch();
		return $data;
	}

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
	function recupCategorie($bdd){
		$req = $bdd->prepare("SELECT idCategorie,code,traduction FROM categories WHERE langue='fr'");
		$req->execute();
		 $data = $req->fetchAll();
		 return $data;
	}


	function getCoordonnees($adresse){
		$apiKey = "AIzaSyDPhN2sS9mIsr2Qwyzp1Pu7S95KTNK564M";//Indiquez ici votre clé Google maps !
		$url = "http://maps.google.com/maps/geo?q=".urlencode($adresse)."&output=csv&key=".$apiKey;
		$csv = file($url);
		$donnees = split(",",$csv[0]);
		return $donnees[2].",".$donnees[3];
	}


	function ajouterService($bdd, $email, $adresse, $codePostal, $telephone, $lien_site, $categorie,$idUtilisateur, $nom){
		$req = $bdd->prepare("insert into services (adresse, codePostal, categorie, telephone, email, lien_site, nom, idUtilisateur, dateAjout ) values(:adresse, :codePostal, :categorie, :telephone, :email, :lien_site,:nom, :idUtilisateur, NOW() )");
		$result = $req->execute(array("adresse"=>$adresse, "codePostal"=>$adresse, "categorie"=>$categorie, "telephone"=>$telephone, "email"=>$email, "lien_site"=>$lien_site, "nom"=>$nom, "idUtilisateur"=>$idUtilisateur));
		return $bdd->lastInsertId();
	}

	function ajouterAdresseImage($bdd,$adresseImage,$idService){
		$req = $bdd->prepare("UPDATE services SET adresseImage=:adresseImage WHERE idService=:idService");
		$result=$req->execute(array("adresseImage"=>$adresseImage, "idService"=>$idService ));
		return $adresseImage ;

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
		$req = $bdd->prepare("SELECT adresse, categorie, telephone, nom, geolocalisation FROM services WHERE validation='1'");
	    $req->execute();
	    $data = $req->fetchAll();
		return $data;
	}

	function saveGeolocation($idService, $adresse){
		global $bdd;
		$coords = getXmlCoordsFromAdress($adresse);
		$loc = $coords['lat'].",".$coords['lon'];
		$req = $bdd->prepare("UPDATE services SET geolocalisation=:geolocalisation WHERE idService=:idService");
		$req->bindParam('idService', $idService);
		$req->bindParam('geolocalisation', $loc);
		$req->execute();
	}


	function rechercheServices($categorie, $langue, $typeRecherche)
    {
        global $bdd;
        if ($typeRecherche == "note") {
            $str = "SELECT 
				services.idService AS idService, 
				services.nom AS nom, 
				services.adresseImage AS adresseImage, 
				descriptions.texte AS texte, 
				descriptions.langue AS langue, 
				services.note as note
			FROM services JOIN descriptions ON services.idService = descriptions.idService 
			WHERE categorie=:categorie AND descriptions.langue=:langue AND services.validation = TRUE 
			ORDER BY note DESC";
        }
        elseif ($typeRecherche == "localisation"){
            $str = "SELECT 
				services.idService AS idService, 
				services.nom AS nom, 
				services.adresseImage AS adresseImage, 
				descriptions.texte AS texte, 
				descriptions.langue AS langue, 
				services.note as note,
				services.geolocalisation as geolocalisation
			FROM services JOIN descriptions ON services.idService = descriptions.idService 
			WHERE categorie=:categorie AND descriptions.langue=:langue AND services.validation = TRUE";
		}
        $req = $bdd->prepare($str);
        $req->bindParam('categorie', $categorie);
        $req->bindParam('langue', $langue);
        $req->execute();
        $data = $req->fetchAll();
        return $data;
    }

	function modifierImageService($idService, $imageService){
		global $bdd;
		$req = $bdd->prepare("UPDATE services SET imageService=:imageService WHERE idService=:idService");
		$req->bindParam("imageService", $imageService);
		$req->bindParam("idService", $idService);
		$req->execute();
    }
	


    function listeLangues(){
    	global $bdd;
    	$req = $bdd->prepare("SELECT DISTINCT langue FROM descriptions");
    	$req->execute();
    	$data = $req->fetchAll();
    	return $data;
    }

?>
