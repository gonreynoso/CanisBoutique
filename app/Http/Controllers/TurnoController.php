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
        // A. Validaciones
        $request->validate(
            [
                'servicio_id' => 'required|exists:servicios,id',
                'fecha' => 'required|date|after_or_equal:today',
                'hora' => 'required',
                'cliente_nombre' => ['required', 'string', 'min:3', 'max:255', 'regex:/^[\pL\s]+$/u'],
                'cliente_email' => ['required', 'email', 'max:255'],
                'cliente_telefono' => ['required', 'numeric', 'digits_between:8,15'],
                'mascota_nombre' => 'required|string|max:255',
                'mascota_tipo' => 'required|string',
            ],
            [
                'cliente_nombre.regex' => 'El nombre solo debe contener letras y espacios.',
                'cliente_email.email' => 'Debes ingresar un correo electrónico válido.',
                'cliente_telefono.numeric' => 'El teléfono solo debe contener números.',
                'cliente_telefono.digits_between' => 'El teléfono debe tener entre 8 y 15 dígitos.',
            ]
        );

        // --- AQUÍ ELIMINÉ EL Turno::create($request->all()); QUE CAUSABA EL ERROR ---

        // B. Lógica de Negocio: Verificación PREVIA
        $turnoOcupado = Turno::where('fecha', $request->fecha)
            ->where('hora', $request->hora)
            ->where('estado', '!=', 'cancelado')
            ->exists();

        if ($turnoOcupado) {
            return back()
                ->withInput()
                ->withErrors(['hora' => 'Lo sentimos, ese horario ya está reservado.']);
        }

        // C. Si está libre, AHORA SÍ creamos el turno
        $turno = Turno::create([
            'servicio_id' => $request->servicio_id,
            'fecha' => $request->fecha,
            'hora' => $request->hora,
            'cliente_nombre' => $request->cliente_nombre,
            'cliente_email' => $request->cliente_email,
            'cliente_telefono' => $request->cliente_telefono,
            'mascota_nombre' => $request->mascota_nombre,
            'mascota_tipo' => $request->mascota_tipo,
            'estado' => 'confirmado'
        ]);

        // D. Redirigir
        return redirect()->route('web.reservaConfirmada')
            ->with('turnoReciente', $turno); // <--- CAMBIO CLAVE AQUÍ
    }
}