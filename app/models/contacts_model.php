<?php

class Contacts_model{

    private $formValidator;

    function __construct(){
        require_once("app/models/validators/formValidator.php");
       $this->formValidator = new FormValidator();
    }

    function validForm($array){
        $this->formValidator->setRule("fio", "isNotEmpty");
        $this->formValidator->setRule("birth", "isNotEmpty");
        $this->formValidator->setRule("sex", "isNotEmpty");
        $this->formValidator->setRule("age", "isNotEmpty");
        $this->formValidator->setRule("email", "isNotEmpty");
        $this->formValidator->setRule("tel", "isNotEmpty");
        
        $this->formValidator->setRule("email", "isEmail");

        return $this->formValidator->validate($array);
    }

    function getErrorsValidate(){
        $this->formValidator->showErrors();
    }

}