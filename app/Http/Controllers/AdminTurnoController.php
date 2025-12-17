<?php

namespace App\Http\Controllers;

use App\Models\Turno;
use Illuminate\Http\Request;

class AdminTurnoController extends Controller
{

    public function index()
    {
        return view('admin.turnos.index');
    }


    public function datos()
    {

        $turnos = Turno::where('estado', '!=', 'cancelado')->with('servicio')->get();

        $eventos = [];

        foreach ($turnos as $turno) {
            $eventos[] = [
                'id' => $turno->id,

                'title' => $turno->servicio->nombre . ' - ' . $turno->mascota_nombre,

                'start' => $turno->fecha . 'T' . $turno->hora,

                'backgroundColor' => '#d63384',
                'borderColor' => '#d63384',

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
        $turno->delete();

        return response()->json(['success' => true]);
    }
}