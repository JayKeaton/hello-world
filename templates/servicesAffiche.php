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
  <style type="text/css">
    #container{position:relative;width:990px;margin:auto;background:#FFFFFF;padding:20px 0px 20px 0px;}
    #container h1{margin:0px 0px 10px 20px;}
    #container #map{width:700px;height:500px;margin:auto;}
    #container #panel{width:700px;margin:auto;}
    #container #destinationForm{margin:0px 0px 20px 0px;padding:10px 20px;border:solid 1px;}
    #container #destinationForm input[type=text]{border:solid 1px #C0C0C0;}
  </style>
  <body>
<div id="container">
        <h1>Affichage des points d'intérets</h1>
<script>
    var liste = [];
    <?php
    foreach($adresses as $e){
        echo("liste.push('".$e["localisation"]."');");
		//echo '<script>TrouverAdresse();</script>';
		
    }
    ?>
	
</script>
 
  <form>
  <input type="button"  value="Localiser sur Google Map" onclick="TrouverAdresse();"/>
			</form>
<span id="text_latlng"></span>
<div id="map-canvas" style="float:center;height:420px;width:75%"></div>
    </div>
    <!-- Include Javascript -->
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&language=fr"></script>
    <script type="text/javascript" src="static/servicesAffiche/functions.js"></script> 
	
  </body>
</html>
</body>
</html>
