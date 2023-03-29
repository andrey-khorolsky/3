<?php

class Test_model{

    private $formValidator;

    function __construct(){
        require_once("app/models/validators/formValidator.php");
       $this->formValidator = new FormValidator();
    }

    function validForm($array){
        $this->formValidator->setRule("fio", "isNotEmpty");
        $this->formValidator->setRule("group", "isNotEmpty");
        $this->formValidator->setRule("hm", "isNotEmpty");
        $this->formValidator->setRule("hm", "isLess 5");
        $this->formValidator->setRule("lq", "isNotEmpty");

        return $this->formValidator->validate($array);
    }

    function getErrorsValidate(){
        $this->formValidator->showErrors();
    }
}