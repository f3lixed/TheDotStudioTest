<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Prueba</title>
    <link rel="stylesheet" href="/css/app.css">
    <script src="/js/app.js"></script>
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
    <form method="post" id="form-capacitacion">
      @csrf
      <h1 class="h3 mb-3 fw-normal">Nueva Capacitacion</h1>

      <div class="form-floating">
        <input name="Descripcion" type="text" class="form-control" id="floatingInput">
        <label for="floatingInput">Descripcion</label>
      </div>
      <div class="form-floating">
        <select name="HoraInicio" class="form-control">
          <option selected>Seleccione un horario</option>
          @foreach ($horario as $hora)
          <option value="{{$hora}}">{{$hora}}:00</option>
          @endforeach
        </select>
        <label for="floatingInput">Hora Inicio</label>
      </div>
      <div class="form-floating">
        <select name="HoraFin" class="form-control">
          <option selected>Seleccione un horario</option>
          @foreach ($horario as $hora)
          <option value="{{$hora}}">{{$hora}}:00</option>
          @endforeach
        </select>
        <label for="floatingInput">Hora Fin</label>
      </div>
      <div class="form-floating">
        <select name="Dia" class="form-control">
          <option selected>Seleccione un dia</option>
          @foreach ($dias as $dia)
          <option value="{{$dia}}">{{$dia}}</option>
          @endforeach
        </select>
        <label for="floatingInput">Dia de semana</label>
      </div>
      <div class="form-floating">
        <input name="Cupos" type="text" class="form-control" id="floatingInput">
        <label for="floatingInput">Cupos</label>
      </div>
    </br>
      <button id="enviar" class="w-100 btn btn-lg btn-primary" type="button">Guardar</button>
    </form>
  </div>

  <script>
      $(document).ready(function(e){
        $("#enviar").click(function(){
          // alert($('input[name=_token]').val());
          // var form = $('#form-capacitacion')[1];
          // var data = new FormData(form);
          var data = $( "#form-capacitacion" ).serialize();
          $.post("/dashboard/new-cap",data,function(response, status){
            var resp = JSON.parse(response);
            alert(resp.message);
            if (resp.status=="success") {
              window.location.href = "/dashboard";
            }
          });
        });
      });
    </script>

  </body>
</html>
