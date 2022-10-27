<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class CapacitacionUsuario extends Model
{
  public function getAll($id,$activo=false)
  {
    $capacitaciones = CapacitacionUsuario::join('capacitacions', 'capacitacions.id', '=', 'capacitacion_usuarios.capacitacion_id')->where("UsuarioAsignado",$id)->orderBy('capacitacion_usuarios.id', 'desc')->get();
    if ($activo) {
      $capacitaciones = CapacitacionUsuario::join('capacitacions', 'capacitacions.id', '=', 'capacitacion_usuarios.capacitacion_id')->where("UsuarioAsignado",$id)->where("capacitacion_usuarios.Activo",1)->orderBy('capacitacion_usuarios.id', 'desc')->get();
    }
    return $capacitaciones;
  }

  public function setCapacitacionUsuario($request)
  {
    $capacitacion = new CapacitacionUsuario;
    $capacitacion->capacitacion_id = $request->capacitacion;
    $capacitacion->UsuarioAsignado = Auth::user()->id;
    $capacitacion->Activo = 1;
    if ($capacitacion->save()) {
      return true;
    }
    return false;
  }

  public function updateCapacitacionUsuario($request)
  {
    $capacitacion = CapacitacionUsuario::where('UsuarioAsignado',Auth::user()->id)->where('capacitacion_id',$request->capacitacion_id)->get();
    $modelCapacitacionUsuario = CapacitacionUsuario::find($capacitacion[0]->id);
    if ($modelCapacitacionUsuario->delete()) {
      return true;
    }
    return false;
  }
}
