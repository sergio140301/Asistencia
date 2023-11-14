@extends("plantillas.plantilla")

@section("contenido")
<br>
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title display-5">Datos del Puesto</h1>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item"><strong>ID:</strong> {{ $puesto->id }}</li>
                        <li class="list-group-item"><strong>Nombre del puesto:</strong> {{ $puesto->nombrePuesto }}</li>
                        <li class="list-group-item"><strong>Experiencia:</strong> {{ $puesto->experiencia }}</li>
                        <li class="list-group-item"><strong>Categoría:</strong> {{ $puesto->categoria }}</li>
                        <li class="list-group-item"><strong>Creado en:</strong> {{ $puesto->created_at }}</li>
                        <li class="list-group-item"><strong>Actualizado en:</strong> {{ $puesto->updated_at }}</li>
                    </ul>
                </div>
                <div class="card-footer text-center">
                    <a class="btn btn-danger" href="{{ route('puestos.destroy', ['puesto'=> $puesto->id]) }}" role="button">Eliminar Puesto</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

