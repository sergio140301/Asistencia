<?php

namespace App\Http\Controllers;

use App\Models\Trabajador;
use App\Models\Departamento;
use App\Models\Puesto;
use Illuminate\Http\Request;
use Illuminate\Support\str;
use Illuminate\Support\Facades\Storage;

class TrabajadorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $p1='%'.request()->txtnombre.'%';
        $trab = Trabajador::where('nombre', 'like', $p1)->paginate(10);
        return view("trabajador.index", ['trabaja' => $trab]); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $trab = new Trabajador;
        $puesto = Puesto::get();
        $depto = Departamento::get();
        return view("trabajador.frm3", [ 'trabaja' => $trab,'deptos' => $depto, 'puesto' => $puesto]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $perValidado = request()->validate([
            'nombre' => 'required',
            'apellidoP' => 'required',
            'apellidoM' => 'required',
            'rfc' => 'required|between:12,13',
            'fechaIngreso' => 'required',
            'escolaridad' => 'required',
            'foto'=>'required|mimes:jpg,png,jpeg,gif',
            'departamento_id' => ['required', function ($attribute, $value, $fail) {
                if ($value == 'Seleccione un departamento') {
                    $fail("El campo $attribute es obligatorio. Por favor, seleccione un departamento.");
                }
            }],
            'puesto_id' => ['required', function ($attribute, $value, $fail) {
                if ($value == 'Seleccione un puesto') {
                    $fail("El campo $attribute es obligatorio. Por favor, seleccione un puesto.");
                }
            }],
        ]);
        $trabajador= Trabajador::create($perValidado);
        $nomFoto= $request->file('foto')->store('public');
        $trabajador->foto=Storage::Url($nomFoto);
        $trabajador->save();
        return redirect()->route('trabajadores.index')->with('success', 'Trabajador agregado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Trabajador $trabajador)
    {
        return view('trabajador.show', ['trabaja'=>$trabajador]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Trabajador $trabajador)
    {
        $puesto = Puesto::get();
        $depto = Departamento::get();
        return view('trabajador.frm3', ['trabaja'=>$trabajador, 'deptos'=>$depto, 'puesto' => $puesto]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Trabajador $trabajador)
    {
        $perValidado = request()->validate([
            'nombre' => 'required',
            'apellidoP' => 'required',
            'apellidoM' => 'required',
            'rfc' => 'required|between:12,13',
            'fechaIngreso' => 'required',
            'escolaridad' => 'required',
            
            'departamento_id' => ['required', function ($attribute, $value, $fail) {
                if ($value == 'Seleccione un departamento') {
                    $fail("El campo $attribute es obligatorio. Por favor, seleccione un departamento.");
                }
            }],
            'puesto_id' => ['required', function ($attribute, $value, $fail) {
                if ($value == 'Seleccione un puesto') {
                    $fail("El campo $attribute es obligatorio. Por favor, seleccione un puesto.");
                }
            }],
        ]);

        if($request->hasFile('foto')){
            if($trabajador){
                Storage::delete($trabajador->foto);
            }
            $nomFoto=$request->file('foto')->store('public');
            $trabajador->fill($perValidado);
            $trabajador->foto=Storage::Url($nomFoto);
            $trabajador->save();
        }else{
            $trabajador->update($perValidado);
        }
        return redirect()->route('trabajadores.index')->with('success', 'Trabajador actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Trabajador $trabajador)
    {
        $trabajador->delete();
        return redirect()->route('trabajadores.index')->with('success', 'Trabajador eliminado exitosamente.');
    }
}
