<?php

namespace App\Listeners;

use App\Events\movimientosCreados;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class actualizaExistencias
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
    public function handle(movimientosCreados $event): void
    {
        //
    }
}
