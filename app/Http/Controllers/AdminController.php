<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Turno;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{
    public function index()
    {
        // Asegúrate de que estas 4 variables existan:
        $totalUsuarios = User::count();

        $turnosHoy = Turno::whereDate('fecha', Carbon::today())
            ->where('estado', '!=', 'cancelado')->count();

        $turnosPendientes = Turno::whereDate('fecha', '>', Carbon::today())
            ->where('estado', '!=', 'cancelado')->count();

        $proximosTurnos = Turno::where('fecha', '>=', Carbon::today())
            ->where('estado', '!=', 'cancelado')
            ->orderBy('fecha', 'asc')->orderBy('hora', 'asc')
            ->take(5)->get();

        // Y que se pasen a la vista con compact:
        return view('admin.index', compact('totalUsuarios', 'turnosHoy', 'turnosPendientes', 'proximosTurnos'));
    }
}
