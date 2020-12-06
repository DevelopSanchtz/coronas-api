<?php

namespace App\Http\Controllers;

use App\Models\Objetosventa;
use Illuminate\Http\Request;

class CRUD_objetoventaController extends Controller
{
    public function CreateProduct(Request $request)
    {
        $OV = new Objetosventa();

        $OV->nombre       = $request->nombre;
        $OV->precio       = $request->precio;
        $OV->cantidad     = $request->cantidad;
        $OV->descripcion  = $request->descripcion;
        $OV->tamano       = $request->tamano;
        $OV->imagenCorona = $request->imagenCorona;
        $OV->raiting      = $request->raiting;

        $OV->save();
    }

    public function ReadProduct()
    {
        $OV = Objetosventa::all();;

        return $OV;
    }

    public function comprar(Request $request)
    {
        $OV = Objetosventa::findOrFail($request->id);

        $cantidadComprar = $request->cantidad;

        $cantidadObjeto = $OV::select('cantidad')->where('id', $request->id)->value('cantidad');


        $cantidadObjeto -= $cantidadComprar;

        if ($cantidadObjeto >= 0) {
            $OV->cantidad = $cantidadObjeto;
            $OV->save();
        } else {
            return response(500);
        }
    }
}