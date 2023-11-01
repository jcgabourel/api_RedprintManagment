<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use App\Models\existencia;
use App\Models\movimiento;
use App\Events\movimientoEliminado;



class elminiaExistencia
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(movimientoEliminado $event): void
    {
        $existencia = existencia::firstOrNew(["producto_id"=>$event->movimiento->producto_id,
        "locacion_id"=>$event->movimiento->locacion_id],
       ["cantidad"=>0]);

        $cantidad =movimiento::where(["producto_id"=>$event->movimiento->producto_id])
        ->where(["locacion_id"=>$event->movimiento->locacion_id])
        ->sum("cantidad");
 



         if($cantidad == 0)                             
         {
             $existencia->delete();
         }
         else 
         {
             $existencia->cantidad =   $cantidad;     
             $existencia->save();
         }


    }
}
