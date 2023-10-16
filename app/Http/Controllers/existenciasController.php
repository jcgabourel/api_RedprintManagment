<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 
use App\Models\producto;


class existenciasController extends Controller
{
    //
    function index()
    {
        return  producto::with('existencias.locacion')->withSum('existencias as existencias_suma', 'cantidad' ,'existencias')->get();

      // return producto::with('existencias')->get();
        // existencia::with('locacion', 'producto')->get();
    }








    function store(Request $request)
    {
         
        return  existencia::create(["producto_id"=>$request->input("producto_id"),
                                    "locacion_id"=>$request->input("locacion_id"),
                                    "cantidad"=>$request->input("cantidad")]);
    }
    public function show(existencia $existencia)
    {
        return $existencia;
    }
    public function destroy(existencia $existencia)
    {
        $existencia->delete();
    }
    function update (Request $request, existencia $existencia)
    {
        $existencia->nombre = $request->input("nombre");
        $existencia->save();
    }
}
