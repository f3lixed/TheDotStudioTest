<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Capacitacion extends Model
{
    public function getAll($activo=false,$notIn=false)
    {
      $capacitaciones = Capacitacion::orderBy('id', 'desc')->get();
      if ($activo) {
        $capacitaciones = Capacitacion::where('activo',1)->orderBy('id', 'desc')->get();
        if ($notIn) {
          $capacitaciones = Capacitacion::whereNotIn('id',$notIn)->where('activo',1)->orderBy('id', 'desc')->get();
        }
      }
      return $capacitaciones;
    }

    public function setCapacitacion($request)
    {
      $capacitacion = new Capacitacion;
      $capacitacion->description = $request->Descripcion;
      $capacitacion->HoraInicio = $request->HoraInicio;
      $capacitacion->HoraFin = $request->HoraFin;
      $capacitacion->Dia = $request->Dia;
      $capacitacion->Cupos = $request->Cupos;
      $capacitacion->activo = 1;
      if ($capacitacion->save()) {
        return true;
      }
      return false;
    }

}
