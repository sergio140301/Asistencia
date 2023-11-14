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
                    <th>Asistencias</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($participante as $participa)
                  @if($participa->trabajador_id == $trabajadorId)
                <tr>
                    
                    <td>{{ $participa->id }}</td>
                    <td>{{ $participa->lista->curso->nombreCurso }}</td>
                    <td>{{ $participa->trabajador->nombre }}</td>
                    <td>{{ $participa->lista->curso->fechaInicio }}</td>
                    <td>{{ $participa->lista->horaInicio }}</td>
                    <td>{{ $participa->lista->lugar }}</td>
                    
                    <td>
                        
                        <a href="{{ route('asistencias.show', ['participante'=>$participa->id, 'trabajadorId'=>$trabajadorId, 'listaId'=>$listaId]) }}" class="btn btn-primary btn-sm">Ver</a>
                        
                    </td>
                </tr>
                @endif
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
            {{ $participante->links() }}
        </div>
    </div>
</div>
@endsection