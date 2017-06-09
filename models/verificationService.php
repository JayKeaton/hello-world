<?php
function dataTypeService ($typeService,$messagesParPage){
	global $bdd;
	$clause=array();
	
	
	/*ici il s'agi de créer un tableau pour le remplir */
	if(!empty($_POST['typeService'])) {
		$a="services.categorie=:typeService";
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
	$req=$bdd -> prepare("SELECT nom,texte,validation,adresseImage FROM descriptions JOIN services ON descriptions.idService = services.idService WHERE $final");
	$req->bindValue('typeService',$typeService);
	$req->execute();
	$data=$req-> fetchAll();
	$nombreDePages = ceil(count($data)/$messagesParPage);
	$retour= array($data,$nombreDePages);
	return $retour;
}
?>
