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
        <?php $form->submit("Rechercher"); ?>
    </form>

</section>
<section id="resultats">
    <fieldset>
        <legend>Résultats de la recherche :</legend>

        <!--article>
            <img src="media/isep.jpg" width="200" height="200"/>
            <div>
                <h2><em>L'ISEP</em></h2>
                <p>
                    Ceci est la description du service proposé : Le plus beau, le plus magnifique et le plus
                    efficace service qu'il nous ai été donné de rencontrer :
                    L'Isep. Certain dirons que ce n'est pas vraiment un service, d'autres que ce n'est pas vraiment
                    du bonheur. D'autres enfin diront qu'elle n'as pas sa place sur ce site.
                    Sornettes. Le monde se doit de la connaitre !
                </p>
            </div>
        </article-->

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
</section>