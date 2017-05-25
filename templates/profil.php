<link href="static/profil/profil.css" rel="stylesheet" type="text/css">



<form action="" method="post" enctype="multipart/form-data">
    <h1>Avatar :</h1>
    <div>
        <img src="<?php echo("media/avatars/".$data['avatar']); ?>" height="150" width="150" />
        <input type="file" name="avatar" id="avatar"/>
        <?php echo((empty($erreur['avatar']) ? "" : "<p>".$erreur['avatar']."</p><br/>")); ?>
    </div>
    <div>
        <input type="submit" name="changerAvatar" value="Valider"/>
    </div>
</form>


<form action="" method="POST">
    <h1>Informations générales :</h1>
    <div>
        <h3>Prénom :</h3>
        <input type="text" name="prenom" id="prenom" placeholder="Votre prénom" value="<?php echo((empty($data['prenom'])) ? "" : $data['prenom']); ?>"/>
        <?php echo((empty($erreur['prenom']) ? "" : "<p>".$erreur['prenom']."</p><br/>")); ?>
    </div>
    <div>
        <h3>Nom :</h3>
        <input type="text" name="nom" id="nom" placeholder="Votre nom" value="<?php echo((empty($data['nom'])) ? "" : $data['nom']); ?>"/>
        <?php echo((empty($erreur['nom']) ? "" : "<p>".$erreur['nom']."</p><br/>")); ?>
    </div>
    <div>
        <h3>Pseudo :</h3>
        <input type="text" name="pseudo" id="pseudo" placeholder="Votre pseudo" value="<?php echo((empty($data['pseudo'])) ? "" : $data['pseudo']); ?>"/>
        <?php echo((empty($erreur['pseudo']) ? "" : "<p>".$erreur['pseudo']."</p><br/>")); ?>
    </div>
    <div>
        <h3>Adresse :</h3>
        <div>
            <div>
                <h4>code Postal :</h4>
                <input type="number" name="codePostal" id="codePostal" placeholder="Exemple: 75001" value="<?php echo((empty($data['codePostal'])) ? "" : $data['codePostal']); ?>" />
                <?php echo((empty($erreur['codePostal']) ? "" : "<p>".$erreur['codePostal']."</p><br/>")); ?>
            </div>
            <div>
                <h4>Lieu :</h4>
                <textarea name="adresse" placeholder="8 rue Saint Sabin, Paris"><?php echo((empty($data['adresse'])) ? "" : $data['adresse']); ?></textarea>
                <?php echo((empty($erreur['adresse']) ? "" : "<p>".$erreur['adresse']."</p><br/>")); ?>
            </div>
        </div>
    </div>
    <div>
        <h3>Votre date de naissance :</h3>
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
        <?php echo((empty($erreur['dateNaissance']) ? "" : "<p>".$erreur['dateNaissance']."</p><br/>")); ?>
    </div>
    <div>
        <input type="submit" name="info" value="Valider"/>
    </div>
</form>


<form action="" method="POST">
    <h1>Modifier votre addresse email :</h1>
    <div>
        <h3>Votre addresse email actuelle :</h3>
        <p><?php echo($data['email']); ?></p>
    </div>
    <div>
        <h3>Nouvelle addresse Email :</h3>
        <input type="email" id="email" name="email" placeholder="example@email.fr"/>
    </div>
    <div>
        <input type="submit" name="changerEmail" value="Valider">
    </div>
</form>



<form action="" method="POST">
    <h1>Changer votre mot de passe :</h1>
    <div>
        <h3>Ancien mot de passe :</h3>
        <input type="password" id="ancienMdp" name="ancienMdp"><br/>
        <?php echo((empty($erreur_ancienMdp) ? "" : "<p>".$erreur_ancienMdp."</p><br/>")); ?>
    </div>
    <div>
        <h3>Nouveau mot de passe</h3>
        <input type="password" id="nouveauMdp" name="nouveauMdp"><br/>
    </div>
    <div>
        <h3>Confirmer votre nouveau mot de passe</h3>
        <input type="password" id="confirmMdp" name="confirmMdp"><br/>
        <?php echo((empty($erreur_confirmMdp) ? "" : "<p>".$erreur_confirmMdp."</p><br/>")); ?>
    </div>
    <div>
        <input type="submit" name="changerMdp" value="Valider"/>
    </div>
</form>