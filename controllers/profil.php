<?php


$idUtilisateur = $_SESSION['idUtilisateur'];
$data = infoUtilisateur($idUtilisateur);


$listeMois = array('Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre');
if (!empty($data['dateNaissance'])) {
    list($annee, $mois, $jour) = explode("-", $data['dateNaissance']);
}

$erreur = array();

if (!empty($_POST['changerAvatar'])){
    require_once("models/image.php");
    $result = traitementUploadImage("avatar", "media/avatars", $idUtilisateur);
    if ($result[0] == false){
        $erreur['avatar'] = $result[1];
    }
    else{
        modifierAvatar($idUtilisateur, $result[1]);
        header("Location: ");
        exit();
    }
}


elseif (!empty($_POST['info'])){
    $erreur = array();

    $champsRequis = array("prenom", "nom", "pseudo");
    foreach ($champsRequis as $champ){
        if (empty($_POST[$champ])){
            $erreur[$champ] = "Veuillez remplir ce champ.";
        }
    }
    if (empty($_POST['jour']) or empty($_POST['mois']) or empty($_POST['annee']) or $_POST['jour'] < 1 or $_POST['jour'] > 31 or $_POST['mois'] < 1 or $_POST['mois'] > 12 or $_POST['annee'] < 1900 or $_POST['annee'] > (2000+date("y"))){
        $erreur['dateNaissance'] = "Veuillez rentrer une date valide.";
        include("templates/profil.php");
    }
    if (empty($erreur)) {

        $prenom = $_POST['prenom'];
        $nom = $_POST['nom'];
        $pseudo = $_POST['pseudo'];
        $codePostal = $_POST['codePostal'];
        $adresse = $_POST['adresse'];

        $jour = $_POST['jour'];
        $mois = $_POST['mois'];
        $annee = $_POST['annee'];
        $dateNaissance = $annee . "-" . $mois . "-" . $jour;

        $geolocalisation = !empty($_POST['geolocalisation']);

        $result = modifierInfoUtilisateur($idUtilisateur, $prenom, $nom, $pseudo, $codePostal, $adresse, $dateNaissance, $geolocalisation);
        header("Location: ");
        exit();
    }
}




elseif(!empty($_POST['changerEmail'])){
    $email = $_POST['email'];
    if ($email != $data['email']){
        $result = changerMail($idUtilisateur, $email);
        if ($result){
            desactive($idUtilisateur);
            $randint=rand(1,10000);
            $cle = date("Ymdhis".$randint);
            include("controllers/mailto.php");
            envoyerMail($email, $cle, $data['nom'], $data['prenom'], $idUtilisateur, "activationUtilisateur");
            ajouterCle($bdd, $idUtilisateur, $cle);
            header("Location: ");
            exit();
        }
    }
    /*header("Location: ".SOUS_DOMAINE);*/
}




elseif(!empty($_POST['changerMdp'])){
    $ancienMdp = sha1($_POST['ancienMdp']);
    $nouveauMdp = sha1($_POST['nouveauMdp']);
    $confirmMdp = sha1($_POST['confirmMdp']);
    if ($ancienMdp != mdpUtilisateur($idUtilisateur)){
        $erreur_ancienMdp = "Ancien mot de passe incorrect.";
    }
    elseif ($nouveauMdp != $confirmMdp){
        $erreur_confirmMdp = "Confirmation différent du mot de passe.";
    }
    else{
        changerMdp($idUtilisateur, $nouveauMdp);
    }
}





include("templates/profil.php");