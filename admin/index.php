<?php

include("../controllers/functions.php");
include("../models/utilisateur.php");

if (empty($_POST['idUtilisateur'])){
    include("controllers/login.php");
}
else{
    permissionRequired('admin');
    if (empty($_GET['page'])){
        include("controllers/accueil.php");
    }
    else{
        $page = $_GET['page'];
    }
}
