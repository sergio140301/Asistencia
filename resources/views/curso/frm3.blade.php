@extends("plantillas.plantilla")

@section("contenido")
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<p></p>
<h1 class="display-5">Catalogo de Cursos</h1>
<hr>
<x-errores></x-errores>

<div class="container">
    @if(isset($cursos->id))
    <form action="{{ route('cursos.update', ['curso' => $cursos]) }}" method="post"> 
        @else
        <form action="{{ route('cursos.store') }}" method="post"> 
            @endif
        @csrf 

        <div class="row">
            <div class="col-10">
                <x-input1 campo="{{ $cursos->nombreCurso }}" texto="nombreCurso" label="Nombre del Curso: "></x-input1>
            </div>
        </div>

        <div class="row">
            <div class="col-10">
                <x-input1 campo="{{ $cursos->areaTematica }}" texto="areaTematica" label="Area Tematica: "></x-input1>
            </div>
        </div>
        
        <div class="row">
            <div class="col-10">
                <x-inputF campo="{{ $cursos->fechaInicio }}" texto="fechaInicio" label="Fecha de inicio: "></x-inputF>
            </div>
        </div>
        
        <div class="row">
            <div class="col-10">
            <x-inputF campo="{{ $cursos->fechaFinal }}" texto="fechaFinal" label="Fecha de terminacion: "></x-inputF>
            </div>
        </div>

        
        
        <x-submit1 leyenda=""></x-submit1>
       

    </form>
</div>
</body>
</html>

@endsection