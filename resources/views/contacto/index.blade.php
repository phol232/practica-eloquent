@extends('layouts.app')

@section('title', 'Contáctanos')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-md">
    <h1 class="text-3xl font-bold text-gray-800 mb-8 text-center">Déjanos un Mensaje</h1>

    {{-- Mensajes de sesión --}}
    @if (session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6" role="alert">
            <p>{{ session('success') }}</p>
        </div>
    @endif

    @if (session('error'))
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6" role="alert">
            <p>{{ session('error') }}</p>
        </div>
    @endif

    <form action="{{ route('contactanos.store') }}" method="POST" class="space-y-6">
        @csrf

        <div>
            <label for="nombre" class="block text-sm font-medium text-gray-700 mb-1">Nombre Completo:</label>
            <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}"
                   class="mt-1 block w-full px-3 py-2 bg-white border @error('nombre') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                   required>
            @error('nombre')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Correo Electrónico:</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}"
                   class="mt-1 block w-full px-3 py-2 bg-white border @error('email') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                   required>
            @error('email')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="mensaje" class="block text-sm font-medium text-gray-700 mb-1">Mensaje:</label>
            <textarea name="mensaje" id="mensaje" rows="5"
                      class="mt-1 block w-full px-3 py-2 bg-white border @error('mensaje') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
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