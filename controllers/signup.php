<?php

     
	 if (!empty($_POST["nom"])){
		 $nom=$_POST["nom"];
		 $prenom=$_POST["prenom"];
		 $email=$_POST["email"];
		 $sexe=$_POST["sexe"];
		 $adresse=$_POST["adresse"];
		 $mdp=sha1($_POST["mdp"]);
		 ajouterUtilisateur($bdd, $nom, $prenom, $email, $mdp, $adresse, $sexe);
		 include("templates/mailto.php");
		 $randint=rand(1,10000);
		 $hash = date("Ymdhis".$randint);
		 echo $hash;
		 envoyerMail($email, $hash, $nom, $prenom);
		 
	 }
	 
 	include("templates/Signup.html");
 ?>