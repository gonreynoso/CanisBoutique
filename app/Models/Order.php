<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // AQUI ESTABA EL PROBLEMA: Faltaba definir qué campos se pueden escribir
    protected $fillable = [
        'cliente_nombre',
        'cliente_email',
        'cliente_telefono',
        'cliente_direccion',
        'total',
        'estado'
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}