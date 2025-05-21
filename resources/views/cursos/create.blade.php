@extends('layouts.app')

@section('content')
  <h1>Crear Curso</h1>

  @if($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach($errors->all() as $e)
          <li>{{ $e }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('cursos.store') }}" method="POST">
    @csrf

    {{-- Nombre --}}
    <label>
      Nombre:
      <br>
      <input type="text" name="name" value="{{ old('name') }}"> <!-- el campo "name" es de tipo STRING -->
    </label>
    <!-- directiva del tipo de error -->
    @error('name')
      <br>
      <span>*{{ $message }}</span>
      <br>
    @enderror

    <br>

    {{-- Descripción --}}
    <label>
      Descripción:
      <br>
      <textarea name="descripcion" rows="5">{{ old('descripcion') }}</textarea> <!-- el campo "description" es de tipo TEXT -->
    </label>
    <!-- directiva del tipo de error -->
    @error('descripcion')
      <br>
      <span>*{{ $message }}</span>
      <br>
    @enderror

    <br>

    {{-- Categoría --}}
    <label>
      Categoría:
      <br>
      <input type="text" name="categoria" value="{{ old('categoria') }}"> <!-- el campo "category" es de tipo STRING -->
    </label>
    <!-- directiva del tipo de error -->
    @error('categoria')
      <br>
      <span>*{{ $message }}</span>
      <br>
    @enderror

    <br><br>

    <button type="submit" class="btn btn-primary">
      Crear Curso
    </button>
  </form>
@endsection
