<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>servicesAffiche</title>
</head>

<body><!DOCTYPE html> 
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Services de la BDD</title>
  </head>
  <body>
<div id="container">
        <h1>Affichage des points d'intérets</h1>
<script>
	console.log("test");
    var liste = [];
    <?php
    foreach($adresses as $e){
        echo("liste.push('".$e["localisation"]."');");	
    	}
    ?>
	console.log("test");
	
	var listeb = [];
	var ligne = {localisation: 'loc',categorie: 'cat',phone: 'phone'};
	<?php
	foreach($listeServices as $z){
		echo("var ligne = {localisation: '".$z["localisation"]."',categorie: '".$z["categorie"]."',telephone: '".$z["telephone"]."'};");
		echo("listeb.push(ligne);");
	}
	?>
	//console.log(listeb);
</script>
 
  <form>
  <input type="button"  value="Localiser sur Google Map" onclick="TrouverAdresse();"/>
  </form>
<span id="text_latlng"></span>
<div id="map-canvas" style="float:center;height:420px;width:75%"></div>
    </div>
	  
	  <table>
	<caption>Liste des services:</caption>
	<thead><!-- en-tête -->
		<tr><!-- première ligne -->
			<th> Localisation </th>
			<th>| Categorie </th>
			<th>| Telephone </th>
		</tr>
	</thead>
	<tbody id="servicesA">
	
	</tbody>
</table>
	 <input type="submit" value="afficher liste des services" onclick="afficheServices();"/>
    <!-- Include Javascript -->
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&language=fr"></script>
    <script type="text/javascript" src="static/servicesAffiche/functions.js"></script> 
	
  </body>
</html>
</body>
</html>
