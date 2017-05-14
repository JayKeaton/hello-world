<?php

	function ajouterCle($bdd, $idu, $cle){
		$req = $bdd->prepare("UPDATE utilisateurs SET cle = :cle WHERE idUtilisateur = :idu ");
		$req->bindParam(':idu', $idu);
		$req->bindParam(':cle', $cle);
        $req->execute();
	}
	
	function ajouterUtilisateur($bdd, $nom, $prenom, $email, $mdp, $adresse, $sexe, $phone){
		$req = $bdd->prepare("insert into utilisateurs(mail, nom, prenom, mdp, telephone) values(:email, :nom, :prenom, :mdp, :phone)");
		$result = $req->execute(array("nom"=>$nom, "prenom"=>$prenom, "email"=>$email, "mdp"=>$mdp, "phone"=>$phone));
		return $bdd->lastInsertId();
	}

	function connexionUtilisateur($mail){
	    global $bdd;
	    $req = $bdd->prepare("SELECT idUtilisateur,mdp,verification FROM utilisateurs WHERE mail=:mail");
	    $req->execute(array('mail' => $mail));
	    $data = $req->fetch();
	    if ($data == false)
	        return false;
	    else{
	        return array($data['idUtilisateur'],$data['mdp'],$data['verification']);
        }
    }

    function mdpUtilisateur($idUtilisateur){
        global $bdd;
        $req = $bdd->prepare("SELECT mdp FROM utilisateurs WHERE idUtilisateur=:idUtilisateur");
        $req->execute(array('idUtilisateur' => $idUtilisateur));
        $data = $req->fetch();
        if ($data == false)
            return false;
        else{
            return $data['mdp'];
        }
    }
	
    function recupCle($bdd, $idu){
        $req = $bdd->prepare("SELECT cle FROM utilisateurs WHERE idUtilisateur = :idu ");
        if($req->execute(array('idu' => $idu)) && $row = $req->fetch()){
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
    function desactive($idUtilisateur){
	    global $bdd;
        $req = $bdd->prepare("UPDATE utilisateurs SET verification = 0 WHERE idUtilisateur = :idUtilisateur ");
        $req->bindParam('idUtilisateur', $idUtilisateur);
        $req->execute();
    }
	
	
	function verifMail($bdd, $email){
		$req = $bdd->prepare("SELECT idUtilisateur FROM utilisateurs WHERE mail=:email");
		$req->execute(array('email' => $email));
		$donnee = $req->fetch();
        if(!empty($donnee['idUtilisateur'])){
            return true;
        }
        else{
            return false;
        }
    }

    function infoUtilisateur($idUtilisateur){
	    global $bdd;
	    $req = $bdd->prepare("SELECT * FROM Utilisateurs WHERE idUtilisateur = :idUtilisateur");
	    $req->bindParam('idUtilisateur', $idUtilisateur);
	    $req->execute();
	    $data = $req->fetch();
	    return $data;
    }

    function modifierInfoUtilisateur($idUtilisateur, $prenom, $nom, $pseudo, $dateNaissance){
        global $bdd;
        $req = $bdd->prepare("UPDATE utilisateurs SET prenom=:prenom,nom=:nom,pseudo=:pseudo,dateNaissance=:dateNaissance WHERE idUtilisateur=:idUtilisateur");
        $req->bindParam('prenom', $prenom);
        $req->bindParam('nom', $nom);
        $req->bindParam('pseudo', $pseudo);
        $req->bindParam('dateNaissance', $dateNaissance);
        $req->bindParam('idUtilisateur', $idUtilisateur);
        $result = $req->execute();
        return $result;
    }

    function changerMail($idUtilisateur, $mail){
        global $bdd;
        $req = $bdd->prepare("UPDATE utilisateurs SET mail=:mail WHERE idUtilisateur=:idUtilisateur");
        $req->bindParam('mail', $mail);
        $req->bindParam('idUtilisateur', $idUtilisateur);
        $result = $req->execute();
        return $result;
    }

    function changerMdp($idUtilisateur, $mdp){
        global $bdd;
        $req = $bdd->prepare("UPDATE utilisateurs SET mdp=:mdp WHERE idUtilisateur=:idUtilisateur");
        $req->bindParam('mdp', $mdp);
        $req->bindParam('idUtilisateur', $idUtilisateur);
        $result = $req->execute();
        return $result;
    }
	