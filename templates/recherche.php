<?php


?>

<link rel="stylesheet" href="static/recherche/recherche.css" />

<section>

    <h1><em><i>Veuillez présenter votre situation :</i></em></h1>

    <form action="" method="post">
        <h2>Que recherchez-vous ?</h2>
        <?php $form->echoInput('categorie'); ?>
        <br/>
        <h2>Langue d'accueil</h2>
        <?php $form->echoInput('langue') ?>
        <br/>
        <h2>Comment rechercher les services ?</h2>
        <?php $form->echoInput('typeRecherche') ?>
        <br/><br/><br/><br/>
        <input type="hidden" name="coords" id="coords" value="false"/>
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
                            <?php
                            if ($data['typeRecherche'] == "localisation"){
                                echo("<p>");
                                echo("A ".$service['distance']." mètres.");
                                echo("</p>");
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
    <script>
        function maPosition(position) {
            var pos = position.coords.latitude + "," + position.coords.longitude;
            document.getElementById("coords").value = pos;
            document.getElementById("typeRecherchelocalisation").disabled = false;
            document.getElementById("labellocalisation").innerHTML = "Services les plus proche de votre position";
        }

        if(navigator.geolocation)
            navigator.geolocation.getCurrentPosition(maPosition);
    </script>
</section>