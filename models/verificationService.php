<?php
function dataTypeService ($page){
	global $bdd;
	$clause=array();
	
	/*ici il s'agi de créer un tableau pour le remplir */
	if(!empty($_POST['typeService'])) {
		$a="services.categorie= '" . htmlspecialchars($_POST["typeService"]."'");
		$clause[]=$a;
	}
	if(!empty($_POST['nomService'])) {
		$a="services.nom LIKE '%" . htmlspecialchars($_POST["nomService"]."%'");
		$clause[]=$a;
	}
	if(!empty($_POST['adresse'])) {
		$a="services.adresse LIKE '%" . htmlspecialchars($_POST["adresse"]."%'");
		$clause[]=$a;
	}
	if(!empty($_POST['dejaValide'])) {
		$a="services.validation = 1";
		$clause[]=$a;
	}
	$final = join(" AND ",$clause);
	/*recupéré la base de donné temporaire */
	$offset = ($page - 1)*10;
	$req=$bdd -> prepare("SELECT nom,texte,validation FROM descriptions JOIN services ON descriptions.idService = services.idService WHERE $final
	LIMIT 10 OFFSET $offset");
	$req->execute();
	$data=$req-> fetchAll();
	return $data;
}
?>
