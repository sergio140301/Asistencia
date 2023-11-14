@extends("plantillas.plantilla")

@section("contenido")
<br>
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title display-5">Datos del Departamento</h1>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item"><strong>ID:</strong> {{ $depto->id }}</li>
                        <li class="list-group-item"><strong>Nombre del Departamento:</strong> {{ $depto->nombreDepto }}</li>
                        <li class="list-group-item"><strong>Nombre Corto:</strong> {{ $depto->nombreCorto }}</li>
                        <li class="list-group-item"><strong>Creado en:</strong> {{ $depto->created_at }}</li>
                        <li class="list-group-item"><strong>Actualizado en:</strong> {{ $depto->updated_at }}</li>
                    </ul>
                </div> <p></p>
                <div class="card-footer text-center">
                    <a class="btn btn-danger" href="{{ route('departamentos.destroy', ['departamento'=> $depto->id]) }}" role="button">Eliminar Departamento</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection