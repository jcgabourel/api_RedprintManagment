<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Categoria;
use App\Models\marca;

class producto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre' ,'marca_id','categoria_id'
    ];

    protected $visible = ['id','nombre','marca','categoria'];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

    public function marca()
    {
        return $this->belongsTo(Marca::class, 'marca_id');
    }

}
