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
        <h1 class="display-5">Catálogo de Asistencias</h1>
        <hr>
        <x-errores></x-errores>

        @if(isset($asistencias->id))
            <form action="{{ route('asistencias.update', ['asistencia' => $asistencia]) }}" method="post"> 
        @else
            <form action="{{ route('asistencias.store', ['lista_id'=>$lista_id, 'duracion'=>$duracion]) }}" method="post"> 
        @endif
            @csrf 

            <h5 class="display-8">Asistencias del curso: </h5>

            
            <div class="row">
                <div style="">
                    <label for="">Numero de asistencias: {{ $duracion }}</label>
                </div>
                

                <div class="col-md-6">
                @for ($i = 1; $i <= $duracion; $i++)
                    <div class="row">
                        <div class="col-md-10">       
                            <x-checkbox texto="asistencia[{{ $i }}]" texto2="asistencia" i="$i" label="Asistencia dia: {{$i}}"></x-checkbox>
                        </div>
                    </div>
                @endfor
                </div>
            </div>

            <div class="row">
                <div style="display: none;">
                    <input type="text" class="form-control" name="participante_id" id="participante_id" value="{{ $participante_id }}" readonly>
                </div>
            </div>

            <x-submit1 leyenda="Insertar"></x-submit1>
        </form>
    </div>
</body>
</html>

@endsection
