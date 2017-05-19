<?php


$idUtilisateur = $_SESSION['idUtilisateur'];
$data = infoUtilisateur($idUtilisateur);


$listeMois = array('Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre');
if (!empty($data['dateNaissance'])) {
    list($annee, $mois, $jour) = explode("-", $data['dateNaissance']);
}

/*
$form_info = new Formulaire('form_info', 'POST');
$form_info->add('text', 'prenom');
$form_info->add('text', 'nom');
$form_info->add('text', 'pseudo');
$form_info->add('text', 'prenom');
*/



if (!empty($_POST['info'])){
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $pseudo = $_POST['pseudo'];
    $jour = $_POST['jour'];
    $mois = $_POST['mois'];
    $annee = $_POST['annee'];
    if ($jour < 1 or $jour > 31 or $mois < 1 or $mois > 12 or $annee < 1900 or $annee > (2000+date("y"))){
        $erreur_dateNaissance = "Veuillez rentrer une date valide.";
        include("templates/profil.php");
    }
    else {
        $dateNaissance = $annee . "-" . $mois . "-" . $jour;
        $result = modifierInfoUtilisateur($idUtilisateur, $prenom, $nom, $pseudo, $dateNaissance);
        /*header("Location: ".SOUS_DOMAINE);*/
    }
}
elseif(!empty($_POST['changerEmail'])){
    $email = $_POST['email'];
    if ($email != $data['mail']){
        $result = changerMail($idUtilisateur, $email);
        if ($result){
            desactive($idUtilisateur);
            $randint=rand(1,10000);
            $cle = date("Ymdhis".$randint);
            include("controllers/mailto.php");
            envoyerMail($email, $cle, $data['nom'], $data['prenom'], $idUtilisateur);
            ajouterCle($bdd, $idUtilisateur, $cle);
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
        include("templates/profil.php");
    }
    elseif ($nouveauMdp != $confirmMdp){
        $erreur_confirmMdp = "Confirmation différent du mot de passe.";
        include("templates/profil.php");
    }
    else{
        changerMdp($idUtilisateur, $nouveauMdp);
    }
}
else {
    include("templates/profil.php");
}