<?php

namespace App\Http\Requests;

use App\Rules\Fio;
use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "fio" => [
                "required",
                "string",
                new Fio
            ],
            "birth" => "required",
            "sex" => "required",
            "age" => "required",
            "email" => [
                "required",
                "regex:/^[0-9a-zA-z][0-9a-zA-Z\.]*[0-9a-zA-z]?[^\.]\@[-a-zA-z]+\.[-a-zA-z]{2,}$/"
            ],
            "tel" => [
                "required",
                "regex:/^\+[37][0-9]{9,11}$/"
            ]
        ];
    }
}
