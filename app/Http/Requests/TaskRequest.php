<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
            'task_date'     => 'required|date',
            'entry_time'    => 'required',
            'exit_time'     => 'required',
            'break_minutes' => 'required|integer|min:0',
            'extra_hours'   => 'required|numeric|min:0',
        ];
    }

    public function messages(): array
    {
        return [
            'task_date.required'  => 'Debes indicar la fecha de la jornada.',
            'entry_time.required' => 'Debes indicar la hora de entrada.',
            'exit_time.required'  => 'Debes indicar la hora de salida.',
            'break_minutes.required' => 'Debes indicar los minutos de descanso.',
            'extra_hours.required'   => 'Debes indicar las horas extra.',
        ];
    }
}
