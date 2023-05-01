<?php

class Test_model{

    private $validator;
    private $answers;
    private $results;

    private $answerAR;

    function __construct($array){
        require_once("app/models/validators/resultVerificator.php");
        $this->validator = new ResultVerificator();

        $this->answers["fio"] = $array["fio"];
        $this->answers["group"] = $array["group"];
        $this->answers["hm"] = $array["hm"];
        $this->answers["q2"] = ($array["q21"] ?? "")." ".($array["q22"] ?? "")." ".($array["q23"] ?? "")." ".($array["q24"] ?? "")." ".($array["q25"] ?? "");
        $this->answers["lq"] = $array["lq"];
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
        $this->validator->setRule("fio", "isFIO");

        return $this->validator->validate($array);
    }

    function verificationResults($array){
        $this->results = $this->validator->verificationResults($array);
    }

    function getErrorsValidate(){
        $this->validator->showErrors();
    }

    function saveResults(){
        require_once("app/models/activeRecords/testAnswerAR.php");
        $this->answerAR = new Answer($this->answers, $this->results);
        $this->answerAR->save();
    }

    function getAnswers(){
        return $this->answers;
    }

    function getFio(){
        return $this->answers["fio"];
    }

    function getGroup(){
        return $this->answers["group"];
    }

    function getHm(){
        return $this->answers["hm"];
    }

    function getQ2(){
        return $this->answers["q2"];
    }

    function getLq(){
        return $this->answers["lq"];
    }

    function getRes($q){
        return $this->results[$q];
    }
    
}
