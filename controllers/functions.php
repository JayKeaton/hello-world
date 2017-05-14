<?php





    function loginRequired($page){
        if (!$_SESSION['idUtilisateur']) {
            header("Location: " . SOUS_DOMAINE . "?page=signin&nextPage=".$page);
            exit;
        }
    }














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