<?php

namespace App\Http\Requests;

use App\Rules\Email;
use App\Rules\Fio;
use Illuminate\Foundation\Http\FormRequest;

class GuestRequest extends FormRequest
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
                new Fio
            ],
            "email" => [
                "required",
                new Email
            ],
            "text" => "required"
        ];
    }

    public function messages(){
        return [
            "fio.required" => "Поле ФИО необходимо заполнить",
            "email.required" => "Поле email необходимо заполнить",
            "email.regex" => "Неверный формат email",
            "text.required" => "Поле с отзывом необходимо заполнить"
        ];
    }
}
