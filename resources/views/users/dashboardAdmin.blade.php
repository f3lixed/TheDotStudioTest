<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Prueba</title>
    <link rel="stylesheet" href="/css/app.css">
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    <nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
      <a class="navbar-brand">Menu</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="/dashboard">Capacitaciones</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/dashboard/create-cap">Crear Capacitacion</a>
          </li>
          <li class="nav-item">
            <a href="/logout" class="nav-link disabled">Salir</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container">
    <h1>Capacitaciones</h1>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Descripcion</th>
      <th scope="col">Dia</th>
      <th scope="col">Hora Inicio</th>
      <th scope="col">Hora Fin</th>
      <th scope="col">Cupos</th>
      <th scope="col">Activo</th>
    </tr>
  </thead>
  <tbody>
    @if (count($capacitaciones)==0)
      <tr>
        <th rowspan="5">No hay capacitaciones.</th>
      </tr>
    @else
      @foreach ($capacitaciones as $capacitacion)
      <tr>
        <th scope="row">{{$capacitacion->id}}</th>
        <td>{{$capacitacion->description}}</td>
        <td>{{$capacitacion->Dia}}</td>
        <td>{{$capacitacion->HoraInicio}}:00</td>
        <td>{{$capacitacion->HoraFin}}:00</td>
        <td>{{$capacitacion->Cupos}}</td>
        <td>{{($capacitacion->activo)?'Si':'No'}}</td>
      </tr>
      @endforeach
    @endif
  </tbody>
</table>
  </div>



  </body>
</html>
