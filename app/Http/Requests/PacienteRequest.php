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
            'nombre'=>'required|string',
            'direccion'=>'required|string',
            'telefono' => 'required|array|min:1|max:3',
            'telefono.*'=>'nullable|string|distinct|min:9',
            'padecimiento'=>'required',
            'recomendacion' => 'nullable|string|max:20',
            'fechaNacimiento' => 'required|before_or_equal:today',
            'trabajo.direccionTrabajo' => 'nullable|string|max:70',
            'trabajo.profesion' => 'nullable|string|max:30',
            'estudia.carrera' => 'nullable|string|max:50',
            'estudia.grado' => 'nullable|string|max:20',
            'estudia.nombreInstitucion' => 'nullable|string|max:70',
            'encargados.nombreMadre' => 'nullable|string',
            'encargados.nombrePadre' => 'nullable|string',
            'encargados.ocupacionMadre' => 'nullable|string',
            'encargados.ocupacionPadre' => 'nullable|string',
        ];
    }
}
