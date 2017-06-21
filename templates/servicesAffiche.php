<head>
    <meta charset="utf-8">
    <title>servicesAffiche</title>
    <link rel="stylesheet" href="static/servicesAffiche/style.css" />
</head>

<div id="container">
    <h1>Affichage des points d'intérets</h1>
    <script>
        var liste = [];
        <?php
            foreach($adresses as $e){
                echo("var l = {localisation: '".addslashes($e['adresse'])."', categorie: '".addslashes($e['categorie'])."', nom: '".addslashes($e['nom'])."'};");
                echo("liste.push(l);");
            }
        ?>

        var listeb = [];
        <?php
            foreach($listeServices as $z){
                echo("var ligne = {nom: '".addslashes($z["nom"])."',adresse: '".addslashes($z["adresse"])."',categorie: '".addslashes($z["categorie"])."',telephone: '".$z["telephone"]."'};");
                echo("listeb.push(ligne);");
            }
        ?>
        var sous_domaine = '<?php echo(SOUS_DOMAINE); ?>';
        console.log(sous_domaine);
    </script>
    </br>

    <span id="text_latlng"></span>
    <div id="map-canvas" style="width:700px;height:500px;margin:auto;"></div>
</div>
<div id="centrer">
    <table>
        <caption><h2>Liste des services:</h2></caption>
        <thead><!-- en-tête -->
            <tr><!-- première ligne -->
                <th>Label</th>
                <th>Nom</th>
                <th>Localisation</th>
                <th>Categorie</th>
                <th>Telephone</th>
                <th>Lien</th>
            </tr>
        </thead>
        <tbody id="servicesA">

        </tbody>
    </table>
</div>
</br>
<input type="button"  value="Localiser sur Google Map" onclick="TrouverAdresse();" onsubmit="document.getElementById('button').disabled='diabled'"/>
<input type="submit" value="Afficher la liste des services" onclick="afficheServices();" onclick="TrouverAdresse();" onsubmit="document.getElementById('submit').disabled='diabled'"/>
<!-- Include Javascript -->

<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&language=fr"></script>
<script type="text/javascript" src="static/servicesAffiche/functions.js"></script> 
