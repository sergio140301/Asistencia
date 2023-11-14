<style>
  .container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh; /* Ajusta la altura al 100% de la ventana gráfica */
}
    .card {
  max-width: 320px;
  border-width: 1px;
  border-color: rgba(219, 234, 254, 1);
  border-radius: 1rem;
  background-color: rgba(255, 255, 255, 1);
  padding: 1rem;
}

.header {
  display: flex;
  align-items: center;
  grid-gap: 1rem;
  gap: 1rem;
}

.icon {
  flex-shrink: 0;
  display: flex;
  align-items: center;
  justify-content: center;
  border-radius: 9999px;
  background-color: rgba(96, 165, 250, 1);
  padding: 0.5rem;
  color: rgba(255, 255, 255, 1);
}

.icon svg {
  height: 1rem;
  width: 1rem;
}

.alert {
  font-weight: 600;
  color: rgba(107, 114, 128, 1);
}

.message {
  margin-top: 1rem;
  color: rgba(107, 114, 128, 1);
}

.actions {
  margin-top: 1.5rem;
}

.actions a {
  text-decoration: none;
}

.mark-as-read, .read {
  display: inline-block;
  border-radius: 0.5rem;
  width: 100%;
  padding: 0.75rem 1.25rem;
  text-align: center;
  font-size: 0.875rem;
  line-height: 1.25rem;
  font-weight: 600;
}

.read {
  background-color: rgba(59, 130, 246, 1);
  color: rgba(255, 255, 255, 1);
}

.mark-as-read {
  margin-top: 0.5rem;
  background-color: rgba(249, 250, 251, 1);
  color: rgba(107, 114, 128, 1);
  transition: all .15s ease;
}

.mark-as-read:hover {
  background-color: rgb(230, 231, 233);
}

/* Card */
.card{
  transform: translateX(10vw) translateY(5vh); /* Utiliza unidades de vista para la posición */
  padding-right: 0;
  width: 90%; /* Utiliza porcentaje en lugar de píxeles */
  max-width: 360px;
  height: 40vh; /* Utiliza unidades de altura de vista */
  margin-left: 5vw; 
}

/* Body */
body{
 background-image:url("https://images.unsplash.com/photo-1698160540199-26ec7f574872?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3wzNTc5fDB8MXxhbGx8MTN8fHx8fHwyfHwxNjk4MjQ3NjE3fA&ixlib=rb-4.0.3&q=80&w=2560");
}

/* Read */
.card .actions .read{
 width:80% !important;
}

/* Mark read */
.card .actions .mark-as-read{
 width:60%;
}


</style>
<div class="container">
<div class="card">
    <div class="header">
      <span class="icon">
        <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
          <path clip-rule="evenodd" d="M18 3a1 1 0 00-1.447-.894L8.763 6H5a3 3 0 000 6h.28l1.771 5.316A1 1 0 008 18h1a1 1 0 001-1v-4.382l6.553 3.276A1 1 0 0018 15V3z" fill-rule="evenodd"></path>
        </svg>
      </span>
      <p class="alert">Nuevo Mensaje!</p>
    </div>
  
    <p class="message">
      Este es un programa prototipo de una empresa 'X', estamos construyendo el programa, se podria
      decir que es una V1, asi que puedes presentar algunos errores.. Gracias por usar nuestro sistema!☺
    </p>
  
    <div class="actions">
      <a class="read" href="{{route('vista.admin')}}">
        Ingresar como Administrador
      </a>
  
      <a class="mark-as-read" href="{{route('vista.usuario')}}">
        Portal de Usuarios
      </a>
    </div>
  </div>
</div>

