<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class contactsController extends Controller
{
    function categorias()
    {
        $data = ["id" => "int", "nombre" => "string"];
        return   $data;
    }
    function    marcas()
    {
        $data = ["id" => "int", "nombre" => "string"];
        return   $data;
    }

    function    locaciones()
    {
        $data = ["id" => "int", "nombre" => "string"];
        return   $data;
    }
}
