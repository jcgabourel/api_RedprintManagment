<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\producto;


class detalleCompra extends Model
{
    use HasFactory;
 
    protected $fillable = [
        'compra_id' ,'producto_id','cantidad','precio'
    ];

    protected $visible = [ 'id', 'compra_id' ,'producto','cantidad','precio'];

    public function producto()
    {
        return $this->belongsTo(producto::class, 'producto_id');
    }
}
