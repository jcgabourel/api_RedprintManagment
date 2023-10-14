<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\locacion;

class locacionesController extends Controller
{
    function index()
    {
        return locacion::all();
    }
    function store(Request $request)
    {
        locacion::create(["nombre" => $request->input("nombre")]);
    }
    public function show(locacion $locacion)
    {
        return $locacion;
    }
    public function destroy(locacion $locacion)
    {
        $locacion->delete();
    }
    function update(Request $request, locacion $locacion)
    {
        $locacion->nombre = $request->input("nombre");
        $locacion->save();
    }
}
