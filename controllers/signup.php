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
		 envoyerMail($email);
		 
	 }
	 
 	include("templates/Signup.html");
	
 ?>