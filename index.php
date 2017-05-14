<?php
session_start();

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


require_once("models/SQLCo.php");
require_once("models/utilisateur.php");
require_once("controllers/functions.php");


if (!empty($_GET['page']))
    $page = $_GET['page'];


if (empty($page)){
    include("templates/accueil.html");
}
elseif ($page == "signup"){
    include("controllers/signup.php");
}
elseif ($page == "activation"){
	include("controllers/activation.php");
}
elseif ($page == "signin"){
    include("controllers/signin.php");
}
elseif($page == "profil"){
    loginRequired($page);
    include("controllers/profil.php");
}
elseif ($page == "locate"){
    include("controllers/locate.php");
}
elseif ($page == "servicesMaps"){
    include("controllers/servicesMaps.php");
}
elseif ($page == "signout"){
    $_SESSION = array();
}
elseif ($page == "tests"){
    include("controllers/tests.php");
}
else{
    include("templates/".$page.".html");
}