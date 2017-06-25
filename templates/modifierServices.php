
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="static/modifierService/modifierService.css"/>
    <title>Modifier Services</title>
</head>


<h1>Choisissez votre service a modifier</h1>

<form method="post" action="" >
    <?php
    $form_idService->echoInput("idService");
    $form_idService->submit("choisissez votre service");
    ?>
</form>

<?php
if ($afficher) {
    echo("<a href='".SOUS_DOMAINE."?page=gestionSeances&idService=".$idService."'>Gestion des séances de ce service :</a>");
    ?>
    <form method="post" action="" enctype="multipart/form-data">
        <fieldset>
            <legend>Contact</legend>
            <?php $form_modifierService->echoInput('idService'); ?>
            <?php $form_modifierService->echoInput('form_idService'); ?>
            <label for="nom">Nom:</label><br/>
            <?php $form_modifierService->echoInput('nom'); ?><br/>
            <label for="email">Email:</label><br/>
            <?php $form_modifierService->echoInput('email'); ?><br/>
            <label for="adresse">Adresse:</label><br/>
            <?php $form_modifierService->echoInput('adresse'); ?><br/>
            <label for="telephone">Telephone:</label><br/>
            <?php $form_modifierService->echoInput('telephone'); ?><br/>
            <label for="lien_site">Lien de votre site Internet:</label><br/>
            <?php $form_modifierService->echoInput('lien_site'); ?>
        </fieldset>
        <br/>

        <fieldset>
            <legend>Image :</legend>
            <div>
                <img src="<?php echo(empty($data['adresseImage']) ? "media/pictogrammes/".$data['categorie'].".png" : ("media/imageService/" . $data['adresseImage'])); ?>" height="150" width="150"/>
                <input type="file" name="imageService" id="imageService"/>
                <?php echo((empty($erreur['imageService']) ? "" : "<p>" . $erreur['imageService'] . "</p><br/>")); ?>
            </div>
        </fieldset>
        <br/>

        <fieldset>
            <legend>Catégorie</legend>
            <?php $form_modifierService->echoInput("categorie"); ?>
        </fieldset>
        <br/>

        <fieldset>
            <legend>Description</legend>
            <Label for="traductionsExistantes">Langue</Label><br/>
            <?php $form_modifierService->echoInput("traductionsExistantes"); ?><br/>
            <label for="description">Description:</label><br/>
            <?php $form_modifierService->echoInput("description"); ?>
            <?php $form_modifierService->submit("Supprimer cette description"); ?>
        </fieldset>
        <br/>

        <?php $form_modifierService->submit("modifier"); ?>
    </form>


    <form method="post" action="">
        <fieldset>
            <legend>Ajouter une description à votre service :</legend>
            <?php $form_modifierService->echoInput('idService'); ?>
            <?php $form_modifierService->echoInput('form_idService'); ?>
            <Label for="langue">Langue:</Label><br/>
            <?php $form_ajouterDescription->echoInput("langue"); ?><br/>
            <Label for="nouvelleDescription">description:</Label><br/>
            <?php $form_ajouterDescription->echoInput("nouvelleDescription"); ?><br/>
            <?php $form_ajouterDescription->submit("Ajouter"); ?>
        </fieldset>
    </form>

    <?php
}
?>


<?php
if (!empty($listeDescriptions)) {
    ?>
    <script>
        var listeDescriptions = [];
        <?php
        foreach ($listeDescriptions as $description) {
            echo("listeDescriptions[" . $description['idDescription'] . "] = '" . addslashes($description['texte']) . "';");
        }
        ?>
        document.getElementById('traductionsExistantes').onchange = choixDescription;

        function choixDescription(){
            var idDescription = document.getElementById('traductionsExistantes').value;
            var description = document.getElementById('description');
            if (idDescription == 0){
                description.value = "";
            }
            else{
                description.value = listeDescriptions[idDescription];
            }
        }
    </script>
    <?php
}
?>



