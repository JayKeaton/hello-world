<?php

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