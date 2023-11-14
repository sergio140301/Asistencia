@extends("plantillas.plantilla")

@section("contenido")
<br>
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title display-5">Datos del Curso</h1>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item"><strong>ID:</strong> {{ $cursos->id }}</li>
                        <li class="list-group-item"><strong>Nombre del curso:</strong> {{ $cursos->nombreCurso }}</li>
                        <li class="list-group-item"><strong>Area Tematica:</strong> {{ $cursos->areaTematica }}</li>
                        <li class="list-group-item"><strong>Fecha de inicio:</strong> {{ $cursos->fechaInicio }}</li>
                        <li class="list-group-item"><strong>Fecha de terminación:</strong> {{ $cursos->fechaFinal }}</li>
                        <li class="list-group-item"><strong>Creado en:</strong> {{ $cursos->created_at }}</li>
                        <li class="list-group-item"><strong>Actualizado en:</strong> {{ $cursos->updated_at }}</li>
                    </ul>
                </div>
                <div class="card-footer">
                    <a class="btn btn-danger" href="{{ route('cursos.destroy', ['curso'=> $cursos->id]) }}" role="button">Eliminar Curso</a>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

