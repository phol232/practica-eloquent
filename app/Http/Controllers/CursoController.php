<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Http\Requests\StoreCursoRequest; 
use App\Http\Requests\UpdateCursoRequest; 

class CursoController extends Controller
{
    public function index()
    {
        $cursos = Curso::paginate(15); 
        return view('cursos.index', compact('cursos'));
    }

    public function create()
    {
        return view('cursos.create');
    }

    public function store(StoreCursoRequest $request)
    {
        Curso::create($request->validated());

        return redirect()
            ->route('cursos.index')
            ->with('success', 'Curso creado correctamente');
    }

    public function show(Curso $curso)
    {
        return view('cursos.show', compact('curso'));
    }

    public function edit(Curso $curso)
    {
        return view('cursos.edit', compact('curso'));
    }

    public function update(UpdateCursoRequest $request, Curso $curso)
    {
        $curso->update($request->validated());

        return redirect()
            ->route('cursos.show', $curso)
            ->with('success', 'Curso actualizado correctamente');
    }

    public function destroy(Curso $curso)
    {
        $curso->delete();

        return redirect()
            ->route('cursos.index')
            ->with('success', 'Curso eliminado correctamente');
    }
}