<?php

class FormValidator{
    
    private $rules = [];
    private $errors = [];

    function isNotEmpty($data){
        if (is_null($data) || trim($data) === "") return "некоторые поля не заполнены";
    }

    function isInteger($data){
        if (!is_int($data)) return $data." не число";
    }

    function isLess($data, $value){
        if (!is_int($data)) return "не число";
        if ($data > $value) return $data." меньше чем ".$value;
    }

    function isGreater($data, $value){
        if (!is_int($data) || $data < $value) return $data." больше чем ".$value;
    }

    function isEmail($data){
        $re = "/^[0-9a-zA-z][0-9a-zA-Z\.]*[0-9a-zA-z]?[^\.]\@[-a-zA-z]+\.[-a-zA-z]{2,}$/";
        if (preg_match($re, $data) !== 1) return "is not email";
    }

    function setRule($field_name, $validator_name){
        if (str_contains($validator_name, " ")){
            $param = substr($validator_name, strpos($validator_name, " ")+1);
            $validator_name = substr($validator_name, 0, strpos($validator_name, " "));
        }
        else $param = null;
        $this->rules[] = ["field"=>$field_name, "validator"=>$validator_name, "param"=>$param];
    }

    function validate($post_arr){

        for ($i=0; $i<count($this->rules); $i++){
            $rule = $this->rules[$i]["validator"];

            if (is_null($this->rules[$i]["param"]))
                $err = $this->$rule($post_arr[$this->rules[$i]["field"]]);
            else $err = $this->$rule($post_arr[$this->rules[$i]["field"]], $this->rules[$i]["param"]);
            if (!is_null($err)) $this->errors[] = $err;
        }

        if (count($this->errors) === 0) return true;
        return false;
    }

    function showErrors(){
        if (count($this->errors) === 0) return 0;

        foreach ($this->errors as $err){
            echo '<div>
                    <p>'.$err.'</p>
                </div>';
        }
    }
}