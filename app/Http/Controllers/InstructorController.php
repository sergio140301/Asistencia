<?php

namespace App\Http\Controllers;

use App\Models\Instructor;
use Illuminate\Http\Request;

class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $p1='%'.request()->txtnombre.'%';
        $ins = Instructor::where('nombre', 'like',$p1)->paginate(10);
        return view("instructor.index", ['inst' => $ins]); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ins = new Instructor;
        
        return view("instructor.frm3", ['instructor' => $ins]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $insValidado = request()->validate([
            'nombre'=>'required',
            'apellidoP'=>'required',
            'apellidoM'=>'required',
            'rfc'=>'required|string|max:13|min:10|regex:/^[A-Za-z0-9]+$/',
            'tipoInstructor'=>'required'
        ],[
            'rfc.regex' => 'El RFC debe contener solo letras y números.',
        ]);
        Instructor::create($insValidado);
        return redirect()->route('instructores.index')->with('success', 'Instructor agregado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Instructor $instructor)
    {
        return view('instructor.show', ['ins'=>$instructor]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Instructor $instructor)
    {
        return view('instructor.frm3', ['instructor'=>$instructor]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Instructor $instructor)
    {
        $insValidado = request()->validate([
            'nombre'=>'required',
            'apellidoP'=>'required',
            'apellidoM'=>'required',
            'rfc'=>'required|string|max:13|min:10|regex:/^[A-Za-z0-9]+$/',
            'tipoInstructor'=>'required'
        ],[
            'rfc.regex' => 'El RFC debe contener solo letras y números.',
        ]);

        $instructor->update($insValidado);
        return redirect()->route('instructores.index')->with('success', 'Instructor actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Instructor $instructor)
    {
        $instructor->delete();
        return redirect()->route('instructores.index')->with('success', 'Instructor eliminado exitosamente.');
    }
}
