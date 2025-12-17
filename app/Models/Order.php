<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

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