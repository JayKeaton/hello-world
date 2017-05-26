<?php



function traitementUploadImage($name, $dossierDestination, $newFilename){
    if (!isset($_FILES[$name])){
        return array(false, "Aucun fichier envoyé.");
    }
    else{
        $file = $_FILES[$name];
        $listeExtensions = array("image/png", "image/jpg", "image/jpeg");
        if ($file['error'] != 0){
            return array(false, "Une erreur est survenue.");
        }
        elseif (!in_array($file['type'], $listeExtensions)){
            return array(false, "Veuillez utiliser une image en format png ou jpeg.");
        }
        elseif ($file['size'] > 1048576){
            return array(false, "Veuillez utiliser un image de moins de 1 Mo.");
        }
        else{
            $extension = explode("/", $file['type'])[1];
            $destination = $dossierDestination."/".$newFilename.".".$extension;
            move_uploaded_file($file['tmp_name'], $destination);
            return array(true, $newFilename.".".$extension);
        }
    }
}