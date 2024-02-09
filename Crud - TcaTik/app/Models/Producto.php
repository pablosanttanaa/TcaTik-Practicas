<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    public function almacens()
    {
        return $this->belongsToMany(Almacen::class, 'productos_has_almacens', 'producto_id', 'almacen_id');
    }
    public function categoria()
{
    return $this->belongsTo(Categoria::class, 'categoria_id');
}
}
