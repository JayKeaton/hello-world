<head>
    <meta charset="utf-8">
    <title>servicesAffiche</title>
    <link rel="stylesheet" href="static/servicesAffiche/style.css" />
</head>

<div id="container">
    <h1>Affichage des points d'intérets</h1>


    <div id="recherche">
        <!--p>Rechercher les services autour de votre position ou d'une adresse donnée :</p-->
        <form action="" method="post">
            <div>
                <p>Rechercher les services autour de votre position :</p>
                <input type="checkbox" name="utiliserLoc" id="utiliserLoc" disabled onclick="utiliserLocalisation();"/><br/>
                <p id="error_loc">Vous devez autoriser la geolocalisation.</p>
                <input type="hidden" value="" id="coords" name="coords"/>
            </div>
            <div id="chercher_adresse">
                <p>Rechercher les services autour de cette adresse :</p>
                <input type="text" name="adresse" id="adresse"/>
            </div>
            <input type="submit" value="Rechercher"/>
        </form>

    </div>

    <script>
        var liste = [];
        <?php
            $rechercheParDistance = false;
            $liste = null;
            if (empty($listePlusProcheServices)){
                $liste = $listeServices;
                echo("var rechercheParDistance = false;");
            }
            else{
                $liste = $listePlusProcheServices;
                echo("var rechercheParDistance = true;");
                $rechercheParDistance = true;
            }
            foreach($liste as $z){
                echo("var ligne = {nom: '".addslashes($z["nom"])."',adresse: '".addslashes($z["adresse"])."',categorie: '".addslashes($z["categorie"])."',telephone: '".$z["telephone"]."'};");
                if ($rechercheParDistance){
                    echo("ligne['distance'] = '".addslashes($z["distance"])."m';");
                }
                echo("liste.push(ligne);");
            }
        ?>
        console.log("test");
        var sous_domaine = '<?php echo(SOUS_DOMAINE); ?>';
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
                <?php
                echo($rechercheParDistance ? "<th>Distance</th>" : "");
                ?>
                <th>Lien</th>
            </tr>
        </thead>
        <tbody id="servicesA">

        </tbody>
    </table>
</div>
</br>
<input type="button" id="localiserServices" value="Localiser sur Google Map" onclick="TrouverAdresse();" onsubmit="document.getElementById('button').disabled='diabled'"/>
<input type="button" id="afficherListeServices" value="Afficher la liste des services" onclick="afficheServices();"/>
<!-- Include Javascript -->

<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&language=fr"></script>
<script type="text/javascript" src="static/servicesAffiche/functions.js"></script> 
