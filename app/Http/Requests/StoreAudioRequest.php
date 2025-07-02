<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAudioRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'audios' => 'required|array',
            'audios.*' => 'file|mimes:mp3,wav,ogg|max:50480'
        ];
    }

        public function messages(){
        return [
            'audios.required' => "The audios field it's required",
            'audios.array' => "The audios field needs to be of type array"
        ];
    }
}
