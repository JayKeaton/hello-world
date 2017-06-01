<?php


$login_form = new Formulaire('login_admin');
$login_form->add('text', 'email')
            ->required(true);
$login_form->add('password', 'password')
            ->required(true);



if ($login_form->isValid()){
    $data = $login_form->get_cleaned_values();
    list($idUtilisateur,$mdpBdd,$verification,$droits) = connexionUtilisateur($data['email']);

}



include("templates/login.php");