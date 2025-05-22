{{-- resources/views/nosotros.blade.php --}}
@extends('layouts.app')

@section('title', 'Nosotros')

@section('content')
    <div class="bg-white shadow-md rounded-lg p-6">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Sobre Nosotros</h1>
        <p class="text-gray-600 leading-relaxed">
            Somos {{ config('app.name') }}, una plataforma dedicada a ofrecer cursos de alta calidad.
            Nuestra misión es facilitar el aprendizaje y el desarrollo profesional a través de contenido
            actualizado y práctico. Este es un texto de ejemplo para la página "Nosotros".
        </p>
    </div>
@endsection