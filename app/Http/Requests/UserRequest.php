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
        $url = $this->route()->uri;
        if ($url == 'api/registro')
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
            'semestre' => 'numeric',
            'carrera' => 'exists:carreras,car_id',
            'foto' => 'file'
        ];
    }

}
