<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactanosRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; 
    }

    public function rules(): array
    {
        return [
            'nombre' => 'required|string|max:255',
            'correo' => 'required|email|max:255',
            'asunto' => 'nullable|string|max:255', 
            'mensaje' => 'required|string|min:10',
        ];
    }

    public function messages(): array
    {
        return [
            'nombre.required' => 'Tu nombre es obligatorio.',
            'correo.required' => 'Necesitamos tu correo electrónico para contactarte.',
            'correo.email' => 'Por favor, ingresa un correo electrónico válido.',
            'mensaje.required' => 'No olvides escribir tu mensaje.',
            'mensaje.min' => 'El mensaje debe tener al menos :min caracteres.',
        ];
    }

    public function attributes(): array
    {
        return [
            'nombre' => 'Nombre Completo',
            'correo' => 'Correo Electrónico',
            'asunto' => 'Asunto del Mensaje',
            'mensaje' => 'Cuerpo del Mensaje',
        ];
    }
}