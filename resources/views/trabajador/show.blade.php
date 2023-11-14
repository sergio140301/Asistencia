@extends("plantillas.plantilla")

@section("contenido")
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title display-5">Datos del Trabajador</h1>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item"><strong>ID:</strong> {{ $trabaja->id }}</li>
                        <li class="list-group-item"><img src="{{ asset($trabaja->foto) }}" alt="Foto del Trabajador" style="height:300px; widht:400px; margin-left:130px  "></li>
                        <li class="list-group-item"><strong>Nombre del puesto:</strong> {{ $trabaja->nombre }}</li>
                        <li class="list-group-item"><strong>Apellido Paterno:</strong> {{ $trabaja->apellidoP }}</li>
                        <li class="list-group-item"><strong>Apellido Materno:</strong> {{ $trabaja->apellidoM }}</li>
                        <li class="list-group-item"><strong>RFC:</strong> {{ $trabaja->rfc }}</li>
                        <li class="list-group-item"><strong>Fecha de Ingreso:</strong> {{ $trabaja->fechaIngreso }}</li>
                        <li class="list-group-item"><strong>Escolaridad:</strong> {{ $trabaja->escolaridad }}</li>
                        <li class="list-group-item"><strong>Departamento:</strong> {{ $trabaja->departamento->nombreDepto }}</li>
                        <li class="list-group-item"><strong>Puesto:</strong> {{ $trabaja->puesto->nombrePuesto }}</li>
                        <li class="list-group-item"><strong>Creado en:</strong> {{ $trabaja->created_at }}</li>
                        <li class="list-group-item"><strong>Actualizado en:</strong> {{ $trabaja->updated_at }}</li>
                    </ul>
                </div>
                <div class="card-footer d-flex justify-content-center gap-4">
                    <a class="btn btn-danger" href="{{ route('trabajadores.destroy', ['trabajador'=> $trabaja->id]) }}" role="button">Eliminar Trabajador</a>
                    <a class="btn btn-danger" href="{{ route('asistencias.index', ['trabajador_id'=> $trabaja->id]) }}" role="button">Cursos</a>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
