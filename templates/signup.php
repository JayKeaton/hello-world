<?php


ob_start();
?>
<link href="static/signup/style.css" rel="stylesheet" type="text/css">
<h1 id="title">Veuillez renseigner vos informations pour completer l'inscription</h1>
<h4 id="titlebis">Chez Error404, nous prenons à coeur la sécurité de vos données, et les données que vous entrez ne peuvent être utilisées que par nous, afin de garantir une meilleure utilisation de nos services.</h4>

<article id="inscription">
    <form method="post" action="" id="formulaireInscription">
        <div>
            <h2>Informations personnelles</h2>
            <div>
                <div>
                    <h5>
                        Prenom: <span class="required">*</span>
                    </h5>
                    <input type="text" id="name2" name="prenom" placeholder="Votre prénom" required="required" autofocus value="<?php echo((empty($_POST['prenom'])) ? "" : $_POST['prenom']); ?>"  />
                </div>
                <div>
                    <h5>
                        Nom: <span class="required">*</span>
                    </h5>
                    <input type="text" id="name1" name="nom" value="<?php echo((empty($_POST['nom'])) ? "" : $_POST['nom']); ?>" placeholder="Votre nom" required="required" autofocus />
                </div>
            </div>
        </div>

        <div>
            <h2>Contact</h2>
            <div>
                <div>
                    <h5>
                        Email ou courriel: <span class="required">*</span>
                    </h5>
                    <input type="email" id="email" name="email" value="<?php echo((empty($_POST['email'])) ? "" : $_POST['email']); ?>" placeholder="example@email.fr" required="required" />
                </div>
                <div>
                    <h5>
                        Numéro de téléphone: <span class="required">*</span>
                    </h5>
                    <input type="phone" id="phone" name="phone" value="<?php echo((empty($_POST['phone'])) ? "" : $_POST['phone']); ?>" required="required" />
                </div>
            </div>
        </div>

        <div>
            <h2>Mot de passe</h2>
            <div>
                <div>
                    <h5>
                        Votre mot de passe: <span class="required">*</span>
                    </h5>
                    <input type="password" id="password" name="mdp" value="" placeholder="" required="required" />
                </div>
                <div>
                    <h5>
                        Confirmation: <span class="required">*</span>
                    </h5>
                    <input type="password" id="mdpv" name="mdpv" value="" placeholder="" required="required" />
                </div>
            </div>
        </div>

        <div>
            <h2>Autre</h2>
            <div>
                <div>
                    <h5>
                        Sexe:
                    </h5>
                    <select id="gender" name="sexe" value="<?php echo((empty($_POST['sexe'])) ? "" : $_POST['sexe']); ?>">
                        <option value="sexe1">Homme</option>
                        <option value="sexe2">Femme</option>
                        <option value="sexe3">Autre</option>
                    </select>
                </div>
                <div>
                    <h5>Date de naissance :</h5>
                    <div>
                        <select name="jour" id="jour">
                            <?php
                            for($i = 1; $i <= 31; $i++){
                                echo ("<option value=".$i.">".$i."</option>");
                            }
                            ?>
                        </select>
                        <select name="mois" id="mois">
                            <?php
                            foreach($listeMois as $key => $value){
                                echo ("<option value=".($key+1).">".$value."</option>");
                            }
                            ?>
                        </select>
                        <select name="annee" id="annee">
                            <?php
                            for($i = 2000+date("y"); $i >= 1900; $i--){
                                echo ("<option value=".$i.">".$i."</option>");
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>



        <div>
            <h2>Adresse</h2>
            <div>
                <div>
                    <h5>
                        Ville :
                    </h5>
                    <input type="text" id="ville" name="ville" placeholder="Exemple : Paris"/>
                </div>
                <div>
                    <h5>
                        Nom de la rue :
                    </h5>
                    <textarea id="rue" name="rue" placeholder="Exemple : Avenue des Champs Elisées" style="resize: none;"></textarea>
                </div>
                <div>
                    <h5>
                        Numéro:
                    </h5>
                    <input type="number" id="numero" name="numero"/>
                </div>
            </div>
        </div>


        <div>
            <h2>Géolocalisation</h2>
            <div>
                <div>
                    <h5>Activer</h5>
                    <input type="checkbox" name="checkbox" value="<?php echo((empty($_POST['checkbox'])) ? "" : $_POST['checkbox']); ?>">
                </div>
            </div>
        </div>


        <div id="div_submit">
            <input type="submit" value="Suivant" id="submit" />
        </div>
    </form>
</article>
    
<div id="google_translate_element"></div><script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'fr', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, autoDisplay: false, multilanguagePage: true}, 'google_translate_element');
}
</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

<?php
$contenu = ob_get_clean();

include("gabarit.php");

