<?php

class Test_model{

    private $validator;

    function __construct(){
        require_once("app/models/validators/resultVerificator.php");
       $this->validator = new ResultVerificator();
    }

    function validForm($array){
        $this->validator->setRule("fio", "isNotEmpty");
        $this->validator->setRule("group", "isNotEmpty");
        $this->validator->setRule("hm", "isNotEmpty");
        $this->validator->setRule("q2", "isNotEmpty");
        $this->validator->setRule("lq", "isNotEmpty");
        
        $this->validator->setRule("group", "isGroup");
        $this->validator->setRule("hm", "isHighMath");
        $this->validator->setRule("q2", "isHighMathTwo");

        return $this->validator->validate($array);
    }

    function verificationResults($array){
        return $this->validator->verificationResults($array);
    }

    function getErrorsValidate(){
        $this->validator->showErrors();
    }
    
}