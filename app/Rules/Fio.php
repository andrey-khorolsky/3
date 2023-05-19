<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class Fio implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $re = "/^[А-Я][а-я]+\s[А-Я][а-я]+\s[А-Я][а-я]+$/u";
        if (preg_match($re, $value) !== 1)
            $fail("Вы не правильно ввели Фамилия Имя Отчество");
    }
}
