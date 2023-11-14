@extends("plantillas.plantilla")

@section("contenido")
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Participantes</title>
    <!-- Agrega enlaces a tus estilos CSS si es necesario -->
    <style>
        .container {
            max-width: 600px;
            margin: auto;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        select, input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }

        fieldset {
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 20px;
        }

        legend {
            font-size: 1.2em;
            font-weight: bold;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <h1 class="display-5">Catálogo de Participantes</h1>
        <hr>

        <x-errores></x-errores>

        @if(isset($participante->id))
            <form action="{{ route('participantes.update', ['participante' => $participantes]) }}" method="post"> 
        @else
            <form action="{{ route('participantes.store') }}" method="post"> 
        @endif
            @csrf 

            <fieldset>
                <legend>Detalles del Participante</legend>

                <div class="form-group">
                    <label for="departamento">Departamento:</label>
                    <select class="form-control" name="departamento" id="departamento">
                        <option value="">Selecciona un departamento</option>
                        @foreach($departamentos as $departamento)
                            <option value="{{ $departamento->id }}">{{ $departamento->nombreDepto }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="trabajador_id">Trabajador:</label>
                    <select class="form-control" name="trabajador_id" id="trabajador_id">
                        <option value="">Selecciona un trabajador</option>
                        <!-- Los trabajadores se cargarán dinámicamente con JavaScript -->
                    </select>
                </div>

                <div style="display: none;">
                    <input type="text" class="form-control" name="lista_id" id="lista_id" value="{{ $lista_id }}" readonly>
                </div>

                <x-submit1 leyenda="Insertar"></x-submit1>
            </fieldset>
        </form>
    </div>
</body>
</html>

<script>
    // Agrega este script para manejar el filtrado de trabajadores
    document.getElementById('departamento').addEventListener('change', function() {
        var departamentoId = this.value;
        var trabajadores = @json($trabaja); // Convierte la variable de PHP a JavaScript

        // Filtrar trabajadores por departamento
        var trabajadoresFiltrados = trabajadores.filter(function(trabajador) {
            return trabajador.departamento_id == departamentoId;
        });

        // Actualizar el dropdown de trabajadores
        var trabajadoresDropdown = document.getElementById('trabajador_id');
        trabajadoresDropdown.innerHTML = '<option value="">Selecciona un trabajador</option>';
        trabajadoresFiltrados.forEach(function(trabajador) {
            var option = document.createElement('option');
            option.value = trabajador.id;
            option.text = trabajador.nombre+' '+trabajador.apellidoP+' '+trabajador.apellidoM;
            trabajadoresDropdown.appendChild(option);
        });
    });
</script>

@endsection
