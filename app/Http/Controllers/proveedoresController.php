<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\proveedor;


class proveedoresController extends Controller
{
    function index()
    {
        return proveedor::all();
    }
    function store(Request $request)
    {
        return  proveedor::create(["nombre" => $request->input("nombre")]);
    }
    public function show(proveedor $proveedor)
    {
        return $proveedor;
    }
    public function destroy(proveedor $proveedor)
    {
        $proveedor->delete();
    }
    function update(Request $request, proveedor $proveedor)
    {
        $proveedor->nombre = $request->input("nombre");
        $proveedor->save();
    }
}
