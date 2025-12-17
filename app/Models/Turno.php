<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

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


    public function servicio()
    {
        return $this->belongsTo(Servicio::class);
    }

    public function getGoogleCalendarLinkAttribute()
    {

        $inicio = Carbon::parse($this->fecha . ' ' . $this->hora);
        $fin = $inicio->copy()->addHour();


        $fechas = $inicio->format('Ymd\THis') . '/' . $fin->format('Ymd\THis');


        $titulo = urlencode("Turno CanisBoutique: " . $this->mascota_nombre);
        $detalles = urlencode("Reserva confirmada para " . $this->cliente_nombre . ". Servicio: " . ($this->servicio->nombre ?? 'Estándar'));
        $ubicacion = urlencode("CanisBoutique Local");
        return "https://calendar.google.com/calendar/render?action=TEMPLATE&text={$titulo}&dates={$fechas}&details={$detalles}&location={$ubicacion}";
    }
}
