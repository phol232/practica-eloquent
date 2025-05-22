{{-- resources/views/cursos/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Listado de Cursos') {{-- El PDF usa "Bienvenido a la página de los cursos" como título H1 --}}

@section('content')
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-gray-800">
            Listado de Cursos {{-- O "Bienvenido a la página de los cursos" del PDF pág. 19 --}}
        </h1>
        <a href="{{ route('cursos.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg shadow-md transition duration-150 ease-in-out">
            Crear Nuevo Curso
        </a>
    </div>

    @if($cursos->count())
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($cursos as $curso)
                <div class="bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                    <div class="p-6">
                        <h2 class="text-xl font-semibold text-gray-700 mb-2">
                            <a href="{{ route('cursos.show', $curso) }}" class="hover:text-blue-600 transition-colors">
                                {{ $curso->name }}
                            </a>
                        </h2>
                        @if($curso->categoria) {{-- El PDF usa 'categoria' --}}
                            <span class="inline-block bg-indigo-100 text-indigo-700 text-xs font-semibold px-2.5 py-0.5 rounded-full mb-3">
                                {{ $curso->categoria }}
                            </span>
                        @endif
                        <p class="text-gray-600 text-sm mb-4">
                            {{ Str::limit($curso->descripcion, 100) }} {{-- Muestra un extracto --}}
                        </p>
                        <a href="{{ route('cursos.show', $curso) }}" class="text-blue-500 hover:text-blue-700 font-medium text-sm">
                            Ver detalles &rarr;
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-8">
            {{ $cursos->links() }} {{-- Tailwind ya viene configurado para la paginación por defecto --}}
        </div>
    @else
        <div class="bg-white shadow-md rounded-lg p-6 text-center">
            <p class="text-gray-600 text-lg">No hay cursos registrados aún.</p>
        </div>
    @endif
@endsection