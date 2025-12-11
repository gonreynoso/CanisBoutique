<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ajuste extends Model
{
    protected $table = 'ajustes';
    protected $fillable = [
        'nombre',
        'description',
        'sucursal',
        'direccion',
        'telefono',
        'email',
        'divisa',
        'pagina_web',
    ];
}
