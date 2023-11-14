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
    <h1 class="display-5">Catálogo de Cursos</h1>
    <hr>
    <button class="continue-application">
        <div>
            <div class="pencil"></div>
            <div class="folder">
                <div class="top">
                    <svg viewBox="0 0 24 27">
                        <path
                            d="M1,0 L23,0 C23.5522847,-1.01453063e-16 24,0.44771525 24,1 L24,8.17157288 C24,8.70200585 23.7892863,9.21071368 23.4142136,9.58578644 L20.5857864,12.4142136 C20.2107137,12.7892863 20,13.2979941 20,13.8284271 L20,26 C20,26.5522847 19.5522847,27 19,27 L1,27 C0.44771525,27 6.76353751e-17,26.5522847 0,26 L0,1 C-6.76353751e-17,0.44771525 0.44771525,1.01453063e-16 1,0 Z">
                        </path>
                    </svg>
                </div>
                <div class="paper"></div>
            </div>
        </div>
        Nuevo Curso
    </button>
    <script>
        const continueButton = document.querySelector(".continue-application");

        continueButton.addEventListener("click", function() {
            // Agrega aquí la función JavaScript que desees ejecutar al hacer clic en el botón.
            // Por ejemplo, puedes redirigir a una nueva página utilizando JavaScript.
            window.location.href = "{{ route('cursos.create') }}";
        });
    </script>
    <div class="row mb-3">
        <div class="col">
         
        </div>
        <div class="col-auto">
            <form action="{{ route('cursos.index') }}" method="get" class="d-flex">
                <input type="text" name="txtnombre" class="form-control me-2" placeholder="Buscar por nombre curso">
                <button type="submit" class="btn btn-outline-secondary">Buscar</button>
            </form>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Nombre del curso: </th>
                    <th>Area Tematica: </th>
                    <th>Fecha de inicio: </th>
                    <th>Fecha de terminacion: </th>
                    <th>Ver Informacion</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($cursos as $curso)
                <tr>
                    <td>{{ $curso->id }}</td>
                    <td>{{ $curso->nombreCurso }}</td>
                    <td>{{ $curso->areaTematica }}</td>
                    <td>{{ $curso->fechaInicio }}</td>
                    <td>{{ $curso->fechaFinal }}</td>

                    <td><a id="verInformacion"
                        href="{{ route('cursos.show', ['curso' => $curso->id]) }}"><svg width="26"
                            height="26" fill="none" stroke="#0055ff" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                            <path d="M12 9a3 3 0 1 0 0 6 3 3 0 1 0 0-6z"></path>
                        </svg></a>
                </td>
                <td> <a id="pendiente" href="{{ route('cursos.edit', ['curso' => $curso->id]) }}"><svg
                            width="26" height="26" fill="none" stroke="#ffea00" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2a10 10 0 1 0 0 20 10 10 0 1 0 0-20z"></path>
                            <path d="M12 8v4"></path>
                            <path d="M12 16h.01"></path>
                        </svg>
                    </a>
                </td>
                <td> <a id="rechazar" href="{{ route('cursos.destroy', ['curso' => $curso->id]) }}"
                        class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro?')"><svg
                            width="26" height="26" fill="none" stroke="#e60505" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2a10 10 0 1 0 0 20 10 10 0 1 0 0-20z"></path>
                            <path d="m4.93 4.93 14.14 14.14"></path>
                        </svg></a>
                </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5">No hay ningun curso registrados</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="row justify-content-start">
        <div class="col-auto">
            {{ $cursos->links() }}
        </div>
    </div>
