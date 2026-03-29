<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MaterialRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'material_name'    => 'required|string|max:500',
            'unity_price'      => 'nullable|numeric|between:0,99.99',
            'quantity'         => 'required|integer|min:0|max:10000',
            'supplier_contact' => 'nullable|string|max:500',
        ];
    }
    public function messages(): array
    {
        return [
            'material_name.required' => 'Debes indicar el nombre del material.',
            'material_name.max' => 'El nombre del material no puede superar los 500 caracteres.',

            'unity_price.numeric' => 'El precio unitario debe ser un valor numérico.',
            'unity_price.between' => 'El precio unitario no puede superar los 99.99 €.',

            'quantity.required' => 'Debes indicar la cantidad de material.',
            'quantity.integer'=> 'La cantidad debe ser un número entero sin decimales.',
            'quantity.min'=> 'La cantidad no puede ser negativa.',
            'quantity.max' => 'La cantidad no puede superar las 10,000 unidades.',

            'supplier_contact.max' => 'El contacto del proveedor no puede superar los 500 caracteres.',
        ];
    }
}
