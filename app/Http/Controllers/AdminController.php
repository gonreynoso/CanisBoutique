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

        $totalUsuarios = User::count();

        $turnosHoy = Turno::whereDate('fecha', Carbon::today())
            ->where('estado', '!=', 'cancelado')->count();

        $turnosPendientes = Turno::whereDate('fecha', '>', Carbon::today())
            ->where('estado', '!=', 'cancelado')->count();

        $proximosTurnos = Turno::where('fecha', '>=', Carbon::today())
            ->where('estado', '!=', 'cancelado')
            ->orderBy('fecha', 'asc')->orderBy('hora', 'asc')
            ->take(5)->get();


        return view('admin.index', compact('totalUsuarios', 'turnosHoy', 'turnosPendientes', 'proximosTurnos'));
    }
}
