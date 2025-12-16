<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = [
        'order_id',
        'product_id',
        'nombre_producto',
        'cantidad',
        'precio_unitario',
        'subtotal'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}