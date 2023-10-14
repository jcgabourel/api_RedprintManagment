<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categoria;
use Illuminate\Support\Facades\Redis;

class categoriasController extends Controller
{
    //
    function index()
    {
        return categoria::all();
    }
    function store(Request $request)
    {
         
        categoria::create(["nombre"=>$request->input("nombre")]);
    }
    public function show(categoria $categoria)
    {
        return $categoria;
    }
    public function destroy(categoria $categoria)
    {
        $categoria->delete();
    }
    function update (Request $request, categoria $categoria)
    {
        $categoria->nombre = $request->input("nombre");
        $categoria->save();
    }
}
