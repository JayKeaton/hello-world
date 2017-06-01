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
	
	$messagesParPage=10;
	/* obtention du nombre de donné */
	$retour_total=$bdd ->prepare("SELECT nom FROM descriptions JOIN services ON descriptions.idService = services.idService WHERE $final");
	$retour_total->execute();
	$donnees_total=$retour_total-> fetchAll();
	$total=count($retour_total);
	if(empty($_POST['page'])){
		$page=1;
	}
	else{
		$page=$_POST['page'];
	}
	/* obtention du nombre de page max */
	$nombreDePages=ceil($total/$messagesParPage);
	if(!empty($_POST['typeService']) or !empty($_POST['nomService']) or !empty($_POST['adresse']) or !empty($_POST['dejaValide'])){
		$pageActuelle=$page;
		if($pageActuelle<$nombreDePages){
			$pageActuelle=$nombreDePages;
			/* petite sécurité*/
			}
		else{
			$pageActuelle=$page;
		}
		$offset=($pageActuelle-1)*$messagesParPage;
	}
	$req=$bdd -> prepare("SELECT nom,texte,validation FROM descriptions JOIN services ON descriptions.idService = services.idService WHERE $final
	LIMIT $messagesParPage OFFSET $offset");
	$req->execute();
	$data=$req-> fetchAll();
	$retour= array($data,$nombreDePages,$pageActuelle);
	return $retour;
}
?>
