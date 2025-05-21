<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCursoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'        => 'required|min:3',
            'descripcion' => ['required', 'min:10'],
            'categoria'    => 'required',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required'        => 'El nombre es obligatorio',
            'name.min'             => 'El nombre debe tener al menos 3 caracteres',
            'descripcion.required' => 'La descripción es obligatoria',
            'descripcion.min'      => 'La descripción debe tener al menos 10 caracteres',
            'categoria.required'    => 'La categoría es obligatoria',
        ];
    }
    public function attributes(): array
    {
        return [
            'name'        => 'nombre del curso',
            'descripcion' => 'descripción detallada',
            'categoria'    => 'categoría del curso',
        ];
    }
}
