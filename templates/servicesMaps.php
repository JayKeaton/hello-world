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
            <label for="loc">Utiliser votre géolocalisation</label><input id="loc" onclick="javascript:localisation()" name="loc" type="checkbox"/>
        </div>
        <div id="panel"></div>
        <div id="map">
            <p>Veuillez patienter pendant le chargement de la carte...</p>
        </div>
    </div>
    
    <!-- Include Javascript 
    <script type="text/javascript" src="static/servicesMaps/jquery.min.js"></script>
    <script type="text/javascript" src="static/servicesMaps/jquery-ui-1.8.12.custom.min.js"></script>-->
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyDT5oEC54mkENpmg_wBxNGEEkBMMl0bOzk&sensor=false&language=fr"></script>
    <script type="text/javascript" src="static/servicesMaps/functions.js"></script>
    <script>
    function maPosition(position) {
        var pos = position.coords.latitude + "," + position.coords.longitude;
        document.getElementById("origin").value = pos;
    }


    function localisation(){
        if(document.getElementById("loc").checked == true && navigator.geolocation){
            document.getElementById("origin").disabled = true;
            navigator.geolocation.getCurrentPosition(maPosition);
        }
        else{
            document.getElementById("origin").disabled = false;
            document.getElementById("origin").value = "";
        }
    }
    </script>
  </body>
</html>
