<?php

function dataTypeService ($typeService,$nomService,$arrondissement,$page){
	global $bdd;
	$clause=array();
	/*ici il s'agi de crer un tableau pour le remplir */
	if(!empty($_POST['typeService'])) {
		$a="services.categorie= '" . htmlspecialchars($_POST["typeService"]."'");
		$clause[]=$a;
	}
	if(!empty($_POST['nomService'])) {
		$a="descriptions.nom LIKE '%" . htmlspecialchars($_POST["nomService"]."%'");
		$clause[]=$a;
	}
	/* */
	$final = join("AND",$clause);
	$offset = ($page - 1)*10;
	$req=$bdd -> prepare("SELECT nom,texte FROM descriptions JOIN services ON descriptions.idService = services.idService WHERE $final
	LIMIT 10 OFFSET $offset");
	$req->execute();
	$data=$req-> fetchAll();
	return $data;
}

?>