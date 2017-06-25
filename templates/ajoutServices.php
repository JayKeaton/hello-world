
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="static/ajoutServices/cssAjoutServices.css"/>
    <title>Ajout Services</title>
</head>

<h1 id="title">Veuillez renseigner vos informations pour completer l'inscription</h1>
<h4 id="titlebis">Chez Error404, nous prenons à coeur la sécurité de vos données, et les données que vous entrez ne peuvent être utilisées que par nous, afin de garantir une meilleure utilisation de nos services.</h4>
<article id="remplissage">
    <form method="post" action="" enctype="multipart/form-data">

        <fieldset>
            <legend>Contact</legend>

            <label for="nom">Nom :</label>
            <br/>
            <?php $form_service->echoInput('nom'); ?>
            <br/>

            <label for="email">
                Email ou courriel: <span class="required">*</span>
            </label>
            <br/>
            <?php $form_service->echoInput('email'); ?>
            <br/>

            <label for="telephone">
                Numéro de téléphone: <span class="required">*</span>
            </label>
            <br/>
            <?php $form_service->echoInput('telephone'); ?>
            <br/>

            <label for="lien_site">
                Lien site web: <span class="required">*</span>
            </label>
            <br/>
            <?php $form_service->echoInput('lien_site'); ?>
        </fieldset>



        <fieldset>
            <legend>Votre adresse</legend>

            <label for="message">
                Votre adresse:
            </label>
            <br/>
            <?php $form_service->echoInput('adresse'); ?>
            <br/>

            <label for="codePostal">Code Postal:</label>
            <br/>
            <?php $form_service->echoInput('codePostal'); ?>
        </fieldset>



        <fieldset>
            <legend>Catégorie</legend>

            <br/>
            <Label for="categorie">Catégorie :</Label>
            <?php $form_service->echoInput("categorie"); ?>
        </fieldset>



        <fieldset>
            <legend>Description</legend>
            <br/>
            <Label for="langue">Langue:</Label>
            <?php $form_service->echoInput("langue"); ?>
            <br/>

            <Label for="description">Description:</Label>
            <br/>
            <?php $form_service->echoInput("description"); ?>
        </fieldset>



        <fieldset>
            <legend>Image de service:</legend>
            <input type="file" name="imageService" id="imageService"/>
        </fieldset>
        <div id="valide">
            <?php $form_service->submit("Ajouter service"); ?>
        </div>


    </form>
</article>
