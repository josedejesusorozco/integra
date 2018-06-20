<?php

namespace integra\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Caracteristica_punto_control_request extends FormRequest
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
            'id_levantamiento' => '',
            'id_coordenada' => '',
            'id_condicion_acceso' => '',
            'paraje' => ''
        ];
    }
}
