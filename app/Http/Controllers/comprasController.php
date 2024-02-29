<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\compra;
use App\Models\detalleCompra;

class comprasController extends Controller
{
    function index()
    {


        $compras = compra::with("proveedor", "detalle")->get();
        // $compras->each(function ($compra) {
        //     $compra->total = $compra->detalle->sum('total');
        // });

        return $compras;
    }

    function store(Request $request)
    {

        $request->validate([
            'proveedor_id' => 'required|integer',
            'productos' => 'required|array',
        ]);



        // Obtener los datos del JSON
        $fecha = $request->input('fecha');
        $proveedorId = $request->input('proveedor_id');
        $productos = $request->input('productos');



        try {
            //code...


            $compra = compra::create(["proveedor_id" => $proveedorId, "fecha" => $fecha ,"estatus"=>"Sin Ingresar"]  );

            foreach ($productos as $producto) {


                $productoId = $producto['producto_id'];
                $cantidad = $producto['cantidad'];
                $precio = $producto['precio'];



                detalleCompra::create([
                    'compra_id' => $compra->id,
                    'producto_id' => $productoId,
                    'cantidad' => $cantidad,
                    'precio' => $precio,
                ]);
            }

            return $compra;
        } catch (\Throwable $th) {

            return response()->json('Error',400);
            //return $th;
        }

        return "fin";
    }

    function storeBatch(Request $request)
    {
        $data = $request->validate([
            '*.producto_id' => 'required',
            '*.locacion_id' => 'required',
            '*.cantidad' => 'required',
            "*.estatus" => 'Procesado',
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
