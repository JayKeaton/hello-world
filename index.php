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
require_once("models/services.php");
require_once("controllers/functions.php");


if (!empty($_GET['page'])){
	$page = $_GET['page'];
}
    



if (empty($page)){
    include("controllers/accueil.php");
}
elseif ($page == "Accueil"){
    include("controllers/accueil.php");
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
elseif ($page == "ajoutServices"){
    include("controllers/ajoutServices.php");
}
elseif ($page == "modifierServices"){
    include("controllers/modifierServices.php");
}
elseif ($page == "servicesAffiche"){
    include("controllers/servicesAffiche.php");
}
elseif ($page == "logout"){
    $_SESSION = array();
    header("Location: ".SOUS_DOMAINE);
}
elseif ($page == "tests"){
    include("controllers/tests.php");
}
elseif ($page == "accueil_admin"){
    include("controllers/acceuil_admin.php");
}
elseif ($page == "pageServiceAdmin"){
    include("controllers/pageServiceAdminC.php");
}
else{
    include("templates/".$page.".html");
} 
