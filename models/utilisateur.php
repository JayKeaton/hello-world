<?php

	
	function ajouterUtilisateur($bdd, $nom, $prenom, $email, $mdp, $adresse, $sexe){
		$req = $bdd->prepare("insert into utilisateurs(identifiant, nom, prenom, mail, mdp) values(:email, :nom, :prenom, :email, :mdp)");
		$result = $req->execute(array("nom"=>$nom, "prenom"=>$prenom, "email"=>$email, "mdp"=>$mdp));
		return $result;
	}