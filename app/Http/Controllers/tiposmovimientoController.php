<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tipoMovimiento;

class tiposmovimientoController extends Controller
{
    //
    function index (){
        return tipoMovimiento::all();
    }
}
