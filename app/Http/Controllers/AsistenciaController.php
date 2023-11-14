<?php

namespace App\Http\Controllers;

use App\Models\asistencia;
use App\Models\Lista;
use App\Models\Curso;
use App\Models\Trabajador;
use App\Models\Participante;
use Illuminate\Http\Request;

class AsistenciaController extends Controller
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
        ->paginate(10);
        
        return view("asistencia.index", ['participante' => $participante, 'trabajadorId'=> $trabajadorId, 'listaId' => $listaId ]);  
    }
    public function index2()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $asistencia = new asistencia;
        $lista = Lista::get();
        $participante = Participante::get();
        $parti_id = request()->participante;
        $duracion = request()->duracion;
        $listaId=request()->lista_id;

        return view("asistencia.frm3", ['asistencias'=>$asistencia, 'lista_id'=>$listaId, 'listas' => $lista, 'participante_id'=>$parti_id, 'duracion'=>$duracion]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $asisValidado = request()->validate([
            
            'participante_id' => 'required'
        ]);

        // dd($asisValidado); 
        $idk = request()->duracion;
        $participante = $asisValidado['participante_id'];
        //dd($idk);
        $asistenciasData = [];
        for ($i = 1; $i <= $request->input('duracion'); $i++) {
            $asistenciasData[] = [
            'asistencia' => $request->input("asistencia.$i"),
            'participante_id' => $participante,
            ];
        }  
        //dd($asistenciasData);  
        asistencia::insert($asistenciasData);    

        $listaId=request()->lista_id;        
        return redirect()->route('listas.show', ['lista'=>$listaId])->with('success', 'Asistencias agregadas exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(asistencia $asistencia)
    {
        $trabajadorId=request()->trabajador_id;
        $listaId = request()->lista_id;
        $participante = request()->participante;
        $duracion = Curso::value('duracion');
        // $p1='%'.request()->txtnombre.'%';
        $asistencia = asistencia::where('participante_id', $participante)
                                ->paginate(10);
        $numRegistros = $asistencia->count();
        //dd($numRegistros);
        return view("asistencia.show", ['asistencia' => $asistencia, 'trabajadorId'=> $trabajadorId, 'listaId' => $listaId, 'numRegistros'=>$numRegistros, 'duracion'=>$duracion ]); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(asistencia $asistencia)
    {
        $listaId = request()->lista_id;
        return view('asistencia.frm3', ['asistencia'=>$asistencia, 'lista_id'=>$listaId]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, asistencia $asistencia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(asistencia $asistencia)
    {
        //
    }
}
