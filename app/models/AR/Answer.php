<?php

namespace App\Models\AR;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model{

    public $id;
    public $fio;
    public $answer1;
    public $mark1;
    public $answer2;
    public $mark2;
    public $answer3;
    public $mark3;
    private $res;

    
    static function createFromAnswRes($answ, $res){
        $obj = new self();
        $obj["fio"] = $answ["fio"];
        $obj["answer1"] = $answ["hm"];
        $obj["answer2"] = $answ["q2"];
        $obj["answer3"] = $answ["lq"];
        $obj["mark1"] = $res["1"];
        $obj["mark2"] = $res["2"];
        $obj["mark3"] = $res["3"];
        $obj["res"] = $res["0"];

        return $obj;
    }
    

    static function getLastAnswers($count){
        return Answer::orderBy("date", "desc")->skip(1)->limit($count)->get();
    }
    

    /**
     * Get the value of fio
     */ 
    public function getFio()
    {
        return $this["fio"];
    }

    /**
     * Get the value of mark3
     */ 
    public function getMark1()
    {
        return $this["mark1"];
    }

    /**
     * Get the value of answer3
     */ 
    public function getAnswer1()
    {
        return $this["answer1"];
    }

    /**
     * Get the value of mark3
     */ 
    public function getMark2()
    {
        return $this["mark2"];
    }

    /**
     * Get the value of answer3
     */ 
    public function getAnswer2()
    {
        return $this["answer2"];
    }

    /**
     * Get the value of mark3
     */ 
    public function getMark3()
    {
        return $this["mark3"];
    }

    /**
     * Get the value of answer3
     */ 
    public function getAnswer3()
    {
        return $this["answer3"];
    }

    /**
     * Get the value of res
     */ 
    public function getRes()
    {
        return $this["res"];
    }
}
