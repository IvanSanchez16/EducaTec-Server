<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArchivoRequest extends FormRequest
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
        $method = $this->method();
        if ($method == 'POST')
            return [
                'archivo' => 'required|file',
                'materia' => 'required|exists:materias,mat_id',
                'semestre' => 'required|numeric',
                'privado' => 'required|boolean',
                'path' => 'required'
            ];
        return [
            'archivo' => 'required|file',
            'materia' => 'exits:materias,mat_id',
            'semestre' => 'numeric',
            'privado' => 'boolean',
            'path' => 'required'
        ];
    }
}
