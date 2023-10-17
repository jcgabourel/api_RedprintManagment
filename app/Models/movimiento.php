<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class movimiento extends Model
{
    use HasFactory;

    protected $table = 'stock_moves';
    protected $fillable = [
        'producto_id' ,'locacion_id','cantidad','stock_move_type_id'
    ];

    
    protected $visible = [  'producto','locacion','tipo','cantidad','estatus'];
    public function producto()
    {
        return $this->belongsTo(producto::class, 'producto_id');
    }
    public function locacion()
    {
        return $this->belongsTo(locacion::class, 'locacion_id');
    }
    public function tipo()
    {
        return $this->belongsTo(tipoMovimiento::class, 'stock_move_type_id');
    }

}
