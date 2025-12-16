<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Especificamos la tabla si no sigues la convención plural inglesa (products)
    // protected $table = 'productos'; 

    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'categoria',
        'imagen_url',
        'stock',
        'activo'
    ];
}