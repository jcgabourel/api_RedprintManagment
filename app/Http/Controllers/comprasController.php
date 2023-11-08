<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\compra;

class comprasController extends Controller
{
    function index()
    {
        return compra::with("producto","locacion","tipo")->get();
    }

    function store(Request $request)
    { //'producto_id' ,'locacion_id','cantidad','stock_move_type_id''

       
        $compra = compra::create([
            "producto_id" => $request->input("producto_id"),
            "locacion_id" => $request->input("locacion_id"),
            "cantidad" => $request->input("cantidad"),
            "estatus" =>'Procesado',
            "stock_move_type_id" => $request->input("stock_move_type_id")
        ]);
        return $compra ;
    }

    function storeBatch(Request $request){
        $data = $request->validate([
            '*.producto_id' => 'required',
            '*.locacion_id' => 'required',
            '*.cantidad' => 'required',
            "*.estatus" =>'Procesado',
            '*.stock_move_type_id' => 'required',
        ]);


        compra::insert($data);

         
        event(new comprasCreados($data));

        return response()->json([], 200);

    }

    public function destroy(compra $compra)
    {
        $compra->delete();
    }
}
