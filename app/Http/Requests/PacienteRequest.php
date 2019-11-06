<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PacienteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombre'=>'required|string',
            'direccion'=>'required|string',
            'telefono.*'=>'required|string|distinct|min:3',
            'padecimiento'=>'required',
            'recomendacion' => 'nullable|string',
            'fecha_nacimiento' => 'required|string',
        ];
    }
}
