<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookStoreRequest extends FormRequest
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
            "isbn" => 'required|numeric|unique:books',
            "title"=> 'required|string|max:255',
            "year"=> 'required|numeric',
            "publisher_id"=> 'required',
            "author_id"=> 'required',
            "catalog_id"=> 'required',
            "qty"=> 'required|numeric',
            "price"=> 'required'
        ];
    }
}
