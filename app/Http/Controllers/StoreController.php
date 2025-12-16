<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    // Listado de productos (Catálogo)
    public function index(Request $request)
    {
        // 1. Iniciamos consulta de productos activos
        $query = Product::where('activo', true);

        // 2. Filtro por Categoría (si el usuario hace clic en "Juguetes")
        if ($request->has('categoria') && $request->categoria != null) {
            $query->where('categoria', $request->categoria);
        }

        $productos = $query->latest()->paginate(9); // 9 es buen número (3x3)
        return view('web.tienda.index', compact('productos'));
    }

    // Detalle de un producto individual
    public function show($id)
    {
        // Buscamos por ID, si no existe lanza error 404 automáticamente
        $producto = Product::where('activo', true)->findOrFail($id);

        return view('web.tienda.show', compact('producto'));
    }

    // Carrito de compras (Lo dejaremos visual por ahora)
    public function cart()
    {
        return view('web.tienda.cart');
    }
}