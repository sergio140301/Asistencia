@extends("plantillas.plantilla")

@section("contenido")
<br>
@if(Session::has('success'))
    <div id="success-message" class="alert alert-success">
        {{ Session::get('success') }}
    </div>
@endif

<script>
    document.addEventListener('DOMContentLoaded', function () {
        setTimeout(function () {
            var successMessage = document.getElementById('success-message');
            if (successMessage) {
                successMessage.style.display = 'none';
            }
        }, 3000); // Oculta el mensaje después de 3000 milisegundos (3 segundos)
    });
</script>
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
                        <li class="list-group-item"><strong>ID:</strong> {{ $lista->id }}</li>
                        <li class="list-group-item"><strong>Nombre Curso:</strong> {{$lista->curso->nombreCurso }}</li>
                        <li class="list-group-item"><strong>Hora Inicio:</strong> {{ $lista->horaInicio }}</li>
                        <li class="list-group-item"><strong>Hora Final:</strong> {{ $lista->horaFinal }}</li>
                        <li class="list-group-item"><strong>Lugar:</strong> {{ $lista->lugar }}</li>
                        <li class="list-group-item"><strong>Duracion en dias:</strong>{{ $lista->curso->duracion }}</li> 
                        <li class="list-group-item"><strong>Instructor:</strong> {{ $lista->instructor->nombre }}</li>
                        <li class="list-group-item"><strong>Creado en:</strong> {{ $lista->created_at }}</li>
                        <li class="list-group-item"><strong>Actualizado en:</strong> {{ $lista->updated_at }}</li>
                    </ul> 
                </div>
                <div class="card-footer">
        
                    <a class="btn btn-danger" style="margin-left:20px; margin-right:20px" href="{{ route('asistencias.create', [ 'lista'=>$lista->id]) }}" role="button">Ver Asistencias</a>
                    <a id="btnVerParticipantes" class="btn btn-primary" href="javascript:void(0);" onclick="mostrarVistaParticipantes()">Ver Participantes</a>
                </div>

            </div>
        </div>
    </div>
</div>

<script>
    function mostrarVistaParticipantes() {
        var vistaParticipantes = document.getElementById('vistaParticipantes');
        var btnVerParticipantes = document.getElementById('btnVerParticipantes');
        
        // Mostrar la vista de participantes
        vistaParticipantes.style.display = 'block';

        // Deshabilitar el botón después de hacer clic
        btnVerParticipantes.disabled = true;
    }
</script>

<br>

@endsection

@section("vista_participantes")

<div id="vistaParticipantes" style="display: none;">

<div class="container mt-4">
    
    <h1 class="display-5">PARTICIPANTES</h1>
    <hr>
    <div class="row">
        <div class="col">
            <a class="btn btn-primary" href="{{ route('participantes.create', ['lista_id'=>$lista->id]) }}" role="button">Agregar participante</a>
        </div>

        <div class="col-auto">
            <form action="{{ route('listas.show', ['lista'=>$lista->id]) }}" method="get" class="d-flex">
                <input type="text" name="txtnombre" class="form-control me-2" placeholder="Buscar por nombre">
                <button type="submit" class="btn btn-outline-secondary">Buscar</button>
            </form>
        </div>
    </div>
    
    <hr>
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Nombre </th>
                    <th>RFC</th>
                    <th>Departamento</th>
                    <th>Puesto</th>
                    <th>Asistencia</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($participante as $participa)
                <tr>
                    <td>{{ $participa->id }}</td>
                    <td>{{ $participa->trabajador->nombre. ' '.$participa->trabajador->apellidoP.' '.$participa->trabajador->apellidoM }}</td>
                    <td>{{ $participa->trabajador->rfc }}</td>
                    <td>{{ $participa->trabajador->departamento->nombreDepto }}</td>
                    <td>{{ $participa->trabajador->puesto->nombrePuesto }}</td>
                    <td>
                        <a href="{{ route('asistencias.create', [ 'participante'=>$participa->id, 'duracion'=>$lista->curso->duracion, 'lista_id'=>$lista->id]) }}" class="btn btn-secondary btn-sm ">Agregar</a>
                    </td>
                    
                    <td>
                        <a href="{{route('participantes.destroy',['participante'=>$participa->id, 'lista_id'=>$lista->id])}}" class="btn btn-danger btn-sm">Eliminar</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6">No hay trabajadores registrados en este curso</td>
                </tr>
                @endforelse
                
            </tbody>
        </table>

    </div>
</div>

<div class="row justify-content-start">
    <div class="col-auto">
        {{ $participante->links() }}
    </div>
</div>

</div>

<br>

@endsection