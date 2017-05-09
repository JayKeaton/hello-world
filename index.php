<?php
session_start();



$sous_domaine = $_SERVER['PHP_SELF'];    // Emplacement de ce fichier sur le serveur
$liste = explode("/", $sous_domaine);
$sous_domaine = "";
for ($k = 0; $k < sizeof($liste)-1; $k++){
    $sous_domaine .= $liste[$k]."/";
}
$url = $_SERVER['HTTP_HOST'];

define('URL_SITE', $url);
define('SOUS_DOMAINE', $sous_domaine);

/*
echo(SOUS_DOMAINE);
echo("<br/>");
echo(URL_SITE);
*/




include("models/SQLCo.php");
include("models/utilisateur.php");


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
elseif ($page == "connexion"){
    include("controllers/connexion.php");
}
elseif ($page == "locate"){
    include("templates/locate.html");
}
else{
    include("templates/".$page.".html");
}