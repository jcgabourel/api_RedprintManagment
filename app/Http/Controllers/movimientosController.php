<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\movimiento;
use Carbon\Carbon;


class movimientosController extends Controller
{
    function index()
    {
        return movimiento::with("producto","locacion","tipo")->get();
    }

    function store(Request $request)
    { //'producto_id' ,'locacion_id','cantidad','stock_move_type_id''

       
        $movimiento = movimiento::create([
            "producto_id" => $request->input("producto_id"),
            "locacion_id" => $request->input("locacion_id"),
            "cantidad" => $request->input("cantidad"),
            "estatus" =>'Procesado',
            "stock_move_type_id" => $request->input("stock_move_type_id"),
            "fecha"=> Carbon::now()
        ]);
        return $movimiento ;
    }

    function storeBatch(Request $request){
        $data = $request->validate([
            '*.producto_id' => 'required',
            '*.locacion_id' => 'required',
            '*.cantidad' => 'required',
            "*.estatus" =>'Procesado',
            '*.stock_move_type_id' => 'required',
        ]);


        movimiento::insert($data);

         
        event(new movimientosCreados($data));

        return response()->json([], 200);

    }

    public function destroy(movimiento $movimiento)
    {
        $movimiento->delete();
    }
}