</div>
@endsection
<style>
    
    .botao {
        width: 125px;
        height: 45px;
        border-radius: 20px;
        border: none;
        box-shadow: 1px 1px rgba(107, 221, 215, 0.37);
        padding: 5px 10px;
        background: rgb(47, 93, 197);
        background: linear-gradient(160deg, rgba(47, 93, 197, 1) 0%, rgba(46, 86, 194, 1) 5%, rgba(47, 93, 197, 1) 11%, rgba(59, 190, 230, 1) 57%, rgba(0, 212, 255, 1) 71%);
        color: #fff;
        font-family: Roboto, sans-serif;
        font-weight: 505;
        font-size: 16px;
        line-height: 1;
        cursor: pointer;
        filter: drop-shadow(0 0 10px rgba(59, 190, 230, 0.568));
        transition: .5s linear;
    }

    .botao .mysvg {
        display: none;
    }

    .botao:hover {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        transition: .5s linear;
    }

    .botao:hover .texto {
        display: none;
    }

    .botao:hover .mysvg {
        display: inline;
    }

    .botao:hover::before {
        content: '';
        position: absolute;
        top: -3px;
        left: -3px;
        width: 100%;
        height: 100%;
        border: 3.5px solid transparent;
        border-top: 3.5px solid #fff;
        border-right: 3.5px solid #fff;
        border-radius: 50%;
        animation: animateC 2s linear infinite;
    }

    @keyframes animateC {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    #rechazar svg {
        position: relative;
        top: -5px;
    }

    /* Button */
    #rechazar {
        height: 46px;
        position: relative;
        top: -10px;
    }


    #Pendientes {
        background-color: #F1C40F;
        color: white;
    }

    #Rechazados {
        background-color: #F44336;
        color: white;
    }


    button {
        background-color: #007BFF;
        color: #fff;
        border: none;
        padding: 5px 10px;
        cursor: pointer;
    }

    .input {
        width: 100%;
        height: 40px;
        line-height: 28px;
        padding: 0 1rem;
        padding-left: 2.5rem;
        border: 2px solid transparent;
        border-radius: 8px;
        outline: none;
        background-color: #f3f3f4;
        color: #0d0c22;
        transition: .3s ease;
    }

    .input::placeholder {
        color: #9e9ea7;
    }

    .input:focus,
    input:hover {
        outline: none;
        border-color: rgba(234, 76, 137, 0.4);
        background-color: #fff;
        box-shadow: 0 0 0 4px rgb(234 76 137 / 10%);
    }

    .icon {
        position: absolute;
        left: 1rem;
        fill: #9e9ea7;
        width: 1rem;
        height: 1rem;
    }

    #pendiente {
        padding: 1.3em 3em;
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: 2.5px;
        font-weight: 500;
        color: #000;
        background-color: #fff;
        border: none;
        border-radius: 45px;
        box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease 0s;
        cursor: pointer;
        outline: none;
    }

    #pendiente:hover {
        background-color: #F1C40F;
        box-shadow: 0px 15px 20px rgba(241, 196, 15, 0.4);
        color: #fff;
        transform: translateY(-7px);
    }

    #pendiente:active {
        transform: translateY(-1px);
    }

    #rechazar {
        padding: 1.3em 3em;
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: 2.5px;
        font-weight: 500;
        color: #000;
        background-color: #fff;
        border: none;
        border-radius: 45px;
        box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease 0s;
        cursor: pointer;
        outline: none;
    }

    #rechazar:hover {
        background-color: #F44336;
        box-shadow: 0px 15px 20px rgba(244, 67, 54, 0.4);
        color: #fff;

    }



    #verInformacion {
        padding: 1.3em 3em;
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: 2.5px;
        font-weight: 500;
        color: #000;
        background-color: #fff;
        border: none;
        border-radius: 45px;
        box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease 0s;
        cursor: pointer;
        outline: none;
    }

    #verInformacion:hover {
        background-color: #4FC3F7;
        box-shadow: 0px 15px 20px rgba(79, 195, 247, 0.4);
        color: #fff;
        transform: translateY(-7px);
    }

    #verInformacion:active {
        transform: translateY(-1px);
    }



    button {
        padding: 1.3em 3em;
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: 2.5px;
        font-weight: 500;
        color: #000;
        background-color: #fff;
        border: none;
        border-radius: 45px;
        box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease 0s;
        cursor: pointer;
        outline: none;
    }

    button:hover {
        background-color: #007BFF;
        box-shadow: 0px 15px 20px #007BFF;
        color: #fff;
        transform: translateY(-7px);
    }

    button:active {
        transform: translateY(-1px);
    }
