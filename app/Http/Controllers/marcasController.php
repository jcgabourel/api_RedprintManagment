<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\marca;

class marcasController extends Controller
{
    function index()
    {
        return marca::all();
    }
    function store(Request $request)
    {
        return  marca::create(["nombre" => $request->input("nombre")]);
    }
    public function show(marca $marca)
    {
        return $marca;
    }
    public function destroy(marca $marca)
    {
        $marca->delete();
    }
    function update(Request $request, marca $marca)
    {
        $marca->nombre = $request->input("nombre");
        $marca->save();
    }
}
