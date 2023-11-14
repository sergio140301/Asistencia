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
<h1 class="display-5">Catalogo de Departamentos</h1>
<hr>
<x-errores></x-errores>

<div class="container">
    @if(isset($deptos->id))
    <form action="{{ route('departamentos.update', ['departamento' => $deptos]) }}" method="post"> 
        
        @else
        <form action="{{ route('departamentos.store') }}" method="post"> 
            @endif
        @csrf 

        <div class="row">
            <div class="col-10">
            <x-input1 campo="{{ $deptos->nombreDepto }}" texto="nombreDepto" label="Nombre del Departamento: "></x-input1>
            </div>
        </div>

        <div class="row">
            <div class="col-10">
            <x-input1 campo="{{ $deptos->nombreCorto }}" texto="nombreCorto" label="Nombre Corto: "></x-input1>
            </div>
        </div>
        
        <x-submit1 leyenda=""></x-submit1>

    </form>
</div>
</body>
</html>

@endsection