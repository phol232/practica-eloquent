{{-- resources/views/contactanos/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Contáctanos')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-md">
    <h1 class="text-3xl font-bold text-gray-800 mb-8 text-center">Déjanos un Mensaje</h1>

    {{-- Mensajes de sesión (ya en layouts.app, pero puedes tener específicos aquí también) --}}
    {{-- El PDF sugiere un alert() JS para el mensaje flash (pág. 70). Es mejor integrarlo en la UI. --}}
    {{-- @if (session('info'))
        <div class="bg-blue-100 border-l-4 border-blue-500 text-blue-700 p-4 mb-6" role="alert">
            <p>{{ session('info') }}</p>
        </div>
    @endif --}}

    <form action="{{ route('contactanos.store') }}" method="POST" class="space-y-6">
        @csrf

        <div>
            <label for="nombre" class="block text-sm font-medium text-gray-700 mb-1">Nombre Completo:</label>
            <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}"
                   class="mt-1 block w-full px-3 py-2 bg-white border @error('nombre') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                   required>
            @error('nombre')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="correo" class="block text-sm font-medium text-gray-700 mb-1">Correo Electrónico:</label>
            <input type="email" name="correo" id="correo" value="{{ old('correo') }}"
                   class="mt-1 block w-full px-3 py-2 bg-white border @error('correo') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                   required>
            @error('correo')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        {{-- Campo Asunto (Opcional, no está en el form del PDF pero sí en el Mailable) --}}
        {{--
        <div>
            <label for="asunto" class="block text-sm font-medium text-gray-700 mb-1">Asunto:</label>
            <input type="text" name="asunto" id="asunto" value="{{ old('asunto') }}"
                   class="mt-1 block w-full px-3 py-2 bg-white border @error('asunto') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @error('asunto')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        --}}

        <div>
            <label for="mensaje" class="block text-sm font-medium text-gray-700 mb-1">Mensaje:</label>
            <textarea name="mensaje" id="mensaje" rows="5"
                      class="mt-1 block w-full px-3 py-2 bg-white border @error('mensaje') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                      required>{{ old('mensaje') }}</textarea>
            @error('mensaje')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <button type="submit"
                    class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Enviar Mensaje
            </button>
        </div>
    </form>
</div>
@endsection