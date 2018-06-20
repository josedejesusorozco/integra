<?php

namespace integra\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Caracteristica_repoblado_request extends FormRequest
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
            'tipo_repoblado' => 'required',
            'nombre_comun' => 'required',
            'numero_colecta' => 'required',
            'frecuencia' => 'required',
            'edad' => 'required',
            'porcentaje_cobertura' => 'required'
        ];
    }
}
