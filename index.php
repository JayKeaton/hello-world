<?php


$page = $_GET['page'];



if (empty($page)){
	header("Location: /?page=accueil");
}
elseif ($page == "accueil"){
	include("templates/accueil.html");
}
elseif ($page == "dascapital"){
	include("templates/dascapital.html");
}
elseif ($page == "sign_up"){
    include("templates/sign_up.html");
}
else{
	header("Location: /?page=accueil");
}