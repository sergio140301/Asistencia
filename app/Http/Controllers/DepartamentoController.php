<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use App\Models\Puesto;
use Illuminate\Http\Request;

class DepartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $p1='%'.request()->txtnombre.'%';
        $deptos = Departamento::where('nombreDepto', 'like',$p1)->paginate(10);
        return view("depto.index", ['deptos' => $deptos]); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $depto = new Departamento;
        $puesto = Puesto::get();
        return view("depto.frm3", ['deptos' => $depto, 'puesto' => $puesto]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $deptoValidado = request()->validate([
            'nombreDepto' => 'required',
            'nombreCorto' => 'required',
            
        ]);
        Departamento::create($deptoValidado);
        return redirect()->route('departamentos.index')->with('success', 'Departamento agregado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Departamento $departamento)
    {
        return view('depto.show', ['depto'=>$departamento]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Departamento $departamento)
    {
        $puesto = Puesto::get();
        return view('depto.frm3', ['deptos'=>$departamento, 'puesto' => $puesto]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Departamento $departamento)
    {
        $deptoValidado = request()->validate([
            'nombreDepto' => 'required',
            'nombreCorto' => 'required',
            
        ]);
        $departamento->update($deptoValidado);
        return redirect()->route('departamentos.index')->with('success', 'Departamento actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Departamento $departamento)
    {
        $departamento->delete();
        return redirect()->route('departamentos.index')->with('success', 'Departamento eliminado exitosamente.');
    }
}
