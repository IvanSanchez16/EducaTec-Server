<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(){
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(){
        $method = $this->method();
        if ($method == 'POST')
            return [
                'nombre' => 'required|max:255',
                'apellidos' => 'required|max:255',
                'email' => 'required|email|unique:users',
                'semestre' => 'required|numeric',
                'password' => 'required|min:8|confirmed',
                'carrera' => 'required|exists:carreras,car_id'
            ];
        //else
        return [
            'nombre' => 'max:255',
            'apellidos' => 'max:255',
            'email' => 'email|unique:users',
            'semestre' => 'numeric',
            'password' => 'min:8|confirmed',
            'carrera' => 'exists:carreras,car_id'
        ];
    }

}
