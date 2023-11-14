<?php

namespace App\Http\Controllers;

use App\Models\Lista;
use App\Models\Instructor;
use App\Models\Curso;
use App\Models\asistencia;
use App\Models\Trabajador;
use App\Models\Participante;
use Illuminate\Http\Request;

class ListaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $p1='%'.request()->txtnombre.'%';
        $listas = Lista::where('lugar', 'like',$p1)->paginate(10);
        return view("lista.index", ['listas' => $listas]); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $listas = new Lista;
        $curso = Curso::get();
        $instructor = Instructor::get();
        return view("lista.frm3", [ 'listas' => $listas, 'cursos' => $curso, 'instructores' => $instructor]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $listaValidado = request()->validate([
            'horaInicio' => 'required|date_format:H:i',
            'horaFinal' => 'required|date_format:H:i|after:horaInicio',
            'lugar' => 'required',
            'curso_id' => ['required', function ($attribute, $value, $fail) {
                if ($value == 'Seleccione un curso') {
                    $fail("El campo $attribute es obligatorio. Por favor, seleccione un curso.");
                }
            }],
            'instructor_id' => ['required', function ($attribute, $value, $fail) {
                if ($value == 'Seleccione un instructor') {
                    $fail("El campo $attribute es obligatorio. Por favor, seleccione un instructor.");
                }
            }],
        ]);
        Lista::create($listaValidado);
        return redirect()->route('listas.index')->with('success', 'Lista agregada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Lista $lista)
    {
        $participantesCurso = Trabajador::join('participantes', 'trabajadors.id', '=', 'participantes.trabajador_id')
        ->where('participantes.lista_id', $lista->id)
        ->paginate(10);
        $participante = Participante::where('lista_id', $lista->id)->paginate(10);
        return view('lista.show', ['lista'=>$lista, 'participante'=>$participante, 'trabaja'=>$participantesCurso ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lista $lista)
    {
        $curso = Curso::get();
        $instructor = Instructor::get();
        return view('lista.frm3', [ 'listas'=>$lista, 'cursos'=>$curso, 'instructores' => $instructor]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lista $lista)
    {
        $listaValidado = request()->validate([
            'horaInicio' => 'required|date_format:H:i',
            'horaFinal' => 'required|date_format:H:i|after:horaInicio',
            'lugar' => 'required',
            'curso_id' => ['required', function ($attribute, $value, $fail) {
                if ($value == 'Seleccione un curso') {
                    $fail("El campo $attribute es obligatorio. Por favor, seleccione un curso.");
                }
            }],
            'instructor_id' => ['required', function ($attribute, $value, $fail) {
                if ($value == 'Seleccione un instructor') {
                    $fail("El campo $attribute es obligatorio. Por favor, seleccione un instructor.");
                }
            }],
        ]);
        $lista->update($listaValidado);
        return redirect()->route('listas.index')->with('success', 'Lista actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lista $lista)
    {
        $lista->delete();
        return redirect()->route('listas.index')->with('success', 'Lista eliminada exitosamente.');
    }
}
