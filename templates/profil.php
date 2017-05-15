
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <!--link href="static/signin/signin.css" rel="stylesheet" type="text/css"-->
    </head>

    <body>



        <h2>Informations générales :</h2>
        <form action="" method="POST">
            <label for="prenom">Prénom :</label>
            <input type="text" name="prenom" id="prenom" value="<?php echo((empty($data['prenom'])) ? "" : $data['prenom']); ?>"/><br/>

            <label for="nom">Nom :</label>
            <input type="text" name="nom" id="nom" value="<?php echo((empty($data['nom'])) ? "" : $data['nom']); ?>"/><br/>

            <label for="pseudo">Pseudo :</label>
            <input type="text" name="pseudo" id="pseudo" value="<?php echo((empty($data['pseudo'])) ? "" : $data['pseudo']); ?>"/><br/>

            <p>Votre date de naissance :</p>

            <label for="jour">Jour :</label>
            <select name="jour" id="jour">
                <?php
                for($i = 1; $i <= 31; $i++){
                    if ($jour == $i)
                        echo ("<option value=".$i." selected='selected'>".$i."</option>");
                    else
                        echo ("<option value=".$i.">".$i."</option>");
                }
                ?>
            </select>

            <label for="mois">Mois :</label>
            <select name="mois" id="mois">
                <?php
                foreach($listeMois as $key => $value){
                    if ($mois == ($key+1))
                        echo ("<option value=".($key+1)." selected='selected'>".$value."</option>");
                    else
                        echo ("<option value=".($key+1).">".$value."</option>");
                }
                ?>
            </select>

            <label for="annee">Année :</label>
            <select name="annee" id="annee">
                <?php
                for($i = 2000+date("y"); $i >= 1900; $i--){
                    if($annee == $i)
                        echo ("<option value=".$i." selected='selected'>".$i."</option>");
                    else
                        echo ("<option value=".$i.">".$i."</option>");
                }
                ?>
            </select><br/>
            <?php echo((empty($erreur_dateNaissance) ? "" : "<p>".$erreur_dateNaissance."</p><br/>")); ?>
            <input type="submit" name="info" value="Valider"/>
        </form>


        <h2>Modifier votre addresse email :</h2>
        <p>Votre addresse email actuelle : <?php echo($data['mail']); ?></p>
        <form action="" method="POST">
            <label for="email">Nouvelle addresse Email :</label>
            <input type="email" id="mail" name="email"/><br/>
            <input type="submit" name="changerEmail" value="Valider">
        </form>



        <h2>Changer votre mot de passe :</h2>
        <form action="" method="POST">
            <label for="ancienMdp">Ancien mot de passe :</label>
            <input type="password" id="ancienMdp" name="ancienMdp"><br/>
            <?php echo((empty($erreur_ancienMdp) ? "" : "<p>".$erreur_ancienMdp."</p><br/>")); ?>
            <label for="nouveauMdp">Nouveau mot de passe</label>
            <input type="password" id="nouveauMdp" name="nouveauMdp"><br/>
            <label for="confirmMdp">Confirmer votre nouveau mot de passe</label>
            <input type="password" id="confirmMdp" name="confirmMdp"><br/>
            <?php echo((empty($erreur_confirmMdp) ? "" : "<p>".$erreur_confirmMdp."</p><br/>")); ?>
            <input type="submit" name="changerMdp" value="Valider"/>
        </form>



    </body>
</html>