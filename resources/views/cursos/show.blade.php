@extends('layouts.app')

@section('content')
  <h1>{{ $curso->name }}</h1>

  @if($curso->categoria)
    <p><strong>Categoría:</strong> {{ $curso->categoria }}</p>
  @endif

  <p>{{ $curso->descripcion }}</p>

  <a href="{{ route('cursos.edit', $curso) }}" class="btn btn-warning">
    Editar
  </a>

  <form
    action="{{ route('cursos.destroy', $curso) }}"
    method="POST"
    class="d-inline"
    onsubmit="return confirm('¿Seguro que quieres eliminar este curso?');"
  >
    @csrf
    @method('DELETE')
    <button class="btn btn-danger">Eliminar Curso</button>
  </form>
@endsection
