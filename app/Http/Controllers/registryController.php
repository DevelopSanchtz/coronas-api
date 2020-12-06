<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class registryController extends Controller
{
    public function Registry(Request $request)
    {
        $user = new User();

        $user->nombreCompleto   = $request->nombreCompleto;
        $user->correo           = $request->correo;
        $user->contrasena       = $request->contrasena;
        $user->fechaNacimiento  = $request->fechaNacimiento;
        $user->estadoResidencia = $request->estadoResidencia;

        $user->save();
    }
}