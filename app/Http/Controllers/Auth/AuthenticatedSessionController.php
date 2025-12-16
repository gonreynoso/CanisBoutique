<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        // LÓGICA DE REDIRECCIÓN INTELIGENTE

        // 1. Si el usuario tiene el permiso de Admin/Empleado
        if ($request->user()->can('ver_panel_admin')) {
            // Usamos 'intended' para que si intentó entrar a /admin/turnos sin loguearse,
            // el sistema lo lleve allí después del login, en vez de al dashboard general.
            return redirect()->intended(route('admin.index'));
        }

        // 2. Si es un Cliente normal
        return redirect()->intended(route('welcome'));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
