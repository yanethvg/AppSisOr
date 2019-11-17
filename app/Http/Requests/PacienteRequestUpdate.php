<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PacienteRequestUpdate extends FormRequest
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
            'padecimiento'=>'required|string',
            'recomendacion' => 'nullable|string',
            'fecha_nacimiento' => 'required|before_or_equal:today',
            'direccion_trabajo' => 'nullable|string|max:70',
            'profesion' => 'nullable|string|max:30',
            'carrera' => 'nullable|string|max:50',
            'grado' => 'nullable|string|max:20',
            'nombre_institucion' => 'nullable|string|max:70',
            'madre' => 'nullable|string|max:50',
            'padre' => 'nullable|string|max:50',
            'ocupacion_madre' => 'nullable|string|max:50',
            'ocupacion_padre' => 'nullable|string|max:50',
        ];
    }


    public function messages()
    {
        return [
            'telefono.min' => 'Debe existir al menos un numero de contacto',
            'telefono.max' => 'Debe existir menos de tres numeros de contacto',
            'telefono.*.min'=>'La longitud del numero celular debe ser de 9 digitos incluyendo - (guion)',
            'fecha_nacimiento.required' => 'La fecha de nacimiento es requerida',
            'fecha_nacimiento.before_or_equal' => 'La fecha de nacimiento es imposible. Esta fecha es del futuro',
            'madre.max' => 'El nombre de la madre de tener menos de 51 caracteres',
            'padre.max' => 'El nombre de la padre de tener menos de 51 caracteres',
            'ocupacion_madre.max' => 'La ocupación de la madre de tener menos de 51 caracteres',
            'ocupacion_padre.max' =>'La ocupación de el padre de tener menos de 51 caracteres',
            'direccion_trabajo.max' => 'La dirección de trabajo de tener menos de 71 caracteres',
            'profesion.max' => 'La profesión debe de tener menos de 31 caracteres',
            'carrera.max' => 'La carrera debe de tener menos de 71 caracteres',
            'grado.max' => 'La dirección de trabajo de tener menos de 21 caracteres',
            'nombre_institucion.max' => 'El nombre de la institución de tener menos de 71 caracteres',
            'telefono.*.required'=>'No se ha digitado al menos un numero de telefono, si no quiere introducir uno elimine el campo'
        ];
    }
}
