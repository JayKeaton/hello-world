<?php

	$bdd = null;
	try {
		
		

    $hostname="rpicfrtmtjisep.mysql.db";
	$username="rpicfrtmtjisep";
	$password="IsepRPIC75";
	$bddname="rpicfrtmtjisep";
    


	// On se connecte à MySQL
	$bdd = new PDO("mysql:host=".$hostname.";dbname=".$bddname.";charset=utf8",$username,$password);
}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
	die('Erreur : '.$e->getMessage());
}
