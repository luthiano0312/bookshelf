<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLoanRequest extends FormRequest
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
        $id = $this->route('loan');

        return [
            "studentName" => "required|min:3",
            "book_id" => "required|unique:loans,book_id," . $id,
            "returnDate" => "required|min:10",
            "status" => "",
            "school_id" => "required"
        ];
    }
}
