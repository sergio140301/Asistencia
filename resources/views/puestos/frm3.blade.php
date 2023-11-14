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
<br> 
<h1 class="display-5">Catalogo de Puestos</h1>
<hr>
<x-errores></x-errores>

<div class="container">
    @if(isset($puesto->id))
    <form action="{{ route('puestos.update', ['puesto' => $puesto]) }}" method="post"> 
        @else
        <form action="{{ route('puestos.store') }}" method="post"> 
            @endif
        @csrf 

        <div class="row">
            <div class="col-10">
                <x-input1 campo="{{ $puesto->nombrePuesto }}" texto="nombrePuesto" label="Nombre del Puesto: "></x-input1>
            </div>
        </div>
        <div class="row">
            <div class="col-10">
                <x-selectE campo="{{ $puesto->experiencia }}" texto="experiencia" label="Experiencia: " select="true"></x-selectE>
            </div>
        </div> <br>
        <div class="row">
            <div class="col-10">
                <x-selectC campo="{{ $puesto->categoria }}" texto="categoria" label="Categoria: " select="true"></x-selectC>
            </div>
        </div> <br>

        <x-submit1 leyenda=""></x-submit1>

    </form>
</div>
</body>
</html>

@endsection