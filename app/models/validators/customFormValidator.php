<?php
require_once("app/models/validators/formValidator.php");
class CustomFormValidator extends FormValidator{

    function isGroup($data){
        if ($data === "0") return "you dont pick group";
    }

    function isHighMath($data){
        if (strcasecmp($data, "да") !== 0 && strcasecmp($data, "нет") !== 0) return "high math without answer";
    }

    function isHighMathTwo($data){
        if (count_chars($data) < 2) return "second question high math without answer";
    }

}