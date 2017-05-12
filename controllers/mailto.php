<?php


function envoyerMail($email, $hash, $nom, $prenom, $idu){
$root = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';
$mail = $email; // Déclaration de l'adresse de destination.
if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) // On filtre les serveurs qui rencontrent des bogues.
{
	$passage_ligne = "\r\n";
}
else
{
	$passage_ligne = "\n";
}
//=====Déclaration des messages au format texte et au format HTML.
$message_txt = "Bonjour ".$nom ." ".$prenom.". Pour activer votre compte, veuillez cliquer sur le lien ci dessous ou le copier/coller dans votre navigateur internet.
 
".$root."?page=activation&log=".urlencode($idu)."&cle=".urlencode($hash)."
 
 
---------------
Ceci est un mail automatique, Merci de ne pas y répondre.

L'équipe ERROR 404";

$message_html = "<html><head></head><body><p>Bonjour ".$nom ." ".$prenom.".</p><p> Pour activer votre compte, veuillez cliquer sur le lien ci dessous ou le copier/coller dans votre navigateur internet.</p>
 
<p>".$root."?page=activation&log=".urlencode($idu)."&cle=".urlencode($hash)."</p>
 
 
<p>---------------</p>
<p>Ceci est un mail automatique, Merci de ne pas y répondre.</p>

<p>L'équipe ERROR 404</p></body></html>";
//==========
 
//=====Création de la boundary
$boundary = "-----=".md5(rand());
//==========
 
//=====Définition du sujet.
$sujet = "Confirmation email";
//=========
 
//=====Création du header de l'e-mail.
$header = "From: \"AdminMSF\"<error404@mail.fr>".$passage_ligne;
$header.= "Reply-to: \"AdminMSF\" <error404@mail.fr>".$passage_ligne;
$header.= "MIME-Version: 1.0".$passage_ligne;
$header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
//==========
 
//=====Création du message.
$message = $passage_ligne."--".$boundary.$passage_ligne;
//=====Ajout du message au format texte.
$message.= "Content-Type: text/plain; charset=\"ISO-8859-1\"".$passage_ligne;
$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
$message.= $passage_ligne.$message_txt.$passage_ligne;
//==========
$message.= $passage_ligne."--".$boundary.$passage_ligne;
//=====Ajout du message au format HTML
$message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
$message.= $passage_ligne.$message_html.$passage_ligne;
//==========
$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
//==========
 
//=====Envoi de l'e-mail.
mail($mail,$sujet,$message,$header);
//==========

}
?>
