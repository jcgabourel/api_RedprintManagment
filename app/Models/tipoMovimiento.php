<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipoMovimiento extends Model
{
    use HasFactory;
    protected $table = 'stock_move_types';

    protected $visible = [ 'id', 'nombre','tipo_base'];
}
