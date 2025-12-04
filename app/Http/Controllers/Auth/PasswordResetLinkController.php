<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;

class PasswordResetLinkController extends Controller
{
    /**
     * Display the password reset link request view.
     */
    public function create(): View
    {
        return view('auth.forgot-password');
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        // Intentamos enviar el enlace de restablecimiento
        $status = Password::sendResetLink(
            $request->only('email')
        );

        // Definimos el mensaje ambiguo que queremos mostrar al usuario.
        // Esto evita la enumeración de usuarios (vulnerabilidad de seguridad).
        $ambiguousMessage = 'Si tu dirección de correo electrónico es correcta, te enviaremos un enlace para restablecer tu contraseña.';

        // Si fue exitoso O si falló, devolvemos el MISMO mensaje.
        if ($status == Password::RESET_LINK_SENT) {
            // Retorna back() con el mensaje ambiguo en el campo 'status' (el campo de éxito de Breeze)
            return back()->with('status', $ambiguousMessage);
        } else {
            // Retorna back() con el mensaje ambiguo como un error de validación 
            // Esto asegura que la respuesta sea idéntica al caso de éxito.
            return back()->withInput($request->only('email'))
                ->withErrors(['email' => $ambiguousMessage]);
        }
    }
}