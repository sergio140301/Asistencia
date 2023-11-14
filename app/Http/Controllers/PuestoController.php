<?php

namespace App\Http\Controllers;

use App\Models\Puesto;
use Illuminate\Http\Request;

class PuestoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $p1='%'.request()->txtnombre.'%';
        $puestos = Puesto::where('nombrePuesto', 'like',$p1)->paginate(10);
        return view("puestos.index", ['puestos' => $puestos]); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $puestos = new Puesto;
        
        return view("puestos.frm3", ['puesto' => $puestos]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $puesValidado = request()->validate([
            'nombrePuesto'=>'required',
            'experiencia'=>'required',
            'categoria'=>'required'
        ]);
        Puesto::create($puesValidado);
        return redirect()->route('puestos.index')->with('success', 'Puesto agregado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Puesto $puesto)
    {
        return view('puestos.show', ['puesto'=>$puesto]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Puesto $puesto)
    {
        return view('puestos.frm3', ['puesto'=>$puesto]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Puesto $puesto)
    {
        $puesValidado = request()->validate([
            'nombrePuesto'=>'required',
            'experiencia'=>'required',
            'categoria'=>'required'
        ]);
        $puesto->update($puesValidado);
        return redirect()->route('puestos.index')->with('success', 'Puesto actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Puesto $puesto)
    {
        $puesto->delete();
        return redirect()->route('puestos.index')->with('success', 'Puesto eliminado exitosamente.');
    }
}
