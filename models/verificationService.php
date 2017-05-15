<?php

function dataTypeService ($typeService){
	global $bdd;
	$req=$bdd -> prepare("SELECT nom,description FROM service WHERE typeService=:typeService");
	$req->bindvalue('typeService', typeService);
	$req->execute();
	$data=$req-> fretch();
	reurn $data;
}