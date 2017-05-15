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
    <link rel="stylesheet" href="static/servicesMaps/jquery-ui-1.8.12.custom.css" type="text/css" /> 
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
   <input type="hidden" id="passvar" name="passvar"  value= <?php echo $adresses ?> />
    <div id="container">
        <h1>Affichage des points d'intérets</h1>
        <div id="panel"></div>
        <div id="map">
            <p>Veuillez patienter pendant le chargement de la carte...</p>
        </div>
    </div>
    
    <!-- Include Javascript -->
    <script type="text/javascript" src="static/servicesAffiche/jquery.min.js"></script>
    <script type="text/javascript" src="static/servicesAffiche/jquery-ui-1.8.12.custom.min.js"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&language=fr"></script>
    <script type="text/javascript" src="static/servicesAffiche/functions.js"></script>
  </body>
</html>
</body>
</html>
