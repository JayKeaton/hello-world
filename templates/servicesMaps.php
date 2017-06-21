<!DOCTYPE html> 
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Calcul d'itinéraire</title>
    <link rel="stylesheet" href="static/servicesMaps/style.css" type="text/css" /> 
  </head>
 
  <body>
    <div id="container">
        <h1>Calcul d'itinéraire Google Maps</h1>
        <div id="destinationForm">
            <form action="" method="get" name="direction" id="direction">
                <label>Point de départ :</label>
				<input type="text" name="origin" id="origin" value="">
                <label>Destination :</label>
                <input type="text" name="destination" id="destination" value="<?php echo $localisation; ?>">
                <input type="button" value="Calculer l'itinéraire" onclick="javascript:calculate()">
            </form>
        </div>
        <div id="panel"></div>
        <div id="map">
            <p>Veuillez patienter pendant le chargement de la carte...</p>
        </div>
    </div>
    
    <!-- Include Javascript 
    <script type="text/javascript" src="static/servicesMaps/jquery.min.js"></script>
    <script type="text/javascript" src="static/servicesMaps/jquery-ui-1.8.12.custom.min.js"></script>-->
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&language=fr"></script>
    <script type="text/javascript" src="static/servicesMaps/functions.js"></script>
    
  </body>
</html>
