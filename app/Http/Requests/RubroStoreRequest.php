<?php

namespace Prodesal\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RubroStoreRequest extends FormRequest
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
            'nombre_rubro' => 'required|unique:rubros,nombre_rubro'
        ];
    }
}
