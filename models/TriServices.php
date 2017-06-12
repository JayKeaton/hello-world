<?php
	function obtenirServiceParLocalisationEtCategorie($categorie, $adresse){
		global $bdd;
		$adresse='%'.$adresse.'%';
	    $req = $bdd->prepare("SELECT * FROM services JOIN descriptions ON descriptions.idService = services.idService WHERE categorie=:categorie AND adresse LIKE :adresse");/* WHERE validation=true*/
	    $req->bindParam('categorie', $categorie);
	    $req->bindParam('adresse', $adresse);
	    $req->execute();
	    $data = $req->fetchAll();
	    return $data;
	}
	function obtenirServiceParLocalisation($adresse){
		global $bdd;
		$adresse='%'.$adresse.'%';
	    $req = $bdd->prepare("SELECT * FROM services JOIN descriptions ON descriptions.idService = services.idService WHERE adresse LIKE :adresse");/* WHERE validation=true*/
	    $req->bindParam('adresse', $adresse);
	    $req->execute();
	    $data = $req->fetchAll();
	    return $data;
	}
	function obtenirServiceValidesParCategorie($categorie){
	    global $bdd;
	    $req = $bdd->prepare("SELECT * FROM services JOIN descriptions ON descriptions.idService = services.idService WHERE categorie=:categorie ");/* WHERE validation=true*/
	    $req->bindParam('categorie', $categorie);
	    $req->execute();
	    $data = $req->fetchAll();
	    return $data;
	}
	function obtenirSansEntree(){
	    global $bdd;
	    $req = $bdd->prepare("SELECT * FROM services JOIN descriptions ON descriptions.idService = services.idService");/* WHERE validation=true*/
	    $req->execute();
	    $data = $req->fetchAll();
	    return $data;
	}
	function recupCategorie($bdd){
			$req = $bdd->prepare("SELECT code,traduction FROM categories WHERE langue='fr'");
			//$req->bindParam('categorie', $categorie);
			$req->execute();
			 $data = $req->fetchAll();
			 return $data;
		}
	/*JOIN text FROM description WHERE IdServices=IdServices*/



	/*if(!empty($_POST['catégorie']))&&(!empty($_POST['adresse'])){
			$typeService = $_POST['catégorie'];
			$adresse = $_POST['adresse']
		
	$req = $bdd->prepare("SELECT * FROM services WHERE categorie=$typeService AND adresse=$adresse AND validation --ORDER BY distance");
	$req->execute(array('idService'));
	$data=$req->fetchall();
	}
	else if(!empty($_POST['catégorie']))&&(empty($_POST['adresse'])){
		
		$req = $bdd->prepare("SELECT * FROM services WHERE categorie=$typeService AND validation=true--ORDER BY distance");
		$req->execute(array('idService'));
		$data=$req->fetchall();
	}
	else if(empty($_POST['catégorie']))&&(!empty($_POST['adresse'])){
		$adresse = $_POST['adresse']
		$req = $bdd->prepare("SELECT * FROM services WHERE adresse=$adresse AND validation=true--ORDER BY distance");
		$req->execute(array('idService'));
		$data=$req->fetchall();
	}
	else {
		$req = $bdd->prepare("SELECT * FROM services WHERE validation=true--ORDER BY distance");
		$req->execute(array('idService'));
		$data=$req->fetchall();
	}
	return$data*/
?>