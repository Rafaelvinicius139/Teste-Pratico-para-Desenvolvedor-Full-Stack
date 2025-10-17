<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Permite que qualquer usuário envie o request
    }

    public function rules()
    {
        return [
            'login' => 'required|string', // CPF ou Email obrigatório
        ];
    }

    public function messages()
    {
        return [
            'login.required' => 'O campo CPF ou Email é obrigatório.',
            'login.string' => 'O campo deve ser um texto válido.',
        ];
    }
}
