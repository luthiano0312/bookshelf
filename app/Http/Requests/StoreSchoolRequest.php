<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSchoolRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $this->merge([
            'cnpj' => preg_replace('/\D/', '', $this->cnpj),
        ]);

        return [
            "name" => "required|min:3",
            "cnpj" => "required|digits:14|unique:schools,cnpj",
            "email" => "required|email|unique:schools,email"
        ];
    }
}
