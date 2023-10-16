<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

use App\Models\producto;
use App\Models\locacion;

class existencia extends Model
{
    use HasFactory;
    protected $fillable = [
         'producto_id','locacion_id' ,'cantidad'
    ];

    protected $visible = [  'locacion','cantidad'];

    public function producto()
    {
        return $this->belongsTo(producto::class, 'producto_id');
    }

    public function locacion()
    {
        return $this->belongsTo(locacion::class, 'locacion_id');
    }
}
