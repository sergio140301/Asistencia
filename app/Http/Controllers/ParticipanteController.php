<?php

namespace App\Http\Controllers;

use App\Models\Participante;
use App\Models\Trabajador;
use App\Models\Lista;
use App\Models\Departamento;
use Illuminate\Http\Request;


class ParticipanteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trabajadorId=request()->trabajador_id;
        $listaId = request()->lista_id;
        $p1='%'.request()->txtnombre.'%';
        $participante = Participante::where('trabajador_id', $trabajadorId)
                            ->where('id', 'like',$p1)->paginate(10);
        return view("participantes.index", ['participante' => $participante, 'trabajadorId'=> $trabajadorId, 'listaId' => $listaId ]); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $participante = new Participante;
        $trabajador = Trabajador::get();
        $lista = Lista::get();
        $departamentos = Departamento::get();
        $lista_id = request()->lista_id;

        return view("participantes.frm3", [ 'listas' => $lista, 'trabaja' => $trabajador, 'departamentos' => $departamentos, 'participante' => $participante, 'lista_id' => $lista_id]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $partValidado = request()->validate([
            'trabajador_id' => 'required',
            'lista_id' => 'required'
        ]);
        $listaId=request()->lista_id;
        $trabajadorId = $partValidado['trabajador_id'];
        Participante::create(['trabajador_id'=>$trabajadorId, 'lista_id'=>$listaId]);
        return redirect()->route('listas.show', ['lista'=>$listaId])->with('success', 'Participante agregado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Participante $participante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Participante $participante)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Participante $participante)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Participante $participante, Request $request)
    {
        $participante->delete();
        $listaId=request()->lista_id;
        return redirect()->route('listas.show', ['lista'=>$listaId])->with('success', 'Participante eliminado exitosamente.');
    }
}
