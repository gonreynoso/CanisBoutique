<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $query = User::whereDoesntHave('roles', function ($q) {
            $q->where('name', 'SUPER ADMIN');
        })->withTrashed();
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%');
            });
        }
        $users = $query->paginate(10);
        return view('admin.usuarios.index', compact('users', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.usuarios.create', compact('roles'))
            ->with('icono', 'success');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. VALIDACIÓN
        $request->validate([
            'role' => 'required',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',

            // LA CLAVE ESTÁ AQUÍ: 'confirmed'
            'password' => 'required|string|min:8|confirmed',
        ]);

        // 2. CREAR EL USUARIO
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password), // Encriptar siempre
        ]);

        // 3. ASIGNAR ROL (Si estás implementando roles en el create)
        $user->assignRole($request->role);

        // 4. REDIRECCIONAR
        return redirect()->route('admin.usuarios.index')
            ->with('message', 'Usuario creado exitosamente.')
            ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        return view('admin.usuarios.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        $roles = Role::all();
        return view('admin.usuarios.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'role' => 'required',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = bcrypt($request->password);
        }
        $user->syncRoles($request->role);
        $user->save();



        return redirect()->route('admin.usuarios.index')
            ->with('message', 'Usuario actualizado exitosamente.')
            ->with('icono', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // dd("Llegué al controlador. ID a borrar: " . $id);
        $user = User::find($id);
        $user->estado = false;
        $user->save();
        $user = User::find($id);
        $user->delete();

        return redirect()->route('admin.usuarios.index')
            ->with('message', 'Usuario deshabilitado exitosamente.')
            ->with('icono', 'success');
    }

    public function restore($id)
    {
        $user = User::withTrashed()->find($id);
        $user->restore();
        $user = User::find($id);
        $user->estado = true;
        $user->save();

        return redirect()->route('admin.usuarios.index')
            ->with('message', 'Usuario restaurado exitosamente.')
            ->with('icono', 'success');
    }
}
