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
    <div class="container">
        <br>
        <h1 class="display-5">Catálogo de Listas Cursos</h1>
        <hr>
        <x-errores></x-errores>

        @if(isset($listas->id))
            <form action="{{ route('listas.update', ['lista' => $listas]) }}" method="post"> 
        @else
            <form action="{{ route('listas.store') }}" method="post"> 
        @endif
            @csrf 

            <div class="row">
                <div class="col-md-6">
                    <x-inputH campo="{{ $listas->horaInicio }}" texto="horaInicio" label="Fecha Inicial: "></x-inputH> <br>
                </div>
                <div class="col-md-6">
                    <x-inputH campo="{{ $listas->horaFinal }}" texto="horaFinal" label="Fecha Final: "></x-inputH>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <x-input1 campo="{{ $listas->lugar }}" texto="lugar" label="Lugar: "></x-input1> <br>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <x-select1 :arreglo="$cursos" valor="{{ $listas->curso_id }}" fk="curso_id" pk="id" display="nombreCurso" leyenda="Cursos: " leyenda2="Seleccione un curso"></x-select1>
                </div>
                <div class="col-md-6">
                    <x-select1 :arreglo="$instructores" valor="{{ $listas->instructor_id }}" fk="instructor_id" pk="id" display="nombre" leyenda="Instructores: " leyenda2="Seleccione un instructor"></x-select1>
                </div>
            </div>

            <x-submit1 leyenda=""></x-submit1>
        </form>
    </div>
</body>
</html>

@endsection
