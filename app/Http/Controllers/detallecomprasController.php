<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\detalleCompra;

class detallecomprasController extends Controller
{
   function index ($id)
   {
    
    return detalleCompra::where("compra_id",$id)->with('producto')->get();
   }
}
