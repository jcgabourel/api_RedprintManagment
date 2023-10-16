<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\producto;

class productosController extends Controller
{
    function index()
    {
        return producto::with('categoria', 'marca')->get();
    }
    function store(Request $request)
    {
        producto::create([
            "nombre" => $request->input("nombre"),
            "categoria_id" => $request->input("categoria_id"),
            "marca_id" => $request->input("marca_id")
        ]);
    }
    public function show(producto $producto)
    {
        $producto->load(['marca', 'categoria']);
        return $producto;
    }
    public function destroy(producto $producto)
    {
        $producto->delete();
    }
    function update(Request $request, producto $producto)
    {
        $producto->nombre = $request->input("nombre");
        $producto->save();
    }
}
