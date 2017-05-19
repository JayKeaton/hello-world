<?php 
	/*on commence par récupérer le service puis on modifie ce service*/
	$_SESSION['idUtilisateur']
	/*on fait un while ou on parcourt la base de donnée et a chaque fois qu'on trouve un servicecorrespondant a l'idutilisateur on fait un écho de son service pour pouvoir le modifier après...*/
	/*une requète sql, on récupère tout les truc de l'idutilisateur, on fait une option de select pour chacun d'entre eux ...*/
	$req=$bdd("SELECT FROM services WHERE idUtilisateur=$_SESSION['idUtilisateur']")