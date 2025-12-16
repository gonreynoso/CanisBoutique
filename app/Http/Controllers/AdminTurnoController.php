<?php

namespace App\Http\Controllers;

use App\Models\Turno;
use Illuminate\Http\Request;

class AdminTurnoController extends Controller
{
    // 1. Cargar la vista principal con el calendario
    public function index()
    {
        return view('admin.turnos.index');
    }

    // 2. Método API interno: Devuelve los eventos en JSON para FullCalendar
    public function datos()
    {
        // Traemos todos los turnos que no estén cancelados
        $turnos = Turno::where('estado', '!=', 'cancelado')->with('servicio')->get();

        $eventos = [];

        foreach ($turnos as $turno) {
            $eventos[] = [
                'id' => $turno->id,
                // Título: Qué servicio es y de quién
                'title' => $turno->servicio->nombre . ' - ' . $turno->mascota_nombre,
                // Fecha de inicio (ISO8601)
                'start' => $turno->fecha . 'T' . $turno->hora,
                // Color: Usamos tu rosa CanisBoutique
                'backgroundColor' => '#d63384',
                'borderColor' => '#d63384',
                // Datos extra para mostrar al hacer clic (opcional)
                'extendedProps' => [
                    'cliente' => $turno->cliente_nombre,
                    'telefono' => $turno->cliente_telefono,
                ]
            ];
        }

        return response()->json($eventos);
    }

    public function destroy($id)
    {
        $turno = Turno::findOrFail($id);
        $turno->delete(); // Soft Delete (se va a la papelera y libera el horario)

        return response()->json(['success' => true]);
    }
}