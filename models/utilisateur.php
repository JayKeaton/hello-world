<?php

	function ajouterCle($bdd, $idu, $cle){
	
		$req = $bdd->prepare("UPDATE utilisateurs SET cle = :cle WHERE idUtilisateur = :idu ");
		$req->bindParam(':idu', $idu);
		$req->bindParam(':cle', $cle);
        $req->execute();
	}
	
	function ajouterUtilisateur($bdd, $nom, $prenom, $email, $mdp, $adresse, $sexe, $phone){
		$req = $bdd->prepare("insert into utilisateurs(identifiant, nom, prenom, mail, mdp, telephone) values(:email, :nom, :prenom, :email, :mdp, :phone)");
		$result = $req->execute(array("nom"=>$nom, "prenom"=>$prenom, "email"=>$email, "mdp"=>$mdp, "phone"=>$phone));
		return $bdd->lastInsertId();
	}

	function mdpUtilisateur($identifiant){
	    global $bdd;
	    $req = $bdd->prepare("SELECT id,mdp FROM utilisateurs WHERE identifiant=:identifiant");
	    $req->execute(array('identifiant' => $identifiant));
	    $data = $req->fetch();
	    if (empty($data))
	        return false;
	    else{
	        return $data;
        }

    }
	
	function recupCle($bdd, $idu){
		
		$req = $bdd->prepare("SELECT cle FROM utilisateurs WHERE idUtilisateur = :idu ");
			if($req->execute(array('idu' => $idu)) && $row = $req->fetch())
  {
    			$clebdd = $row['cle'];	// Récupération de la clé
				
				return $clebdd;
  }
  
  	return false;
	}
	
	
	function active($bdd, $idu){
		
		$req = $bdd->prepare("UPDATE utilisateurs SET verification = 1 WHERE idUtilisateur = :idu ");
		$req->bindParam(':idu', $idu);
        $req->execute();
	}
	
	
	function verifMail($bdd, $email){
		$req = $bdd->prepare("SELECT id FROM utilisateurs WHERE email=:email");
		$req->execute(array('email' => $email));
		$donnee = $req->fetch();
			if(!empty($donnee['id'])){
     			return true;
				}
			else{
			return false;
			}
		}
	