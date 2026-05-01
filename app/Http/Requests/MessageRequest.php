<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MessageRequest extends FormRequest
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
            'type'     => 'required',
            'subject'  => 'required|string|max:255',
            'body'     => 'required|string',
            'document' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'type.required'    => 'Debes seleccionar el tipo de comunicación.',
            'subject.required' => 'Debes indicar el asunto del mensaje.',
            'body.required'    => 'Debes escribir el contenido del mensaje.',
            'document.mimes'   => 'El documento debe ser PDF, JPG o PNG.',
            'document.max'     => 'El documento no puede superar los 2 MB.',
        ];
    }
}
