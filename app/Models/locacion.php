<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class locacion extends Model
{
    use HasFactory;

    protected $table = 'locaciones';
 
    protected $fillable = [
        'nombre' 
    ];

    protected $visible = ['id','nombre'];
}
