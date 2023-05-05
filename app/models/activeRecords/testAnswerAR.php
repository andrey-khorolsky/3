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
    private $res;

    
    static function createFromAnswRes($answ = null, $res = null){
        $obj = new self();
        $obj->fio = $answ["fio"];
        $obj->answer1 = $answ["hm"];
        $obj->answer2 = $answ["q2"];
        $obj->answer3 = $answ["lq"];
        $obj->mark1 = $res["1"];
        $obj->mark2 = $res["2"];
        $obj->mark3 = $res["3"];
        $obj->res = $res["0"];

        return $obj;
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

    static function getLastAnswers($count){
        static::createConnect();
        $stmt = static::$pdo->prepare("SELECT * FROM `answers` ORDER BY `date` DESC LIMIT ".$count);

        $stmt->execute();

        $answers = [];

        for ($i=0; $i<$count; $i++){
            $data = $stmt->fetch();
            if (!$data) break;
            $ans = new self();
            foreach($ans as $key=>$val)
                $ans->$key = $data[$key];
            $answers[] = $ans;
        }

        return $answers;
    }
    

    /**
     * Get the value of fio
     */ 
    public function getFio()
    {
        return $this->fio;
    }

    /**
     * Get the value of mark3
     */ 
    public function getMark1()
    {
        return $this->mark1;
    }

    /**
     * Get the value of answer3
     */ 
    public function getAnswer1()
    {
        return $this->answer1;
    }

    /**
     * Get the value of mark3
     */ 
    public function getMark2()
    {
        return $this->mark2;
    }

    /**
     * Get the value of answer3
     */ 
    public function getAnswer2()
    {
        return $this->answer2;
    }

    /**
     * Get the value of mark3
     */ 
    public function getMark3()
    {
        return $this->mark3;
    }

    /**
     * Get the value of answer3
     */ 
    public function getAnswer3()
    {
        return $this->answer3;
    }

    /**
     * Get the value of res
     */ 
    public function getRes()
    {
        return $this->res;
    }
}
