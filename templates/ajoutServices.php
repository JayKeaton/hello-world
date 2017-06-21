<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="static/ajoutServices/cssAjoutServices.css"/>
<title>Ajout Services</title>
</head>

<body>
	<h1 id="title">Veuillez renseigner vos informations pour completer l'inscription</h1>
    <h4 id="titlebis">Chez Error404, nous prenons à coeur la sécurité de vos données, et les données que vous entrez ne peuvent être utilisées que par nous, afin de garantir une meilleure utilisation de nos services.</h4>
   	<article id="remplissage">
    
    <form method="post" action="" enctype="multipart/form-data">

          

            <fieldset>
                <legend>Contact</legend>

                <label>Nom :

                <input type="text" id="nom" name="nom" value="<?php echo((empty($_POST['nom'])) ? "" : $_POST['nom']); ?>" required="required"/>
                </label></br>

               

                <label for="email">Email ou courriel: <span class="required">*</span>

                </label>

                <input type="email" id="email" name="email" value="<?php echo((empty($_POST['email'])) ? "" : $_POST['email']); ?>" placeholder="example@email.fr" required="required" />
                
                </br>
                <label for="telephone">Numéro de téléphone: <span class="required">*</span>

                </label></br>

                <input type="text" id="telephone" name="telephone" value="<?php echo((empty($_POST['telephone'])) ? "" : $_POST['telephone']); ?>" required="required" />
                </br>
                
                <label for="telephone">Lien site web: <span class="required">*</span>

                </label>

                <input type="text" id="lien_site" name="lien_site" value="<?php echo((empty($_POST['lien_site'])) ? "" : $_POST['lien_site']); ?>" required="required" />
            </fieldset>



            <fieldset>
                <legend>Votre adresse</legend>

                <label for="message">Votre adresse:

                </label>

                <textarea type="text" id="adresse" name="adresse" value="<?php echo((empty($_POST['adresse'])) ? "" : $_POST['adresse']); ?>" placeholder="Entrez votre adresse ici"></textarea>
                </br>
                <label>Code Postal:
                <input type="text" id="codePostal" name="codePostal" value="<?php echo((empty($_POST['codePostal'])) ? "" : $_POST['codePostal']); ?>" required="required" />
                </label>
            </fieldset>
            
        

            <fieldset>

                <legend>Catégorie</legend>

                </br>
                <Label>Langue :
                    <?php $form_service->echoInput("categorie"); ?>
                </label>

            <!--<textarea id="categorie" name="categorie" value="<?php/* echo((empty($_POST['categorie'])) ? "" : $_POST['categorie']);*/ ?>" placeholder="Entrez votre categorie ici"></textarea>-->

            </fieldset>



            <fieldset>
                <legend>Description</legend>

                 </br>
                 <Label>Langue
                    <?php $form_service->echoInput("langue"); ?>
                </Label>
                <textarea id="texte" name="texte" value="<?php echo((empty($_POST['categorie'])) ? "" : $_POST['categorie']); ?>" placeholder="Décrivez ici votre service"></textarea></label>
            </fieldset>

            

            <fieldset>
                <legend>Image de service:</legend>
            
                <!--<img src="<?php/* echo("media/imageService/".$_FILES['imageService']); */?>" height="150" width="150" />-->
                <input type="file" name="imageService" id="imageService"/>
            </fieldset>
            <div id="valide">
                <?php $form_service->submit("Ajouter service"); ?>
            </div>
        

    </form>

    
    </article>
    
<!--div id="google_translate_element"></div><script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'fr', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, autoDisplay: false, multilanguagePage: true}, 'google_translate_element');
}
</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script-->

</body>
</html>
