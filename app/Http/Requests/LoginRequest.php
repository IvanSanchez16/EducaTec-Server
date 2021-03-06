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
            'nocontrol' => 'required|exists:users',
            'password' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'nocontrol.required' => 'Ingrese un número de control',
            'nocontrol.exists' => 'El numero de control ingresado no ha sido registrado',
            'password' => 'Ingrese la contraseña'
        ];
    }
}