</style>
<style>
    .col-md-9 .continue-application {
        transform: translatex(0px) translatey(45px);
    }

    .continue-application {
        --color: #fff;
        --background: #404660;
        --background-hover: #3A4059;
        --background-left: #2B3044;
        --folder: #F3E9CB;
        --folder-inner: #BEB393;
        --paper: #FFFFFF;
        --paper-lines: #BBC1E1;
        --paper-behind: #E1E6F9;
        --pencil-cap: #fff;
        --pencil-top: #275EFE;
        --pencil-middle: #fff;
        --pencil-bottom: #5C86FF;
        --shadow: rgba(13, 15, 25, .2);
        border: none;
        outline: none;
        cursor: pointer;
        position: relative;
        border-radius: 5px;
        font-size: 14px;
        font-weight: 500;
        line-height: 19px;
        -webkit-appearance: none;
        -webkit-tap-highlight-color: transparent;
        padding: 17px 29px 17px 69px;
        transition: background 0.3s;
        color: var(--color);
        background: var(--bg, var(--background));
    }

    .continue-application>div {
        top: 0;
        left: 0;
        bottom: 0;
        width: 53px;
        position: absolute;
        overflow: hidden;
        border-radius: 5px 0 0 5px;
        background: var(--background-left);
    }

    .continue-application>div .folder {
        width: 23px;
        height: 27px;
        position: absolute;
        left: 15px;
        top: 13px;
    }

    .continue-application>div .folder .top {
        left: 0;
        top: 0;
        z-index: 2;
        position: absolute;
        transform: translateX(var(--fx, 0));
        transition: transform 0.4s ease var(--fd, 0.3s);
    }

    .continue-application>div .folder .top svg {
        width: 24px;
        height: 27px;
        display: block;
        fill: var(--folder);
        transform-origin: 0 50%;
        transition: transform 0.3s ease var(--fds, 0.45s);
        transform: perspective(120px) rotateY(var(--fr, 0deg));
    }

    .continue-application>div .folder:before,
    .continue-application>div .folder:after,
    .continue-application>div .folder .paper {
        content: "";
        position: absolute;
        left: var(--l, 0);
        top: var(--t, 0);
        width: var(--w, 100%);
        height: var(--h, 100%);
        border-radius: 1px;
        background: var(--b, var(--folder-inner));
    }

    .continue-application>div .folder:before {
        box-shadow: 0 1.5px 3px var(--shadow), 0 2.5px 5px var(--shadow), 0 3.5px 7px var(--shadow);
        transform: translateX(var(--fx, 0));
        transition: transform 0.4s ease var(--fd, 0.3s);
    }

    .continue-application>div .folder:after,
    .continue-application>div .folder .paper {
        --l: 1px;
        --t: 1px;
        --w: 21px;
        --h: 25px;
        --b: var(--paper-behind);
    }

    .continue-application>div .folder:after {
        transform: translate(var(--pbx, 0), var(--pby, 0));
        transition: transform 0.4s ease var(--pbd, 0s);
    }

    .continue-application>div .folder .paper {
        z-index: 1;
        --b: var(--paper);
    }

    .continue-application>div .folder .paper:before,
    .continue-application>div .folder .paper:after {
        content: "";
        width: var(--wp, 14px);
        height: 2px;
        border-radius: 1px;
        transform: scaleY(0.5);
        left: 3px;
        top: var(--tp, 3px);
        position: absolute;
        background: var(--paper-lines);
        box-shadow: 0 12px 0 0 var(--paper-lines), 0 24px 0 0 var(--paper-lines);
    }

    .continue-application>div .folder .paper:after {
        --tp: 6px;
        --wp: 10px;
    }

    .continue-application>div .pencil {
        height: 2px;
        width: 3px;
        border-radius: 1px 1px 0 0;
        top: 8px;
        left: 105%;
        position: absolute;
        z-index: 3;
        transform-origin: 50% 19px;
        background: var(--pencil-cap);
        transform: translateX(var(--pex, 0)) rotate(35deg);
        transition: transform 0.4s ease var(--pbd, 0s);
    }

    .continue-application>div .pencil:before,
    .continue-application>div .pencil:after {
        content: "";
        position: absolute;
        display: block;
        background: var(--b, linear-gradient(var(--pencil-top) 55%, var(--pencil-middle) 55.1%, var(--pencil-middle) 60%, var(--pencil-bottom) 60.1%));
        width: var(--w, 5px);
        height: var(--h, 20px);
        border-radius: var(--br, 2px 2px 0 0);
        top: var(--t, 2px);
        left: var(--l, -1px);
    }

    .continue-application>div .pencil:before {
        -webkit-clip-path: polygon(0 5%, 5px 5%, 5px 17px, 50% 20px, 0 17px);
        clip-path: polygon(0 5%, 5px 5%, 5px 17px, 50% 20px, 0 17px);
    }

    .continue-application>div .pencil:after {
        --b: none;
        --w: 3px;
        --h: 6px;
        --br: 0 2px 1px 0;
        --t: 3px;
        --l: 3px;
        border-top: 1px solid var(--pencil-top);
        border-right: 1px solid var(--pencil-top);
    }

    .continue-application:before,
    .continue-application:after {
        content: "";
        position: absolute;
        width: 10px;
        height: 2px;
        border-radius: 1px;
        background: var(--color);
        transform-origin: 9px 1px;
        transform: translateX(var(--cx, 0)) scale(0.5) rotate(var(--r, -45deg));
        top: 26px;
        right: 16px;
        transition: transform 0.3s;
    }

    .continue-application:after {
        --r: 45deg;
    }

    .continue-application:hover {
        --cx: 2px;
        --bg: var(--background-hover);
        --fx: -40px;
        --fr: -60deg;
        --fd: .15s;
        --fds: 0s;
        --pbx: 3px;
        --pby: -3px;
        --pbd: .15s;
        --pex: -24px;
    }
</style>