<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class loginController extends Controller
{
    public function login(Request $request)
    {
        $user = new User();

        $correo     = $request->correo;
        $contrasena = $request->contrasena;

        $correoEvaluar     = $user::select('correo')->where('correo', $correo)->value('correo');
        $contrasenaEvaluar = $user::select('contrasena')->where('contrasena', $contrasena)->value('contrasena');

        if ($correoEvaluar != null && $contrasenaEvaluar != null) {
            return response(200);
        } else {
            return response(500);
        }
    }
}