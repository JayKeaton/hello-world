<?php


$root =
    (!empty($_SERVER['HTTPS']) ? 'https' : 'http'). // https ?
    '://'.
    $_SERVER['HTTP_HOST'].  // Adresse du serveur
    $_SERVER['REQUEST_URI'];    // Chemin relatif du dossier courant sur le serveur

define('CHEMIN_SITE', $root);


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
else{
    include("templates/".$page.".html");
}