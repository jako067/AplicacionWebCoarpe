<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DailyWorkRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'work_id' => 'required|integer',
            'reporte' => 'required|string',
            'date' => 'required|date',
            'evaluation' => 'required|string',
            'Incidences' => 'nullable|string',
        ];
    }
}
