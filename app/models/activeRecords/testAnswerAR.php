<?php

require_once("app/core/basicActiveRecord.php");

class Answer extends BasicActiveRecord{

    public $id;
    public $fio;
    public $answer1;
    public $mark1;
    public $answer2;
    public $mark2;
    public $answer3;
    public $mark3;
    public $res;

    function __construct($answ, $res){
        $this->fio = $answ["fio"];
        $this->answer1 = $answ["hm"];
        $this->answer2 = $answ["q2"];
        $this->answer3 = $answ["lq"];
        $this->mark1 = $res["1"];
        $this->mark2 = $res["2"];
        $this->mark3 = $res["3"];
        $this->res = $res["0"];
    }

    function save(){
        $this->createConnect();
        $stmt = static::$pdo->prepare("INSERT INTO `answers` (`id`, `fio`, `date`, `answer1`, `mark1`, `answer2`, `mark2`, `answer3`, `mark3`, `res`) VALUES (NULL, :fio, CURRENT_TIMESTAMP, :answ1, :mark1, :answ2, :mark2, :answ3, :mark3, :res)");
        
        $stmt->bindParam("fio", $this->fio);
        $stmt->bindParam("answ1", $this->answer1);
        $stmt->bindParam("answ2", $this->answer2);
        $stmt->bindParam("answ3", $this->answer3);
        $stmt->bindParam("mark1", $this->mark1);
        $stmt->bindParam("mark2", $this->mark2);
        $stmt->bindParam("mark3", $this->mark3);
        $stmt->bindParam("res", $this->res);

        $stmt->execute();
    }
    
}