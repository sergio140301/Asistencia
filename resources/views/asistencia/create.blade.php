<!-- resources/views/asistencia/create.blade.php -->

@extends("plantillas.plantilla")

@section("contenido")
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title display-5">Asignar Trabajador a Lista de Curso</h1>
                </div>
                <div class="card-body">
                    <form action="{{ route('asistencias.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="trabajador_id" class="form-label">Trabajador:</label>
                            <select name="trabajador_id" class="form-select">
                                @foreach($trabajadores as $trabajador)
                                    <option value="{{ $trabajador->id }}">{{ $trabajador->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="lista_id" class="form-label">Lista de Curso:</label>
                            <select name="lista_id" class="form-select">
                                @foreach($listas as $lista)
                                    <option value="{{ $lista->id }}">{{ $lista->curso->nombreCurso }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="asistencia" class="form-label">Asistencia:</label>
                            <input type="text" name="asistencia" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Asignar Asistencia</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
