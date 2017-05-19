<?php





    function loginRequired($page){
        if (!$_SESSION['idUtilisateur']) {
            header("Location: " . SOUS_DOMAINE . "?page=signin&nextPage=".$page);
            exit;
        }
    }















/************************************************************************/
class Formulaire{

    protected $listeInput;
    protected $method;



    public function __construct($uniqid, $method = 'get') {
        $this->listeInput = array();
        $this->method = $method;
    }

    public function addInput($type, $name){
        $field = 'Input_'.$type;
        $input = new $field($name);
        $this->listeInput[] = $input;
        return $input;
    }

    public function addErreur($name, $message_erreur){
        foreach ($this->listeInput as $input) {
            if ($input->name == $name){
                $input->erreur = true;
                $input->message_erreur = $message_erreur;
            }
        }
    }


    public function __toString()
    {
        $method = $this->method;
        $string = "<form action='' method='".$method."'>";
        foreach ($this->listeInput as $input){
            $string .= $input."</br>";
        }
        $string .= "</form>";
        return $string;
    }
}
/**************************************************************************************/
abstract class Input{

    protected $erreur;
    protected $message_erreur;
    protected $name;
    protected $label;


    public function __construct($name) {
        $this->name = $name;
    }

    public function label($label){
        $this->label = $label;
        return $this;
    }
}
/**************************************************************************************/
class Input_text extends Input{

    public function __construct($name){
        parent::__construct($name);
    }

    public function __toString(){
        $name = $this->name;
        $string = "";
        $string .= "<label for='".$name."'>".$this->label." : </label>";
        $string .= "<input type='text' name='".$name."' id='".$name."'/>";
        if ($this->erreur)
            $string .= "<p>".$this->message_erreur."</p>";
        return $string;
    }
}
/**************************************************************************************/
class input_submit extends Input{

    public function __construct($name)
    {
        parent::__construct($name);
    }

    public function __toString()
    {
        $string = "<input type='submit' value='Valider'/>";
        return $string;
    }
}
/**************************************************************************************/
class input_password extends Input{

    public function __construct($name)
    {
        parent::__construct($name);
    }

    public function __toString()
    {
        $name = $this->name;
        $string = "";
        $string .= "<label for='".$name."'>".$this->label." : </label>";
        $string .= "<input type='password' name='".$name."' id='".$name."'/>";
        if ($this->erreur)
            $string .= "<p>".$this->message_erreur."</p>";
        return $string;
    }
}
/**************************************************************************************/
class input_select extends Input{

    protected $listeValeurs;

    public function __construct($name){
        parent::__construct($name);
    }


    public function affecterValeurs($liste){
        $this->listeValeurs = $listeValeurs;
    }



    public function __toString(){
        $name = $this->name;
        $listeValeurs = $this->listeValeurs;
        $string = "";
        $string .= "<label for='".$name."'>".$this->label." : </label>";
        $string .= "<select name='".$name."' id='".$name."'/>";
        foreach ($listeValeurs as $key => $value) {
            
        }
        $string .= "/<select>";
        if ($this->erreur)
            $string .= "<p>".$this->message_erreur."</p>";
        return $string;
    }


}
