<?php
session_start();


$sous_domaine = $_SERVER['PHP_SELF'];    // Emplacement de ce fichier sur le serveur
$liste = explode("/", $sous_domaine);
$sous_domaine = "";
for ($k = 0; $k < sizeof($liste)-1; $k++){
    $sous_domaine .= $liste[$k]."/";
}
$url = "http://".$_SERVER['HTTP_HOST'];

define('URL_SITE', $url);
define('SOUS_DOMAINE', $sous_domaine);


require_once("../models/SQLCo.php");
require_once("../controllers/functions.php");
require_once("../models/utilisateur.php");

if (empty($_SESSION['idAdministrateur'])){
    include("controllers/login.php");
}
else{
	$path = "controllers/accueil_admin.php";
    if (!empty($_GET['page'])){
    	$page = $_GET['page'];
    	if ($page == "logout"){
    		$_SESSION = array();
    		header("Location: ".SOUS_DOMAINE);
    		exit();
    	}
    	if ($page == "logout"){
    		$_SESSION = array();
    		header("Location: ".SOUS_DOMAINE);
    		exit();
    	}
    	elseif ($page == "accueil_admin"){
    		$path = "controllers/accueil_admin.php";
		}
    }
    include("gabarit.php");
}
