<?php /*toutes les fonctions pour récupérer*/

	function recupServicesUtilisateur($idUtilisateur,$bdd){
		$req=$bdd->prepare("SELECT * FROM services WHERE idUtilisateur=idUtilisateur");
		$req->execute(array('idUtilisateur'=>$idUtilisateur));
		$data=$req->fetchall();
		return $data;
	}
	function recupDescriptionService($idUtilisateur,$bdd){
		$req=$bdd->prepare("SELECT * FROM descriptions WHERE idUtilisateur=idUtilisateur");
		$req->execute(array('idUtilisateur'=>$idUtilisateur));
		$dataDescription=$req->fetchall();
	return $dataDescription;

	}
	function modifierService($bdd, $nom, $email, $adresse, $telephone,$lien_site, $categorie, $idService){

  		$req=$bdd->prepare("UPDATE services SET adresse=:adresse, nom=:nom, email=:email, categorie=:categorie, telephone=:telephone, lien_site=:lien_site  WHERE idService=:idService  ");
  		$result = $req->execute(array("adresse"=>$adresse, "categorie"=>$categorie, "telephone"=>$telephone, "email"=>$email, "lien_site"=>$lien_site, "idService"=>$idService, "nom"=>$nom));
  		return $idService;



  	}
	/*function ajouterService($bdd, $email, $adresse, $phone, $website, $categorie,$idContributeur){
		$req = $bdd->prepare("UPDATE into services (localisation, categorie, telephone, mail, lien_site, idContributeur) values(:adresse, :categorie, :phone, :email, :website, :idContributeur)");
		$result = $req->execute(array("adresse"=>$adresse, "categorie"=>$categorie, "phone"=>$phone, "email"=>$email, "website"=>$website, "idContributeur"=>$idContributeur));
		
		return $bdd->lastInsertId();
		
	}*/
	
	

	/*function ajouterDescriptionService($bdd, $nom, $texte, $langue, $ids){
		$req = $bdd->prepare("insert into descriptions (nom, texte, langue, idService) values(:nom, :texte, :langue, :idService)");
		$result = $req->execute(array("nom"=>$nom, "texte"=>$texte,"langue"=>$langue, "idService"=>$ids));
		return $bdd->lastInsertId();
  }*/

  	
  	
  /*UPDATE table
SET nom_colonne_1 = 'nouvelle valeur'
WHERE conditio*/

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


	}




	























































































































































































































































































































































































































































































	*/


