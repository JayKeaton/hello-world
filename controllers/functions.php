<?php





    function loginRequired($page){
        if (empty($_SESSION['idUtilisateur'])) {
            header("Location: " . SOUS_DOMAINE . "?page=signin&nextPage=".$page);
            exit;
        }
    }


    function permissionRequired($droits){
        $listeDroits = array('utilisateur' => 1, 'contributeur' => 2, 'admin' => 3);
        if( empty($_SESSION['droits']) || ($listeDroits[$_SESSION['droits']] < $listeDroits[$droits]) ){
            echo("<h1>Vous n'avez pas la permission d'accéder à cette page.</h1>");
            exit();
        }
    }






    function triListe($liste, $fonctionComparaison){
        if (empty($liste[1])){
            return $liste;
        }
        else{
            list($liste1, $liste2) = partition($liste, array(), array());
            $liste1 = triListe($liste1, $fonctionComparaison);
            $liste2 = triListe($liste2, $fonctionComparaison);
            $liste = fusion($liste1, $liste2, $fonctionComparaison);
            return $liste;
        }
    }

    function partition($liste, $liste1, $liste2){
        if (!empty($liste)) {
            $liste1[] = array_pop($liste);
            return partition($liste, $liste2, $liste1);
        }
        else{
            return array($liste1, $liste2);
        }
    }

    function fusion($liste1, $liste2, $fonctionComparaison){
        $liste = array();
        while (!empty($liste1) && !empty($liste2)){
            if ($fonctionComparaison($liste1[0], $liste2[0])){
                $liste[] = array_shift($liste1);
            }
            else{
                $liste[] = array_shift($liste2);
            }
        }
        foreach ($liste1 as $e){
            $liste[] = $e;
        }
        foreach ($liste2 as $e){
            $liste[] = $e;
        }
        return $liste;
    }







class Formulaire{
        protected $listeInput;
        protected $form_Name;

        public function __construct($name){
            $this->form_Name = $name;
        }

        public function add($type, $name){
            $nameInput = "Input_".$type;
            $input = new $nameInput($name);
            $this->listeInput[$name] = $input;
            return $input;
        }

        public function addError($name, $erreur){
            $this->listeInput[$name]->addError($erreur);
            return $this;
        }

        public function get($name){
            return $this->listeInput[$name];
        }

        public function echoInput($name){
            echo($this->listeInput[$name]);
        }

        public function submit($value = "submit"){
            $name = $this->form_Name;
            echo("<input type='submit' name='".$name."' id='".$name."' value='".$value."' >");
        }

        public function isValid(){
            if (empty($_POST[$this->form_Name])){
                return false;
            }
            else {
                $valid = true;
                foreach ($this->listeInput as $name => $input) {
                    $valid = $input->isValid() && $valid;
                }
                return $valid;
            }
        }

        public function get_cleaned_values(){
            $data = array();
            foreach($this->listeInput as $name => $input){
                $data[$name] = $input->get_cleaned_value();
            }
            return $data;
        }

        public function set_values($listeValues){
            $listeInput = $this->listeInput;
            foreach($listeInput as $name => $input){
                if (in_array($name, array_keys($listeValues))){
                    $input->value($listeValues[$name]);
                }
            }
        }
}
/************************************************************************/
abstract class Input{

    protected $erreur;
    protected $name;
    protected $isRequired;
    protected $value;
    protected $id;
    protected $maxLength;


    public function __construct($name) {
        $this->name = $name;
        $this->id = $name;
        $this->erreur = "";
        $this->isRequired = false;
        $this->value = "";
        $this->maxLength = 500;
    }

    public function required($isRequired){
        $this->isRequired = $isRequired;
        return $this;
    }

    public function maxLength($maxLength){
        $this->maxLength = $maxLength;
        return $this;
    }

    public function value($value){
        $this->value = $value;
        return $this;
    }

    public function setId($id){
        $this->id = $id;
        return $this;
    }

    public function addError($erreur){
        $this->erreur .= $erreur;
    }

    public function isValid(){
        if ($this->isRequired && empty($_POST[$this->name])) {
            $this->erreur .= "Veuillez remplir ce champ.";
        }
        if (strlen($_POST[$this->name]) > $this->maxLength){
            $this->erreur .= "Ce champ est limité à ".$this->maxLength." caractères.";
        }
        return ($this->erreur == "");
    }

    public function get_cleaned_value(){
        return htmlspecialchars($_POST[$this->name]);
    }

}
/**************************************************************************************/
class Input_text extends Input{

    public function __construct($name){
        parent::__construct($name);
    }

    public function isValid(){
        return parent::isValid();
    }

    public function __toString(){
        $name = $this->name;
        $id = $this->id;
        $value = $this->value;
        $string = "";
        $string .= "<input type='text' name='".$name."' id='".$id."' value='".$value."'/>";
        if ($this->erreur != "")
            $string .= "</br><p class='error'>".$this->erreur."</p>";
        return $string;
    }
}
/**************************************************************************************/
class Input_password extends Input{

    public function __construct($name)
    {
        parent::__construct($name);
    }

    public function isValid(){
        return parent::isValid();
    }

    public function __toString(){
        $name = $this->name;
        $id = $this->id;
        $value = $this->value;
        $string = "";
        $string .= "<input type='password' name='".$name."' id='".$id."' value='".$value."'/>";
        if ($this->erreur != "")
            $string .= "</br><p class='error'>".$this->erreur."</p>";
        return $string;
    }
}
/**************************************************************************************/
class Input_select extends Input{

    protected $listeValeurs;

    public function __construct($name){
        parent::__construct($name);
    }

    public function isValid(){
        parent::isValid();
        if (!empty($_POST[$this->name]) && !in_array($_POST[$this->name], array_keys($this->listeValeurs))){
            $this->erreur .= "Veuillez selectionner une option valide.";
        }
        return ($this->erreur == "");
    }

    public function affecterValeurs($listeValeurs){
        $this->listeValeurs = $listeValeurs;
        return $this;
    }

    public function __toString(){
        $name = $this->name;
        $id = $this->id;
        $listeValeurs = $this->listeValeurs;
        $string = "";
        $string .= "<select name='".$name."' id='".$id."'/>";
        foreach ($listeValeurs as $key => $value) {
            $selected = ($this->value == $key) ? "selected" : "";
            $string .= "<option value='".$key."' ".$selected.">".$value."</option>";
        }
        $string .= "</select>";
        if ($this->erreur != "")
            $string .= "<p class='error'>".$this->erreur."</p>";
        return $string;
    }
}
/**************************************************************************************/
class Input_email extends Input{

    public function __construct($name){
        parent::__construct($name);
    }

    public function isValid(){
        return parent::isValid();
    }

    public function __toString(){
        $name = $this->name;
        $id = $this->id;
        $value = $this->value;
        $string = "";
        $string .= "<input type='email' name='".$name."' id='".$id."' value='".$value."'/>";
        if ($this->erreur != "")
            $string .= "</br><p class='error'>".$this->erreur."</p>";
        return $string;
    }
}

/**************************************************************************************/
class Input_tel extends Input{

    public function __construct($name){
        parent::__construct($name);
    }

    public function isValid(){
        return parent::isValid();
    }

    public function __toString(){
        $name = $this->name;
        $id = $this->id;
        $value = $this->value;
        $string = "";
        $string .= "<input type='tel' name='".$name."' id='".$id."' value='".$value."'/>";
        if ($this->erreur != "")
            $string .= "</br><p class='error'>".$this->erreur."</p>";
        return $string;
    }
}
