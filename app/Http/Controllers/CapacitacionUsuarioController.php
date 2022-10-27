<?php

namespace App\Http\Controllers;

use App\Capacitacion;
use App\CapacitacionUsuario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CapacitacionUsuarioController extends Controller
{
  public function index()
  {
    $modelCapacitacionUsuario = new CapacitacionUsuario;
    $capacitacionesUsuario = $modelCapacitacionUsuario->getAll(Auth::user()->id,true);
    foreach ($capacitacionesUsuario as $key => $value) {
      $notIn[] = $value->id;
    }
    $modelCapacitacion = new Capacitacion;
    $capacitaciones = $modelCapacitacion->getAll(true,$notIn);

    return view("capacitacions.dashboardCreateUsuario", ["capacitaciones"=>$capacitaciones]);
  }

  public function create(Request $request)
  {
    $modelCapacitacionUsuario = new CapacitacionUsuario;

    $response = $modelCapacitacionUsuario->setCapacitacionUsuario($request);

    $respuesta = array('status' => 'success', 'message' => 'Registro exitoso!');

    if (!$response) {
      $respuesta['status'] = "error";
    }
    echo json_encode($respuesta);
  }

  public function cancelar(Request $request)
  {
    $modelCapacitacionUsuario = new CapacitacionUsuario;

    $response = $modelCapacitacionUsuario->updateCapacitacionUsuario($request);

    $respuesta = array('status' => 'success', 'message' => 'Registro exitoso!');

    if (!$response) {
      $respuesta['status'] = "error";
      $respuesta['message'] = "error interno intenta mas tarde";
    }
    echo json_encode($respuesta);
  }
}
