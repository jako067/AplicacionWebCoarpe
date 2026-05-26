<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BudgetRequest extends FormRequest
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
            'workers_quantity' => 'required|integer|min:1',
            'hours_quantity'   => 'required|integer|min:1',
            'price_x_hour'     => 'required|numeric|min:0',
        ];
    }
    public function messages(): array
    {
        return [
            'workers_quantity.required' => 'Debes indicar el número de trabajadores.',
            'hours_quantity.required'   => 'Debes indicar las horas estimadas.',
            'price_x_hour.required'     => 'Debes indicar el precio por hora.',
        ];
    }
}
