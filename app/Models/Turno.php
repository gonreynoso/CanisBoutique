<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Turno extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'servicio_id',
        'fecha',
        'hora',
        'cliente_nombre',
        'cliente_email',
        'cliente_telefono',
        'mascota_nombre',
        'mascota_tipo',
        'estado'
    ];

    // Relación: Un turno pertenece a un servicio
    public function servicio()
    {
        return $this->belongsTo(Servicio::class);
    }
}
