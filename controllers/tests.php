<?php


$form = new Formulaire("test", 'POST');

$form->addInput('text', 'test')
        ->label("Salut !");
$form->addInput('submit', 'submit');




echo $form;