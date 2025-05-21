@extends('layouts.app')

@section('content')
  <h1>Listado de Cursos</h1>

  @if($cursos->count())
    <ul class="list-group mb-3">
      @foreach($cursos as $curso)
        <li class="list-group-item d-flex justify-content-between align-items-center">
          <div>
            <a href="{{ route('cursos.show', $curso) }}">
              {{ $curso->name }}
            </a>
            @if($curso->categoria)
              <span class="badge bg-secondary ms-2">
                {{ $curso->categoria }}
              </span>
            @endif
          </div>
        </li>
      @endforeach
    </ul>

    {{ $cursos->links() }}
  @else
    <p>No hay cursos registrados aún.</p>
  @endif

  <a href="{{ route('cursos.create') }}" class="btn btn-primary">Crear Nuevo Curso</a>
@endsection
