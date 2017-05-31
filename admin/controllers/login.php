<?php


$login_form = new Formulaire('login_admin');
$login_form->add('text', 'username')
            ->required(true);
$login_form->add('password', 'password')
            ->required(true);



if ($login_form->isValid()){

}



include("templates/login.php");