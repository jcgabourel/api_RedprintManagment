<?php

namespace App\Models;

use App\Models\proveedor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class compra extends Model
{
    use HasFactory;

    
    protected $table = 'compras';
    protected $fillable = [
        'proveedor_id' ,'fecha'
    ];

    
    protected $visible = [ 'id', 'proveedor' ,'fecha'];
 

    public function proveedor()
    {
        return $this->belongsTo(proveedor::class, 'proveedor_id');
    }
    
}
