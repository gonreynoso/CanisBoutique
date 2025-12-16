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

    // Relación: Un turno pertenece a un servicio
    public function servicio()
    {
        return $this->belongsTo(Servicio::class);
    }

    public function getGoogleCalendarLinkAttribute()
    {
        // 1. Definir fechas
        // Asumimos que la fecha y hora están en tu zona horaria local
        $inicio = Carbon::parse($this->fecha . ' ' . $this->hora);
        $fin = $inicio->copy()->addHour(); // Asumimos 1 hora de duración (ajústalo si varía)

        // 2. Formato para Google (Ymd\THis)
        // Usamos hora "flotante" (sin Z al final) para que se agende en la hora local del usuario
        $fechas = $inicio->format('Ymd\THis') . '/' . $fin->format('Ymd\THis');

        // 3. Construir URL
        $titulo = urlencode("Turno CanisBoutique: " . $this->mascota_nombre);
        $detalles = urlencode("Reserva confirmada para " . $this->cliente_nombre . ". Servicio: " . ($this->servicio->nombre ?? 'Estándar'));
        $ubicacion = urlencode("CanisBoutique Local"); // Pon tu dirección real aquí

        return "https://calendar.google.com/calendar/render?action=TEMPLATE&text={$titulo}&dates={$fechas}&details={$detalles}&location={$ubicacion}";
    }
}
