<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categoria;

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
}
