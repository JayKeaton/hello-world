<link rel="stylesheet" href="static/recherche/recherche.css" />

<section>

    <h1><em><i>Veuillez présenter votre situation :</i></em></h1>

    <form action="" method="post">
        <h2>Que recherchez-vous ?</h2>
        <?php $form->echoInput('categorie'); ?>
        <br/>
        <h2>Langue d'accueil</h2>
        <?php $form->echoInput('langue'); ?>
        <br/>
        <h2>Comment rechercher les services ?</h2>
        <?php $form->echoInput('typeRecherche'); ?>
        Adresse :
        <?php $form->echoInput('adresseDeRecherche'); ?>
        <br/><br/><br/><br/>
        <input type="hidden" name="coords" id="coords" value="<?php echo(empty($coordsUtilisateur) ? 'false' : $coordsUtilisateur); ?>"/>
        <?php $form->submit("Rechercher"); ?>
    </form>

</section>
<section id="resultats">
    <fieldset>
        <legend>Résultats de la recherche :</legend>

        <?php
        if (isset($listeServices)){
            foreach ($listeServices as $service) {
                if($service['langue'] == $data['langue']){
                    ?>
                    <article>
                        <?php
                        if (empty($service['adresseImage'])) {
                            ?>
                            <img src="media/pictogrammes/<?php echo($data['categorie']); ?>.png" width="200" height="200"/>
                            <?php
                        }
                        else{
                            ?>
                            <img src="media/imageService/<?php echo($service['adresseImage']); ?>" width="200" height="200"/>
                            <?php
                        }
                        ?>
                        <div>
                            <h2><em><?php echo($service['nom']); ?></em></h2>
                            <a href="<?php echo(SOUS_DOMAINE."?page=servicesMaps&adresse=".$service['adresse']); ?>">Aller la-bas</a>
                            <?php
                            if ($data['typeRecherche'] == "localisation" or $data['typeRecherche'] == "adresse"){
                                echo("<div class='distance'>");
                                echo("<img src='static/recherche/marker.png' width='30' />");
                                echo("<p>A ".$service['distance']." mètres.</p>");
                                echo("</div>");
                            }
                            ?>
                            <p>
                                <?php echo($service['texte']); ?>
                            </p>
                            <p>
                                Note : <?php echo($service['note']); ?>
                            </p>
                            <a href="<?php echo(SOUS_DOMAINE."?page=descriptionService&idService=".$service['idService']); ?>">En savoir plus</a>
                        </div>
                    </article>
                    <?php
                }
            }
        }
        ?>

    </fieldset>

    <?php
    if ($geolocaliser) {
        ?>
        <script>
            function maPosition(position) {
                var pos = position.coords.latitude + "," + position.coords.longitude;
                document.getElementById("coords").value = pos;
                document.getElementById("typeRecherchelocalisation").disabled = false;
                document.getElementById("labellocalisation").innerHTML = "Services les plus proche de votre position";
            }

            <?php
            if (empty($coordsUtilisateur)){
            ?>
            if (navigator.geolocation)
                navigator.geolocation.getCurrentPosition(maPosition);
            <?php
            }
            else {
                echo("document.getElementById('typeRecherchelocalisation').disabled = false;");
                echo("document.getElementById('labellocalisation').innerHTML = 'Services les plus proche de votre position';");
            }
            ?>
        </script>
        <?php
    }
    ?>
</section>