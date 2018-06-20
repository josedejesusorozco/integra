<?php

namespace integra\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Caracteristica_arbolado_request extends FormRequest
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
            'id_levantamiento' => 'required',
            'numero_arbol' => 'required',
            'id_coordenada' => 'required',
            'id_especie' => 'required',
            'id_forma_biologica' => 'required',
            'id_forma_fuste' => 'required',
            'id_condicion' => 'required'
        ];
    }
}
