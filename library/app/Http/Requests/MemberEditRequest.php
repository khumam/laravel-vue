<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemberEditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "name" => 'required|max:255',
            "password"=> 'required|string|min:8|confirmed',
            'gender' => 'required',
            "phone_number"=> 'required|numeric|digits_between:1,13',
            "address"=> 'required',
            "email"=> 'required|string|email|max:255'
        ];
    }
}
