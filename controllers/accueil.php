<?php
if(!empty($_POST['catégorie'])){
		$typeService = $_POST['catégorie'];

		$req=$bdd->prepare("SELECT * FROM services WHERE idUtilisateur=idUtilisateur");
	$req->execute(array('idUtilisateur'=>$_SESSION['idUtilisateur']));
	$data=$req->fetchall();
		
	$req = $bdd->prepare("SELECT * FROM services WHERE categorie=$categorie ORDER BY distance");
	$req->execute(array('idUtilisateur'=>$_SESSION['idUtilisateur']));
	$data=$req->fetchall();
	}
include ("templates/accueil.php");
include ("models/TriServices.php")
?>

