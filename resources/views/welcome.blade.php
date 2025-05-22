{{-- resources/views/welcome.blade.php --}}
@extends('layouts.app')

@section('title', 'Bienvenido')

@section('content')
    {{-- Tu contenido actual de welcome.blade.php puede ir aquí, --}}
    {{-- o puedes diseñar un contenido nuevo. Ejemplo: --}}
    <div class="bg-white shadow-md rounded-lg p-6 text-center">
        <h1 class="text-4xl font-bold text-gray-800 mb-4">¡Bienvenido a {{ config('app.name') }}!</h1>
        <p class="text-xl text-gray-600 mb-8">
            Explora nuestros cursos y aprende algo nuevo hoy.
        </p>
        <a href="{{ route('cursos.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg text-lg">
            Ver Cursos
        </a>
    </div>
@endsection