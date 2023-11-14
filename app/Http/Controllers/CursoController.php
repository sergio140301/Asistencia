<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $p1='%'.request()->txtnombre.'%';
        $curso = Curso::where('nombreCurso', 'like',$p1)->paginate(10);
        return view("curso.index", ['cursos' => $curso]); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $curso = new Curso;
        return view("curso.frm3", ['cursos' => $curso]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cursoValidado = request()->validate([
            'nombreCurso' => 'required',
            'areaTematica' => 'required',
            'fechaInicio' => 'required|date_format:Y-m-d',
            'fechaFinal' => 'required|date_format:Y-m-d|after:fechaInicio',
        ], [
            'fechaInicio.required' => 'La fecha de inicio es obligatoria.',
            'fechaFinal.after' => 'La fecha de finalización debe ser posterior a la fecha de inicio.',
        ]);
        Curso::create($cursoValidado);
        return redirect()->route('cursos.index')->with('success', 'Curso agregado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Curso $curso)
    {
        return view('curso.show', ['cursos'=>$curso]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Curso $curso)
    {
        return view('curso.frm3', ['cursos'=>$curso]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Curso $curso)
    {
        $cursoValidado = request()->validate([
            'nombreCurso' => 'required',
            'areaTematica' => 'required',
            'fechaInicio' => 'required|date_format:Y-m-d',
            'fechaFinal' => 'required|date_format:Y-m-d|after:fechaInicio',
        ], [
            'fechaInicio.required' => 'La fecha de inicio es obligatoria.',
            'fechaFinal.after' => 'La fecha de finalización debe ser posterior a la fecha de inicio.',
        ]);
        $curso->update($cursoValidado);
        return redirect()->route('cursos.index')->with('success', 'Curso actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Curso $curso)
    {
        $curso->delete();
        return redirect()->route('cursos.index')->with('success', 'Curso eliminado exitosamente.');
    }
}
