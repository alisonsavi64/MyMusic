<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'description' => "required|string",
            'user_id' => "required|integer"
        ];
    }

    public function messages(){
        return [
            'description.required' => "The description field it's required",
            'description.string' => "The description field needs to be of type string",
            'user_id.required' => "The user_id field it's required",
            'user_id.integer' => "The user_id field needs to be of type int"
        ];
    }
}
