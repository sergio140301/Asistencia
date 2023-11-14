@extends("plantillas.plantilla")

@section("contenido")
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        #contenedor-imagen {
            width: 200px;
            height: 200px;
            border: 1px solid #ddd; /* Añade un borde al contenedor */
            overflow: hidden; /* Evita que la imagen sobresalga del contenedor */
            margin-bottom: 20px; /* Espaciado inferior para separar de otros elementos */
            margin-right: 30px;
        }

        #vista-previa {
            width: 100%;
            height: 100%;
            object-fit: cover; /* Ajusta la imagen para cubrir completamente el contenedor */
        }
    </style>

</head>
<body>
    <div class="container">
        <br>
        <h1 class="display-5">Catálogo de Trabajadores</h1>
        <hr>
        <x-errores></x-errores>

        @if(isset($trabaja->id))
            <form action="{{ route('trabajadores.update', ['trabajador' => $trabaja]) }}" method="post" enctype="multipart/form-data"> 
        @else
            <form action="{{ route('trabajadores.store') }}" method="post" enctype="multipart/form-data"> 
        @endif
            @csrf 

            <div class="row">
                <div id="contenedor-imagen" class="col-md-4">
                    <img id="vista-previa" src="{{ $trabaja->foto }}" alt="Selecciona una imagen" >
                </div> 
                
                <div class="col-md-7">
                    <div class="row">
                        <x-input1 campo="{{ $trabaja->nombre }}" texto="nombre" label="Nombre: "></x-input1> <br>
                    </div> <br>
                    <div class="row">
                    <x-input1 campo="{{ $trabaja->apellidoP }}" texto="apellidoP" label="Apellido Paterno: "></x-input1>
                    </div>
                </div>       
            </div>

            <div class="row">
                <input type="file" name="foto" id="foto" class="input-foto" onchange="mostrarVistaPrevia(this)">
            </div> <br><br>

            <div class="row">
                <div class="col-md-6">
                    <x-input1 campo="{{ $trabaja->apellidoM }}" texto="apellidoM" label="Apellido Materno: "></x-input1> <br>
                </div>
                <div class="col-md-6">
                    <x-inputRFC campo="{{ $trabaja->rfc }}" texto="rfc" label="RFC: "></x-inputRFC>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <x-inputF campo="{{ $trabaja->fechaIngreso }}" texto="fechaIngreso" label="Fecha de ingreso: "></x-inputF> <br>
                </div>
                <div class="col-md-6">
                    <x-input1 campo="{{ $trabaja->escolaridad }}" texto="escolaridad" label="Escolaridad: "></x-input1>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <x-select1 :arreglo="$deptos" valor="{{ $trabaja->departamento_id }}" fk="departamento_id" pk="id" display="nombreDepto" leyenda="Departamentos: " leyenda2="Seleccione un departamento"></x-select1>
                </div>
                <div class="col-md-6">
                    <x-select1 :arreglo="$puesto" valor="{{ $trabaja->puesto_id }}" fk="puesto_id" pk="id" display="nombrePuesto" leyenda="Puestos: " leyenda2="Seleccione un puesto"></x-select1>
                </div>
            </div>
            <br>

            <x-submit1 leyenda=""></x-submit1>
        </form>
    </div>

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        // Llama a la función al cargar la página para mostrar la vista previa si hay una imagen existente
        mostrarVistaPrevia(document.getElementById('foto'), '{{ $trabaja->foto }}');

        // Agrega un event listener para detectar cambios en el campo de archivo
        document.getElementById('foto').addEventListener('change', function() {
            mostrarVistaPrevia(this);
        });
    });

    function mostrarVistaPrevia(input, url = null) {
        var reader = new FileReader();

        // Si se proporciona una URL, establece la vista previa con esa URL
        if (url) {
            document.getElementById('vista-previa').src = url;
        } else {
            reader.onload = function (e) {
                document.getElementById('vista-previa').src = e.target.result;
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>


</body>
</html>

@endsection
