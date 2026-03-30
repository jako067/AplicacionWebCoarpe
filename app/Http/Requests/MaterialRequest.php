<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MaterialRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'Material_name' => 'required|string|max:255',
            'Unity_price' => 'required|numeric',
            'Quantity' => 'required|integer',
            'Supplier' => 'required|string|max:255',
            'Contact' => 'required|string|max:255',
        ];
    }
}
