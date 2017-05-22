<?php 
	/*on commence par récupérer le service puis on modifie ce service*/
	/*$_SESSION['idUtilisateur']
	on fait un while ou on parcourt la base de donnée et a chaque fois qu'on trouve un servicecorrespondant a l'idutilisateur on fait un écho de son service pour pouvoir le modifier après..
	une requète sql, on récupère tout les truc de l'idutilisateur, on fait une option de select pour chacun d'entre eux ...
	$req=$bdd->prepare("SELECT * FROM services WHERE idUtilisateur=idUtilisateur");
	$req->execute(array('idUtilisateur'=>$_SESSION['idUtilisateur']));
	$data=$req->fetchall();*/
	$req=$bdd->prepare("SELECT * FROM descriptions");
	$rep->execute(array());
	$descriptions=$req->fetchall();
	$req=$bdd->prepare("SELECT * FROM services");
	$req->execute(array());
	$data=$req->fetchall();/*les services*/





	/*$data=recupServicesUtilisateur($_SESSION['idUtilisateur'],$bdd);*/

	/*foreach ($data as $element => $value) {

		html? il faut modifier
		# code...
	}*/
	include("templates/modifierServices.php");
?>

