@extends("plantillas.plantilla")

@section("contenido")
<p></p>
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

<div class="container mt-4">
    <hr>
    <h1 class="display-5">Catálogo de Listas Asistencias</h1>
    <hr>

    <div class="row mb-3">
        
        <div class="col-auto">
            <form action="{{ route('listas.index') }}" method="get" class="d-flex">
                <input type="text" name="txtnombre" class="form-control me-2" placeholder="Buscar por lugar">
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
                    <th>Nombre Curso</th>
                    <th>Nom. Trab.</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Lugar</th>
                    <th>Asistencia</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($asistencia as $asis)
                  
                <tr>
                    <td>{{ $asis->id }}</td>
                    <td>{{ $asis->lista->curso->nombreCurso }}</td>
                    <td>{{ $asis->trabajador->nombre }}</td>
                    <td>{{ $asis->lista->curso->fechaInicio }}</td>
                    <td>{{ $asis->lista->horaInicio }}</td>
                    <td>{{ $asis->lista->lugar }}</td>
                    <td>{{ $asis->asistencia }}</td>
                    
                    <td>
                        
                        <a href="{{ route('asistencias.edit', ['asistencia'=>$asis->id]) }}" class="btn btn-warning btn-sm">Editar</a>
                        
                    </td>
                </tr>
                
                @empty
                <tr>
                    <td colspan="5">No hay listas de cursos registrados</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="row justify-content-start">
        <div class="col-auto">
            {{ $asistencia->links() }}
        </div>
    </div>
</div>
@endsection