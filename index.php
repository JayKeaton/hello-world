<?php

include("models/SQLCo.php");
include("models/utilisateur.php");



if (!empty($_GET['page']))
    $page = $_GET['page'];

//Ceci est un test -> ne pas prendre en compte


if (empty($page)){
    include("templates/accueil.html");
}
elseif ($page == "signup"){
    include("controllers/signup.php");
}
else{
    include("templates/".$page.".html");
}