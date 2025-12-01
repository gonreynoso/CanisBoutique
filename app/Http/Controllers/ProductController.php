<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // ... (Método index() que ya hicimos)

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Simplemente devuelve la vista del formulario
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Validación de datos
        $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0.01',
            'stock' => 'required|integer|min:0',
            // Reglas de imagen: debe ser una imagen, máximo 2MB, tipos jpeg, png, jpg, gif
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;

        // 2. Manejo de la subida de imagen (si existe)
        if ($request->hasFile('image')) {
            // Guarda la imagen en 'storage/app/public/products' y obtiene la ruta
            $imagePath = $request->file('image')->store('products', 'public');
        }

        // 3. Crear el producto en la base de datos
        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'image_path' => $imagePath,
        ]);

        // 4. Redireccionar con un mensaje de éxito
        return redirect()->route('products.index')
            ->with('success', 'Producto creado exitosamente.');
    }

    // ... (Métodos show, edit, update, destroy)
}