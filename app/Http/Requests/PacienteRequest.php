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
            'telefono.*'=>'required|string|distinct|min:9',
            'padecimiento'=>'required',
            'recomendacion' => 'nullable|string|max:20',
            'fechaNacimiento' => 'required|before_or_equal:today',
            'trabajo.direccionTrabajo' => 'nullable|string|max:70',
            'trabajo.profesion' => 'nullable|string|max:30',
            'estudia.carrera' => 'nullable|string|max:50',
            'estudia.grado' => 'nullable|string|max:20',
            'estudia.nombreInstitucion' => 'nullable|string|max:70',
            'encargados.nombreMadre' => 'nullable|string|max:50',
            'encargados.nombrePadre' => 'nullable|string|max:50',
            'encargados.ocupacionMadre' => 'nullable|string|max:50',
            'encargados.ocupacionPadre' => 'nullable|string|max:50',
        ];
    }


    public function messages()
    {
        return [
            'telefono.min' => 'Debe existir al menos un numero de contacto',
            'telefono.max' => 'Debe existir menos de tres numeros de contacto',
            'telefono.*.distinct'=>'No debe contener telefonos duplicados',
            'telefono.*.min'=>'La longitud del numero celular debe ser de 9 digitos incluyendo - (guion)',
            'encargados.nombreMadre.max' => 'El nombre de la madre de tener menos de 51 caracteres',
            'encargados.nombrePadre.max' => 'El nombre de la padre de tener menos de 51 caracteres',
            'encargados.ocupacionMadre.max' => 'La ocupación de la madre de tener menos de 51 caracteres',
            'encargados.ocupacionPadre.max' =>'La ocupación de el padre de tener menos de 51 caracteres',
            'trabajo.direccionTrabajo.max' => 'La dirección de trabajo de tener menos de 71 caracteres',
            'trabajo.profesion.max' => 'La profesión debe de tener menos de 31 caracteres',
            'estudia.carrera.max' => 'La carrera debe de tener menos de 71 caracteres',
            'estudia.grado.max' => 'La dirección de trabajo de tener menos de 21 caracteres',
            'estudia.nombreInstitucion.max' => 'El nombre de la institución de tener menos de 71 caracteres',
            'telefono.*.required'=>'No se ha digitado al menos un numero de telefono, si no quiere introducir uno elimine el campo'

        ];
    }
}
