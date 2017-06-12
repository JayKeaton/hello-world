<?php
session_start();


$sous_domaine = $_SERVER['PHP_SELF'];    // Emplacement de ce fichier sur le serveur
$liste = explode("/", $sous_domaine);
$sous_domaine = "";
for ($k = 0; $k < sizeof($liste)-2; $k++){
    $sous_domaine .= $liste[$k]."/";
}
$url = "http://".$_SERVER['HTTP_HOST'];

define('URL_SITE', $url);
define('SOUS_DOMAINE_ROOT', $sous_domaine);
define('SOUS_DOMAINE', $sous_domaine."/admin");


require_once("../models/SQLCo.php");
require_once("../controllers/functions.php");
require_once("../models/utilisateur.php");
require_once("../models/verificationService.php");

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
    	elseif ($page == "accueil_admin"){
    		$path = "controllers/accueil_admin.php";
		}
		elseif ($page == "ajoutAdmin"){
    		$path = "controllers/ajoutAdmin.php";
		}
		elseif ($page == "profil"){
		    $path = "../controllers/profil.php";
        }
    }
    include("gabarit.php");
}
