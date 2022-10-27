<?php

namespace App\Http\Controllers;

use App\Capacitacion;
use App\CapacitacionUsuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(Request $request)
    {
      $authenticateUser = ($request->authenticateUser)?true:false;
      if (Auth::user()) {
        return redirect()->intended("dashboard");
      }
      return view('users.index', compact('authenticateUser'));
    }

    public function login(Request $request)
    {
      $credentials = $request->only('email', 'password');
      if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->intended("dashboard");
      }else {
        $authenticateUser = true;
        return view("users.index", compact('authenticateUser'));
      }
    }

    public function logout(Request $request)
    {
      Auth::logout();
      $request->session()->invalidate();
      $request->session()->regenerateToken();
      return redirect()->intended("login");
    }

    public function show()
    {
      if (Auth::user()->rol == "admin") {
        $modelCapacitacion = new Capacitacion;
        $capacitaciones = $modelCapacitacion->getAll();
        return view("users.dashboardAdmin", ["capacitaciones"=>$capacitaciones]);
      }else {
        $modelCapacitacionUsuario = new CapacitacionUsuario;
        $capacitaciones = $modelCapacitacionUsuario->getAll(Auth::user()->id);
        return view("users.dashboard", ["capacitaciones"=>$capacitaciones]);
      }
    }
}
