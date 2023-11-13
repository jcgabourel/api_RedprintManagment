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

    protected $visible = [ 'id', 'compra_id' ,'producto','cantidad','precio','total'];
    protected $appends = ['total'];

    public function producto()
    {
        return $this->belongsTo(producto::class, 'producto_id');
    }

    public function getTotalAttribute()
    {
        return $this->cantidad * $this->precio;
    }
}
