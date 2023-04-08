<?php
require_once("app/models/validators/formValidator.php");
class CustomFormValidator extends FormValidator{

    function isGroup($data){
        if ($data === "0") return "вы не выбрали группу";
    }

    function isHighMath($data){
        if (strcasecmp($data, "да") !== 0 && strcasecmp($data, "нет") !== 0) return "первый вопрос \"Высшая математика\" - неверный формат ответа";
    }

    function isHighMathTwo($data){
        if (count_chars($data) < 2) return "второй вопрос \"Высшая математика\" - неверный формат ответа";
    }

    function isFIO($data){
        $re = "/^[А-Я][а-я]+\s[А-Я][а-я]+\s[А-Я][а-я]+$/";
        if (preg_match($re, $data)) return $data." - неподходящий ормат для ФИО";
    }

}