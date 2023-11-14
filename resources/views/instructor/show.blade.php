@extends("plantillas.plantilla")

@section("contenido")
<br>
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title display-5">Datos del Instructor</h1>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item"><strong>ID:</strong> {{ $ins->id }}</li>
                        <li class="list-group-item"><strong>Nombre:</strong> {{ $ins->nombre }}</li>
                        <li class="list-group-item"><strong>Apellido Paterno:</strong> {{ $ins->apellidoP }}</li>
                        <li class="list-group-item"><strong>Apellido Materno:</strong> {{ $ins->apellidoM }}</li>
                        <li class="list-group-item"><strong>RFC:</strong> {{ $ins->rfc }}</li>
                        <li class="list-group-item"><strong>Tipo Instructor:</strong> {{ $ins->tipoInstructor }}</li>
                        <li class="list-group-item"><strong>Creado en:</strong> {{ $ins->created_at }}</li>
                        <li class="list-group-item"><strong>Actualizado en:</strong> {{ $ins->updated_at }}</li>
                    </ul>
                </div>
                <div class="card-footer text-center">
                    <a class="btn btn-danger" href="{{ route('instructores.destroy', ['instructor'=> $ins->id]) }}" role="button">Eliminar Instructor</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

