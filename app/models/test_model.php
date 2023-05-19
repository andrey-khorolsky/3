<?php

namespace App\Models;
use App\Models\Validators\ResultVerificator;
use App\Models\AR\Answer;

class Test_model{

    private $validator;
    private $answers;
    private $results;

    private $answerAR;

    function __construct($array){
        $this->validator = new ResultVerificator();

        $this->answers["fio"] = $array["fio"];
        $this->answers["group"] = $array["group"];
        $this->answers["hm"] = $array["hm"];
        $this->answers["q2"] = ($array["q21"] ?? "")." ".($array["q22"] ?? "")." ".($array["q23"] ?? "")." ".($array["q24"] ?? "")." ".($array["q25"] ?? "");
        $this->answers["lq"] = $array["lq"];
    }

    function verificationResults($array){
        $this->results = $this->validator->verificationResults($array);
    }


    function saveResults(){
        $this->answerAR = Answer::createFromAnswRes($this->answers, $this->results);
        $this->answerAR->save();
    }

    function findLastAnswers($count){
        $this->answerAR = Answer::getLastAnswers($count);
    }

    function getAnswersAR(){
        return $this->answerAR;
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
