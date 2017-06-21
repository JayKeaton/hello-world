<link href="static/signup/style.css" rel="stylesheet" type="text/css">
<h1 id="title">Veuillez renseigner vos informations pour completer l'inscription</h1>
<h4 id="titlebis">Chez SoliLink, nous prenons à coeur la sécurité de vos données, et les données que vous entrez ne peuvent être utilisées que par nous, afin de garantir une meilleure utilisation de nos services.</h4>

<article id="inscription">
    <form method="post" action="" id="formulaireInscription">
        <div>
            <h2>Utilisateur</h2>
            <div>
                <div>
                    <h5>
                        Email ou courriel: <span class="required">*</span>
                    </h5>
                    <input type="email" id="email" name="email" value="<?php echo((empty($_POST['email'])) ? "" : $_POST['email']); ?>" placeholder="example@email.fr" required="required" />
                    <?php echo((empty($erreur['email'])) ? "" : "<p style='color: red;'>".$erreur['email']."</p>"); ?>
                </div>
                <div>
                    <h5>Pseudo: <span class="required">*</span></h5>
                    <input type="text" id="pseudo" name="pseudo" value="<?php echo((empty($_POST['pseudo'])) ? "" : $_POST['pseudo']); ?>" placeholder="Votre pseudo" autofocus required="required" />
                    <?php echo((empty($erreur['pseudo'])) ? "" : "<p style='color: red;'>".$erreur['pseudo']."</p>"); ?>
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
                    <input type="password" id="mdp" name="mdp" value="" placeholder="" required="required" />
                    <?php echo((empty($erreur['mdp'])) ? "" : "<p style='color: red;'>".$erreur['mdp']."</p>"); ?>
                </div>
                <div>
                    <h5>
                        Confirmation: <span class="required">*</span>
                    </h5>
                    <input type="password" id="mdpv" name="mdpv" value="" placeholder="" required="required" />
                    <?php echo((empty($erreur['mdpv'])) ? "" : "<p style='color: red;'>".$erreur['mdpv']."</p>"); ?>
                </div>
            </div>
        </div>

        <div>
            <h2>Informations personnelles</h2>
            <div>
                <div>
                    <h5>
                        Prenom: <span class="required">*</span>
                    </h5>
                    <input type="text" id="prenom" name="prenom" placeholder="Votre prénom" value="<?php echo((empty($_POST['prenom'])) ? "" : $_POST['prenom']); ?>" required="required" />
                    <?php echo((empty($erreur['prenom'])) ? "" : "<p style='color: red;'>".$erreur['prenom']."</p>"); ?>
                </div>
                <div>
                    <h5>
                        Nom: <span class="required">*</span>
                    </h5>
                    <input type="text" id="Nom" name="nom" value="<?php echo((empty($_POST['nom'])) ? "" : $_POST['nom']); ?>" placeholder="Votre nom" required="required" autofocus />
                    <?php echo((empty($erreur['nom'])) ? "" : "<p style='color: red;'>".$erreur['nom']."</p>"); ?>
                </div>
            </div>
        </div>

        <div>
            <h2>Contact</h2>
            <div>
                <div>
                    <h5>Numéro de téléphone:</h5>
                    <input type="tel" id="telephone" name="telephone" placeholder="01 40 21 29 29" value="<?php echo((empty($_POST['telephone'])) ? "" : $_POST['telephone']); ?>" />
                    <?php echo((empty($erreur['telephone'])) ? "" : "<p style='color: red;'>".$erreur['telephone']."</p>"); ?>
                </div>
            </div>
        </div>

        <div>
            <h2>Autre</h2>
            <div>
                <div>
                    <h5>Sexe:</h5>
                    <select id="sexe" name="sexe">
                        <option value="homme" <?php echo((!empty($_POST['sexe']) && $_POST['sexe'] == "homme") ? "selected='selected'" : ""); ?>>Homme</option>
                        <option value="femme" <?php echo((!empty($_POST['sexe']) && $_POST['sexe'] == "femme") ? "selected='selected'" : ""); ?>>Femme</option>
                        <option value="autre" <?php echo((!empty($_POST['sexe']) && $_POST['sexe'] == "autre") ? "selected='selected'" : ""); ?>>Autre</option>
                    </select>
                    <?php echo((empty($erreur['sexe'])) ? "" : "<p style='color: red;'>".$erreur['sexe']."</p>"); ?>
                </div>
                <div>
                    <h5>Date de naissance :</h5>
                    <div>
                        <select name="jour" id="jour">
                            <?php
                            for($i = 1; $i <= 31; $i++){
                                if (!empty($_POST['jour']) && $_POST['jour'] == $i){
                                    echo ("<option value=".$i." selected='selected'>".$i."</option>");
                                }
                                else{
                                    echo ("<option value=".$i.">".$i."</option>");
                                }
                            }
                            ?>
                        </select>
                        <select name="mois" id="mois">
                            <?php
                            foreach($listeMois as $key => $value){
                                if (!empty($_POST['mois']) && $_POST['mois'] == $key){
                                    echo ("<option value=".($key)." selected='selected'>".$value."</option>");
                                }
                                else{
                                    echo ("<option value=".($key).">".$value."</option>");
                                }
                            }
                            ?>
                        </select>
                        <select name="annee" id="annee">
                            <?php
                            for($i = 2000+date("y"); $i >= 1900; $i--){
                                if (!empty($_POST['annee']) && $_POST['annee'] == $i){
                                    echo ("<option value=".$i." selected='selected'>".$i."</option>");
                                }
                                else{
                                    echo ("<option value=".$i.">".$i."</option>");
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <?php echo((empty($erreur['dateNaissance'])) ? "" : "<p style='color: red;'>".$erreur['dateNaissance']."</p>"); ?>
                </div>
            </div>
        </div>



        <div>
            <h2>Adresse</h2>
            <div>
                <div>
                    <h5>Code postal:</h5>
                    <input type="number" name="codePostal" id="codePostal" value="<?php echo((empty($_POST['codePostal'])) ? "" : $_POST['codePostal']); ?>" placeholder="Exemple: 75001"/>
                    <?php echo((empty($erreur['codePostal'])) ? "" : "<p style='color: red;'>".$erreur['codePostal']."</p>"); ?>
                </div>
                <div>
                    <h5>Votre adresse:</h5>
                    <textarea id="adresse" name="adresse" placeholder="8 rue Saint Sabin, Paris"><?php echo((empty($_POST['adresse'])) ? "" : $_POST['adresse']); ?></textarea>
                    <?php echo((empty($erreur['adresse'])) ? "" : "<p style='color: red;'>".$erreur['adresse']."</p>"); ?>
                </div>
            </div>
        </div>


        <div>
            <h2>Géolocalisation</h2>
            <div>
                <div>
                    <h5>Activer</h5>
                    <input type="checkbox" value='autoriser' name="geolocalisation" id="geolocalisation" <?php echo((!empty($_POST['geolocalisation']) && $_POST['geolocalisation']) ? "checked" : ""); ?>>
                    <?php echo((empty($erreur['geolocalisation'])) ? "" : "<p style='color: red;'>".$erreur['geolocalisation']."</p>"); ?>
                </div>
            </div>
        </div>


        <div id="div_submit">
            <input type="submit" name="submit" value="Suivant" id="submit" />
        </div>
    </form>
</article>
 