<?php

namespace Prodesal\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductorStoreRequest extends FormRequest
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
            'nombre' => 'required|string',
            'rut'   => 'required',
            'telefono' => 'required|max:9'
            ];
    }
}
