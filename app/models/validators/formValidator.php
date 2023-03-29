<?php

class FormValidator{
    
    private $rules = [];
    private $errors = [];

    function isNotEmpty($data){
        if (is_null($data) || trim($data) === "") return "some value is empty";
        // return true;
    }

    function isInteger($data){
        if (!is_int($data)) return $data." is not integer";
        // return true;
    }

    function isLess($data, $value){
        if (!is_int($data)) return "not int";
        if ($data > $value) return $data." is less than ".$value;
        // return true;
    }

    function isGreater($data, $value){
        if (!is_int($data) || $data < $value) return $data." is greater than ".$value;
        // return true;
    }

    function isEmail($data){
        $re = "/^[0-9a-zA-z][0-9a-zA-Z\.]*[0-9a-zA-z]?[^\.]\@[-a-zA-z]+\.[-a-zA-z]{2,}$/";
        if (preg_match($re, $data) !== 1) return "is not email";
        // return null;
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
            // echo $post_arr[$this->rules[$i]["field"]];

            if (is_null($this->rules[$i]["param"]))
                $err = $this->$rule($post_arr[$this->rules[$i]["field"]]);
            else $err = $this->$rule($post_arr[$this->rules[$i]["field"]], $this->rules[$i]["param"]);
            if (!is_null($err)) $this->errors[] = $err;
        }

        // echo count($this->errors);
        // echo var_dump($this->errors);
        if (count($this->errors) === 0) return true;
        return false;
    }

    function showErrors(){
        if (count($this->errors) === 0) return 0;

        foreach ($this->errors as $err){
            echo '<div>
                    <p>'.$err.'</p>
                </div>';
            // echo var_dump($this->errors);
        }
    }
}