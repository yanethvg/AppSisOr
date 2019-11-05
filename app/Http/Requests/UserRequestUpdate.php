<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequestUpdate extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

    public $id;
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
        $id = $this->route('id');

        return [
                'nombre'=>'required',
                'usuario'=>'required|unique:users,usuario,'.$id,
                'email'=>'nullable|email|unique:users,email,'.$id,
                'rol'=>'required|exists:roles,slug',

        ];
    }
}
