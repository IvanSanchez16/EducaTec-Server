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
                'matricula' => 'required|numeric',
                'nombre' => 'required|max:255',
                'apellido_paterno' => 'required|max:255',
                'apellido_materno' => 'required|max:255',
                'fecha_de_ingreso' => ['regex:/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/'],
                'password' => 'required|min:8|confirmed',
                'tipo_de_usuario' => 'required|exists:tiposusuarios,tu_id',
                'carrera' => 'required|exists:carreras,car_id'
            ];
        //else
        return [
            'matricula' => 'numeric',
            'nombre' => 'max:255',
            'apellido paterno' => 'max:255',
            'apellido materno' => 'max:255',
            'fecha de ingreso' => ['regex:/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/'],
            'tipo de usuario' => 'exists:tiposusuarios,tu_id',
            'carrera' => 'exists:carreras,car_id'
        ];
    }

}
