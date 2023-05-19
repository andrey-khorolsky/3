<?php

namespace App\Http\Requests;

use App\Rules\Fio;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class TestRequest extends FormRequest
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
            "group" => "required",
            "hm" => [
                "required",
                Rule::in(["да", "нет"])
            ],
            // "q21" =>
            "lq" => "required"
        ];
    }
}
