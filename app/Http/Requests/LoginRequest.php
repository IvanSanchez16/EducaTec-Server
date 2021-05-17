<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'matricula' => 'required|exists:users',
            'password' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'matricula.required' => 'Ingrese una matricula',
            'matricula.exists' => 'La matricula ingresada no ha sido registrada',
            'password' => 'Ingrese la contraseña'
        ];
    }
}
