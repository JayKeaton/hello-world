<?php

	$bdd = null;
	try {


    $hostname="localhost";
	$username="root";
	$password="";
	$bddname="error404";
    /*
	$hostname="localhost";
	$username="id1784963_error404msf";
	$password="IsepRPIC75";
	$bddname="id1784963_error404";
    */


	// On se connecte à MySQL
	$bdd = new PDO("mysql:host=".$hostname.";dbname=".$bddname.";charset=utf8",$username,$password);
}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
	die('Erreur : '.$e->getMessage());
}
