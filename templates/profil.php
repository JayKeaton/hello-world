<?php

ob_start();
?>
<link href="static/profil/profil.css" rel="stylesheet" type="text/css">


<form action="" method="POST">
    <h2>Informations générales :</h2>
    <div>
        <h5>Prénom :</h5>
        <input type="text" name="prenom" id="prenom" value="<?php echo((empty($data['prenom'])) ? "" : $data['prenom']); ?>"/>
    </div>
    <div>
        <h5>Nom :</h5>
        <input type="text" name="nom" id="nom" value="<?php echo((empty($data['nom'])) ? "" : $data['nom']); ?>"/>
    </div>
    <div>
        <h5>Pseudo :</h5>
        <input type="text" name="pseudo" id="pseudo" value="<?php echo((empty($data['pseudo'])) ? "" : $data['pseudo']); ?>"/>
    </div>
    <div>
        <h5>Adresse</h5>
        <div>
            <div>
                <h6>code Postal :
                <input type="number" name="codePostal" id="codePostal" value="<?php echo((empty($data['codePostal'])) ? "" : $data['codePostal']); ?>" />
            </div>
            <textarea></textarea>
        </div>
    </div>
    <div>
        <h5>Votre date de naissance :</h5>
        <div>
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
            <select name="annee" id="annee">
                <?php
                for($i = 2000+date("y"); $i >= 1900; $i--){
                    if($annee == $i)
                        echo ("<option value=".$i." selected='selected'>".$i."</option>");
                    else
                        echo ("<option value=".$i.">".$i."</option>");
                }
                ?>
            </select>
        </div>
        <?php echo((empty($erreur_dateNaissance) ? "" : "<p>".$erreur_dateNaissance."</p><br/>")); ?>
    </div>
    <div>
        <input type="submit" name="info" value="Valider"/>
    </div>
</form>


<form action="" method="POST">
    <h2>Modifier votre addresse email :</h2>
    <div>
        <h5>Votre addresse email actuelle :</h5>
        <p><?php echo($data['mail']); ?></p>
    </div>
    <div>
        <h5>Nouvelle addresse Email :</h5>
        <input type="email" id="mail" name="email"/>
    </div>
    <div>
        <input type="submit" name="changerEmail" value="Valider">
    </div>
</form>



<form action="" method="POST">
    <h2>Changer votre mot de passe :</h2>
    <div>
        <h5>Ancien mot de passe :</h5>
        <input type="password" id="ancienMdp" name="ancienMdp"><br/>
        <?php echo((empty($erreur_ancienMdp) ? "" : "<p>".$erreur_ancienMdp."</p><br/>")); ?>
    </div>
    <div>
        <h5>Nouveau mot de passe</h5>
        <input type="password" id="nouveauMdp" name="nouveauMdp"><br/>
    </div>
    <div>
        <h5>Confirmer votre nouveau mot de passe</h5>
        <input type="password" id="confirmMdp" name="confirmMdp"><br/>
        <?php echo((empty($erreur_confirmMdp) ? "" : "<p>".$erreur_confirmMdp."</p><br/>")); ?>
    </div>
    <div>
        <input type="submit" name="changerMdp" value="Valider"/>
    </div>
</form>

<?php
$contenu = ob_get_clean();

include("gabarit.php");