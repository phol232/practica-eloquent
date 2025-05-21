@extends('layouts.app')

@section('content')
  <h1>{{ isset($curso) ? 'Editar Curso' : 'Crear Curso' }}</h1>

  @if($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach($errors->all() as $e)
          <li>{{ $e }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form
    action="{{ isset($curso)
              ? route('cursos.update', $curso)
              : route('cursos.store') }}"
    method="POST"
  >
    @csrf
    @isset($curso) @method('PUT') @endisset

    {{-- Nombre --}}
    <div class="mb-3">
      <label for="name" class="form-label">Nombre</label>
      <input
        type="text"
        id="name"
        name="name"
        class="form-control"
        value="{{ old('name', $curso->name ?? '') }}"
      >
      @error('name')
        <br>
        <span class="text-danger">{{ $message }}</span>
        <br>
      @enderror
    </div>

    {{-- Descripción --}}
    <div class="mb-3">
      <label for="descripcion" class="form-label">Descripción</label>
      <textarea
        name="description"
        id="description"
        class="form-control"
        rows="5"
      >{{ old('description', $curso->descripcion ?? '') }}</textarea>
      @error('description')
        <br>
        <span class="text-danger">{{ $message }}</span>
        <br>
      @enderror
    </div>

    {{-- Categoría --}}
    <div class="mb-3">
      <label for="category" class="form-label">Categoría</label>
      <input
        type="text"
        id="category"
        name="category"
        class="form-control"
        value="{{ old('category', $curso->categoria ?? '') }}"
        maxlength="100"
        placeholder="Ej: Programación, Diseño..."
      >
      @error('category')
        <br>
        <span class="text-danger">{{ $message }}</span>
        <br>
      @enderror
    </div>

    <button class="btn btn-primary">
      {{ isset($curso) ? 'Guardar cambios' : 'Crear Curso' }}
    </button>
  </form>
@endsection
