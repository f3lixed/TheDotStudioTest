<?php

namespace App\Http\Controllers;

use App\Capacitacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CapacitacionController extends Controller
{
    public function index()
    {
      if (Auth::user()->rol == "admin") {
        $horario = ["10","11","12","13","14","15","16","17","18","19","20","21","22"];
        $dia = ["Lunes","Martes","Miercoles","Jueves","Viernes"];
        return view("capacitacions.dashboardCreate", ["horario"=>$horario, "dias"=>$dia]);
      }
      return route("dashboard-createcapusu");
    }

    public function create(Request $request)
    {
      $modelCapacitacion = new Capacitacion;

      $response = $modelCapacitacion->setCapacitacion($request);

      $respuesta = array('status' => 'success', 'message' => 'Registro exitoso!');

      if (!$response) {
        $respuesta['status'] = "error";
      }
      echo json_encode($respuesta);
    }
}
