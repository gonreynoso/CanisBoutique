<?php

namespace App\Http\Controllers;

use App\Models\Ajuste;
use Illuminate\Http\Request;

class AjusteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ajuste = Ajuste::first();
        $jsonData = file_get_contents("https://api.hilariweb.com/divisas");
        $data = json_decode($jsonData, true);
        return view('admin.ajustes.index', compact('data', 'ajuste'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $ajuste = Ajuste::firstOrNew([]);
        // dd($request->all());
        $rules = [
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
            'sucursal' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'telefono' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'divisa' => 'required',
            'pagina_web' => 'nullable|string|max:255',
        ];

        $request->validate($rules);

        if (!$ajuste) {
            $ajuste = new Ajuste();
        }

        $ajuste->nombre = $request->nombre;
        $ajuste->descripcion = $request->descripcion;
        $ajuste->sucursal = $request->sucursal;
        $ajuste->direccion = $request->direccion;
        $ajuste->telefono = $request->telefono;
        $ajuste->email = $request->email;
        $ajuste->divisa = $request->divisa;
        $ajuste->pagina_web = $request->pagina_web;
        $ajuste->save();

        return redirect()->route('admin.ajustes.index')
            ->with('success', 'Ajustes guardados correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ajuste $ajuste)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ajuste $ajuste)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ajuste $ajuste)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ajuste $ajuste)
    {
        //
    }
}
