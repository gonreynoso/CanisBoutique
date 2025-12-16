<?php

namespace App\Http\Controllers;

use App\Models\Turno;
use App\Models\Servicio;
use Illuminate\Http\Request;

class TurnoController extends Controller
{
    // 1. Mostrar el formulario de reserva
    public function create()
    {
        // Solo mostramos servicios activos
        $servicios = Servicio::where('activo', true)->get();

        return view('web.reservar', compact('servicios'));
    }

    // 2. Guardar el turno (Con validación de disponibilidad)
    public function store(Request $request)
    {
        // A. Validamos que los datos vengan bien
        $request->validate([
            'servicio_id' => 'required|exists:servicios,id',
            'fecha' => 'required|date|after_or_equal:today', // No permitir fechas pasadas
            'hora' => 'required',
            'cliente_nombre' => 'required|string|max:255',
            'cliente_email' => 'required|email',
            'cliente_telefono' => 'required|string|max:20',
            'mascota_nombre' => 'required|string|max:255',
            'mascota_tipo' => 'required|string',
        ]);

        // B. Lógica de Negocio: ¿El turno está ocupado?
        // Buscamos si hay un turno en esa fecha+hora y que NO esté cancelado
        $turnoOcupado = Turno::where('fecha', $request->fecha)
            ->where('hora', $request->hora)
            ->where('estado', '!=', 'cancelado')
            ->exists();

        if ($turnoOcupado) {
            return back()
                ->withInput() // Devuelve los datos escritos para no borrarlos
                ->withErrors(['hora' => 'Lo sentimos, ese horario ya está reservado. Por favor elige otro.']);
        }

        // C. Si está libre, creamos el turno
        Turno::create([
            'servicio_id' => $request->servicio_id,
            'fecha' => $request->fecha,
            'hora' => $request->hora,
            'cliente_nombre' => $request->cliente_nombre,
            'cliente_email' => $request->cliente_email,
            'cliente_telefono' => $request->cliente_telefono,
            'mascota_nombre' => $request->mascota_nombre,
            'mascota_tipo' => $request->mascota_tipo,
            'estado' => 'confirmado' // Por defecto confirmado para MVP
        ]);

        // D. Redirigir con éxito
        return redirect()->route('web.index')
            ->with('success', '¡Tu turno ha sido reservado con éxito! Te esperamos.');
    }
}