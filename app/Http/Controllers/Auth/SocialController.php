<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SocialController extends Controller
{
    /**
     * Redirige al usuario a la página de autenticación de Google.
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Maneja la respuesta de Google para autenticar o registrar al usuario.
     */
    public function handleGoogleCallback()
    {
        try {
            // 1. Obtener la información del usuario de Google
            $googleUser = Socialite::driver('google')->user();

            // 2. Buscar si el usuario ya existe por su email
            $user = User::where('email', $googleUser->getEmail())->first();

            if ($user) {
                // 3. Si el usuario existe, simplemente lo loguea
                Auth::login($user);
            } else {
                // 4. Si el usuario no existe, lo crea
                $user = User::create([
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    // Genera una contraseña aleatoria, ya que no se usa con Google
                    'password' => Hash::make(Str::random(16)),
                    'phone' => null, // Dejamos el teléfono en NULL, siguiendo tu lógica de baja fricción
                    'email_verified_at' => now(), // Verificamos el email inmediatamente
                ]);

                // 5. Loguea al nuevo usuario
                Auth::login($user);
            }

            // 6. Redirección final al dashboard
            return redirect()->route('dashboard');

        } catch (\Exception $e) {
            // Manejo de errores (puedes loguear el error o redirigir a login con mensaje)
            return redirect()->route('login')->withErrors(['google' => 'Error al iniciar sesión con Google. Inténtalo de nuevo.']);
        }
    }
}