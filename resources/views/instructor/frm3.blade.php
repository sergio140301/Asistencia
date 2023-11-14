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
<h1 class="display-5">Catalogo de Instructores</h1>
<hr>
<x-errores></x-errores>

<div class="container">
    @if(isset($instructor->id))
    <form action="{{ route('instructores.update', ['instructor' => $instructor]) }}" method="post"> 
        @else
        <form action="{{ route('instructores.store') }}" method="post"> 
            @endif
        @csrf 

        <div class="row">
            <div class="col-10">
                <x-input1 campo="{{ $instructor->nombre }}" texto="nombre" label="Nombre del Instructor: "></x-input1>
            </div>
        </div>

        <div class="row">
            <div class="col-10">
                <x-input1 campo="{{ $instructor->apellidoP }}" texto="apellidoP" label="Apellido Paterno: "></x-input1>
            </div>
        </div>

        <div class="row">
            <div class="col-10">
                <x-input1 campo="{{ $instructor->apellidoM }}" texto="apellidoM" label="Apellido Materno: "></x-input1>
            </div>
        </div>

        <div class="row">
            <div class="col-10">
                <x-inputRFC campo="{{ $instructor->rfc }}" texto="rfc" label="RFC: "></x-inputRFC>
            </div>
        </div>
        
        <x-inputRadio campo="{{ $instructor->tipoInstructor }}" texto="tipoInstructor" label="Tipo de instructor: "></x-inputRadio>

        <x-submit1 leyenda=""></x-submit1>
    </form>
</div>
</body>
</html>

@endsection