@extends('layouts.app')

@section('content')
  <div class="max-w-4xl mx-auto">
    <h1 class="text-3xl font-bold mb-6">Listado de Cursos</h1>

    @if($cursos->count())
      <ul class="bg-white shadow rounded divide-y divide-gray-200 mb-6">
        @foreach($cursos as $curso)
          <li class="flex justify-between items-center px-6 py-4">
            <div>
              <a href="{{ route('cursos.show', $curso) }}"
                 class="text-blue-600 hover:underline font-medium">
                {{ $curso->name }}
              </a>
              @if($curso->categoria)
                <span class="ml-2 inline-block px-2 py-1 text-xs font-medium text-gray-700 bg-gray-100 rounded">
                  {{ $curso->categoria }}
                </span>
              @endif
            </div>
          </li>
        @endforeach
      </ul>

      <div class="mt-4">
        {{ $cursos->links() }}
      </div>
    @else
      <p class="text-gray-600">No hay cursos registrados aún.</p>
    @endif

    <a href="{{ route('cursos.create') }}"
       class="inline-block mt-6 bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded">
      Crear Nuevo Curso
    </a>
  </div>
@endsection