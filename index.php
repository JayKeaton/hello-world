<?php
session_start();
date_default_timezone_set('Europe/Paris'); /*Sert à définir la référence temporelle: essentiel pour l'utilisation du type Temps*/
/* Salut cher Antonin dont l'ordi bug bien comme il faut !!*/


/*
if (!empty($_SESSION['idUtilisateur']))
    echo $_SESSION['idUtilisateur'];
*/

$sous_domaine = $_SERVER['PHP_SELF'];    // Emplacement de ce fichier sur le serveur
$liste = explode("/", $sous_domaine);
$sous_domaine = "";
for ($k = 0; $k < sizeof($liste)-1; $k++){
    $sous_domaine .= $liste[$k]."/";
}
$url = "http://".$_SERVER['HTTP_HOST'];

define('URL_SITE', $url);
define('SOUS_DOMAINE', $sous_domaine);

/*
echo(SOUS_DOMAINE);
echo("<br/>");
echo(URL_SITE);
*/

/*echo($_SESSION['idUtilisateur']);*/

require_once("models/SQLCo.php");
require_once("models/utilisateur.php");
require_once("models/services.php");
require_once("models/modifierServices.php");
require_once("controllers/functions.php");



if (!empty($_GET['page'])){
	$page = $_GET['page'];
}
if (empty($page)){
    $path = "controllers/accueil.php";
}
elseif ($page == "Accueil"){
    $path = "controllers/accueil.php";
}
elseif ($page == "signup"){
    $path = "controllers/signup.php";
}
elseif ($page == "activation"){
	$path = "controllers/activation.php";
}
elseif ($page == "signin"){
    $path = "controllers/signin.php";
}
elseif($page == "profil"){
    loginRequired($page);
    $path = "controllers/profil.php";
}
elseif ($page == "locate"){
    $path = "controllers/locate.php";
}
elseif ($page == "servicesMaps"){
    $path = "controllers/servicesMaps.php";
}
elseif ($page == "ajoutServices"){
    $path = "controllers/ajoutServices.php";
}
elseif ($page == "modifierServices"){
    $path = "controllers/modifierServices.php";
}
elseif ($page == "servicesAffiche"){
    $path = "controllers/servicesAffiche.php";
}
elseif ($page == "logout"){
    $_SESSION = array();
    header("Location: ".SOUS_DOMAINE);
}
elseif ($page == "tests"){
    $path = "controllers/tests.php";
}
elseif ($page == "accueil_admin"){
    $path = "controllers/accueil_admin.php";
}
elseif ($page == "pageServiceAdmin"){
    loginRequired($page);
    $path = "controllers/pageServiceAdminC.php";
}
else{
    include("templates/".$page.".html");
}

include("gabarit.php");
