<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{

    public function index()
    {
        $roles = Role::paginate(10);
        return view('admin.roles.index', compact('roles'));
    }


    public function create()
    {
        return view('admin.roles.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles|string|max:255',
        ]);

        $role = new Role();
        $role->name = strtoupper($request->name);
        $role->save();

        return redirect()->route('admin.roles.index')->with('message', 'Rol creado exitosamente')
            ->with('icono', 'success');
    }


    public function show(string $id)
    {
        $role = Role::findOrFail($id);
        return view('admin.roles.show', compact('role'));
    }


    public function edit(string $id)
    {
        $role = Role::findOrFail($id);

        if (strtolower($role->name) === 'super admin') {
            return redirect()->route('admin.roles.index')
                ->with('message', 'No se permite editar el rol principal del sistema.')
                ->with('icono', 'info');
        }

        return view('admin.roles.edit', compact('role'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|unique:roles,name,' . $id . '|string|max:255',
        ]);

        $role = Role::findOrFail($id);
        $role->name = strtoupper($request->name);
        $role->save();

        return redirect()->route('admin.roles.index')->with('message', 'Se actualizo el rol')->with('icono', 'success');
    }


    public function destroy(string $id)
    {
        $role = Role::findOrFail($id);

        // Lista de roles que NADIE puede borrar (puedes agregar más aquí)
        $rolesProtegidos = ['super admin', 'admin', 'cliente'];

        if (in_array(strtolower($role->name), $rolesProtegidos)) {
            return redirect()->route('admin.roles.index')
                ->with('message', 'Acción denegada: El rol "' . $role->name . '" es vital para el sistema.')
                ->with('icono', 'error');
        }

        $role->delete();

        return redirect()->route('admin.roles.index')
            ->with('message', 'Rol eliminado correctamente.')
            ->with('icono', 'success');
    }
}
