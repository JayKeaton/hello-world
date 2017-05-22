<?php

	$bdd = null;
	try
{

    $hostname="localhost";
	$username="root";
	$password="root";
	$bddname="error404";
     /*
	$hostname="localhost";
	$username="id1517330_error404_database";
	$password="mirai260";
	$bddname="id1517330_error404";
     */

	// On se connecte à MySQL
	$bdd = new PDO("mysql:host=".$hostname.";dbname=".$bddname.";charset=utf8",$username,$password);
}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
	die('Erreur : '.$e->getMessage());
}
