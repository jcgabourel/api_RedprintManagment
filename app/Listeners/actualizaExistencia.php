<?php

namespace App\Listeners;

use App\Events\movimientoCreado;
use App\Models\existencia;
use App\Models\movimiento;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class actualizaExistencia
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
    public function handle(movimientoCreado $event): void
    {
        //

        
        $existencia = existencia::firstOrNew(["producto_id"=>$event->movimiento->producto_id,
                                              "locacion_id"=>$event->movimiento->locacion_id],
                                             ["cantidad"=>0]);
        
    
        $cantidad =movimiento::where(["producto_id"=>$event->movimiento->producto_id])
                             ->where(["locacion_id"=>$event->movimiento->locacion_id])
                             ->sum("cantidad");

        $existencia->cantidad = $cantidad;
        $existencia->save();
        $event->movimiento->estatus ="Procesado";
        $event->movimiento->save();

    }
}
