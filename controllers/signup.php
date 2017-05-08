<?php

     
	 if (!empty($_POST["nom"])){
		 if($_POST["mdp"] == $_POST["mdpv"] && verifMail($bdd, $_POST["email"]==false)){
		 $nom=$_POST["nom"];
		 $prenom=$_POST["prenom"];
		 $email=$_POST["email"];
		 $sexe=$_POST["sexe"];
		 $adresse=$_POST["adresse"];
		 $mdp=sha1($_POST["mdp"]);
		 $phone=($_POST["phone"]);
		 $idu = ajouterUtilisateur($bdd, $nom, $prenom, $email, $mdp, $adresse, $sexe, $phone);
		 include("templates/mailto.php");
		 $randint=rand(1,10000);
		 $hash = date("Ymdhis".$randint);
		 envoyerMail($email, $hash, $nom, $prenom, $idu);
		 ajouterCle($bdd, $idu, $hash);
		 include("templates/validation.html");
	 }
	 elseif(verifMail($bdd,$_POST["email"])==true){
		 $root = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';
		 echo "Erreur, vous êtes déjà inscrit. Connectez vous : " .$root."?page=login";
		 }
	elseif($_POST["mdp"] != $_POST["mdpv"]){
		echo "Mot de passe différent de la confirmation";
		include("templates/Signup.php");
		 }
	else{
		echo "Autre erreur";
		include("templates/Signup.php");
	}
	 }
	 
 	else {
		include("templates/Signup.php");
	}
		
 ?>
