<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UserRegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => [
                'required',
                Password::min(8)
                    ->letters()
                    ->numbers()
                    ->mixedCase()
            ]
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'veuillez saisir l\'adresse mail',
            'email.exists' => 'cet adresse mail existe deja',
            'email.email' => 'Veuillez saisir un mail valide',
            'password.required' => 'Veuillez saisir votre mot de passe',
            'email.min' => 'Minimum 8 caracteres pour votre mot de passe'
        ];
    }
}
