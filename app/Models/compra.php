<?php

namespace App\Models;

use App\Models\proveedor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class compra extends Model
{
    use HasFactory;

    
    protected $table = 'compras';
    protected $fillable = [
        'proveedor_id' ,'fecha' ,'estatus'
    ];

    protected $appends = ['total'];
    
    protected $visible = [ 'id', 'proveedor' ,'fecha','detalle','total','estatus'];
 

    public function proveedor()
    {
        return $this->belongsTo(proveedor::class, 'proveedor_id');
    }

    public function detalle()    : HasMany
    {
        return $this->hasMany(detalleCompra::class);
    }

    public function getTotalAttribute()
    {
        return $this->detalle->sum('total');
    }
    
   
 




   
}
