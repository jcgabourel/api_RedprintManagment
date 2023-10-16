<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

use App\Models\Categoria;
use App\Models\marca;
use App\Models\existencia;


class producto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre' ,'marca_id','categoria_id'
    ];

    protected $visible = ['id','nombre','marca','categoria','existencias_suma','existencias'];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

    public function marca()
    {
        return $this->belongsTo(Marca::class, 'marca_id');
    }

    public function existencias(): HasMany
    {
        return $this->hasMany(existencia::class);
    }

}
