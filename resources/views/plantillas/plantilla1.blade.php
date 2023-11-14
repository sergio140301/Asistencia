<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <title>Monitoreo de aistencias a cursos</title>
    
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        html,
        body,
        h1,
        h2,
        h3,
        h4,
        h5 {
            font-family: "Raleway", sans-serif
        }
    </style>
    <style>
    .w3-bar-item.w3-button.w3-padding.active {
        background-color: #828282; /* Color de fondo cuando está activo */
        color: white; /* Color del texto cuando está activo */
    }
</style>
    <style>
      .nav-link:hover {
    background-color: #3355FF; /* Puedes cambiar el color según tus preferencias */
    color: #FFFFFF; /* Puedes cambiar el color del texto según tus preferencias */
}
.nav-bar{
  /* position:fixed; */
  top:0;
  left:0;
  width:100%;
  z-index:1000;
}

    </style>

</head>

<body class="w3-light-grey">

<nav class="navbar nav-bar navbar-expand-lg bg-dark rounded-1 border-light" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Monitoreo Asistencia</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Horarios</a>
        </li>

        
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Catalogos
          </a>
          
        </li>
        <li class="nav-item ">
          <a class="nav-link active" href="#">Ayuda</a>
        </li>
      </ul>
      <!-- <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form> -->
      
    </div>

  </div>
</nav>


<div class="row"> 
  <div class="col-sm-3 ">
    <!-- este es el navbar -->
  <div id="submenu" class=" w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
        <div class="w3-container w3-row">
            <div class="w3-col s4">
                <img src="..\public\img\empresax.png" class="w3-circle w3-margin-right" style="width:46px">
            </div>
            <div class="w3-col s8 w3-bar">
  @auth
    <span>Bienvenido, <strong>{{ Auth::user()->name }}</strong></span><br>
    <div class="row">
      <div class="col">
        <div class="dropdown">
          <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa fa-user"></i>
          </button>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Perfil</a></li>
            <li>
              <form action="{{ route('logout') }}" method="post">
                @csrf 
                <a class="dropdown-item" href=""
                  onclick="event.preventDefault();
                            this.closest('form').submit();">
                  Cerrar Sesión
                </a>
              </form>
            </li>
          </ul>
        </div>
      </div>
    </div>
  @endauth

  @guest 
    <span>Bienvenido, <strong>Invitado</strong></span><br>
    <div class="row">
      <div class="col">
        <a href="/login" class="w3-bar-item w3-button"><i class="fa fa-user"></i></a>
      </div>
    </div>
  @endguest
  
</div>

        </div>
       
        <hr>
        <div class="w3-container">
            <h5>Menu</h5>
        </div>

        <div class="w3-bar-block">
            <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black"
                onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>&nbsp; Close Menu</a>
            <a href="{{route('index')}}" class="w3-bar-item w3-button w3-padding {{ request()->is('index*') ? 'active' : '' }}"><i class="fa fa-users fa-fw"></i>&nbsp;
                INICIO</a>
            
            <a href="{{route('cursos.index')}}" class="w3-bar-item w3-button w3-padding {{ request()->is('cursos*') ? 'active' : '' }}"><i class="fa fa-bullseye fa-fw"></i>&nbsp;
                CURSOS</a>
            
            <a href="{{route('departamentos.index')}}" class="w3-bar-item w3-button w3-padding {{ request()->is('departamentos*') ? 'active' : '' }}"><i class="fa fa-bullseye fa-fw"></i>&nbsp;
                DEPARTAMENTOS</a>
            
            <a href="{{route('puestos.index')}}" class="w3-bar-item w3-button w3-padding {{ request()->is('puestos*') ? 'active' : '' }}"><i class="fa fa-cog fa-fw"></i>&nbsp;
                PUESTOS</a><br><br>
        </div>

      <!-- Boton LOGOUT -->
@auth
  <div class="row">
    <div class="col">
      <div class="dropdown">
        <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
          {{ Auth::user()->email }}
        </button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Perfil</a></li>
          <li>
            <form action="{{ route('logout') }}" method="post">
              @csrf 
              <a class="dropdown-item" href=""
                onclick="event.preventDefault();
                          this.closest('form').submit();">
                Cerrar Sesión
              </a>
            </form>
          </li>
        </ul>
      </div>
    </div>
  </div>
@endauth

@guest 
  <a href="/login" class="w3-bar-item w3-button"><i class="fa fa-user"></i></a>
@endguest

</div> <!--  este era un navbar -->
  </div>
    <div class="col-md-9">
      @yield("contenido")
    </div>
</div>

<script>
        // Get the Sidebar
        var mySidebar = document.getElementById("mySidebar");

        // Get the DIV with overlay effect
        var overlayBg = document.getElementById("myOverlay");

        // Toggle between showing and hiding the sidebar, and add overlay effect
        function w3_open() {
            if (mySidebar.style.display === 'block') {
                mySidebar.style.display = 'none';
                overlayBg.style.display = "none";
            } else {
                mySidebar.style.display = 'block';
                overlayBg.style.display = "block";
            }
        }

        // Close the sidebar with the close button
        function w3_close() {
            mySidebar.style.display = "none";
            overlayBg.style.display = "none";
        }
    </script>

</body>

</html>