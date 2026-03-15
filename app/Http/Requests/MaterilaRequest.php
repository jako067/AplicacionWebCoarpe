<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MaterilaRequest extends FormRequest
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
}
