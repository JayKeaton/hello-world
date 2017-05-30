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
        <h2>A quelle tranche d'âge appartennez-vous ?</h2>
        <?php $form->echoInput('age') ?>
        <br/><br/><br/><br/>
        <?php $form->submit("Rechercher"); ?>
    </form>

</section>
<section id="resultats">
    <fieldset>
        <legend>Résultats de la recherche :</legend>

        <article>
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
        </article>

        <?php
        foreach ($listeServices as $service) {
            ?>
            <div>
                <h2><em><?php echo($service['nom']); ?></em></h2>
                <p>
                    
                </p>
            </div>
            <?php
        }
        ?>

    </fieldset>
</section>