<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    public function index()
    {
        // Obtener todos los productos, ordenados por el más reciente, con paginación
        $products = Product::latest()->paginate(10);

        // Retornar la vista 'products.index' con los datos
        return view('products.index', [
            'products' => $products,
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Simplemente devuelve la vista del formulario
        return view('products.create');
    }

    // En app/Http/Controllers/ProductController.php

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        // Retorna la vista de edición, pasando el producto a modificar.
        return view('products.edit', [
            'product' => $product,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        // 1. Validación de datos (Ajusta 'image_file' si tu campo en la vista es diferente)
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0.01',
            'stock' => 'required|integer|min:0',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // 2. Manejo de la subida de nueva imagen
        if ($request->hasFile('image_file')) {
            // Eliminar la imagen anterior si existe
            if ($product->image_path) {
                Storage::disk('public')->delete($product->image_path);
            }

            // Subir la nueva imagen
            $validated['image_path'] = $request->file('image_file')->store('products', 'public');
        }

        // 3. Actualizar el producto
        $product->update($validated);

        // 4. Redirigir
        return redirect()
            ->route('products.index')
            ->with('success', '¡Producto actualizado exitosamente!');
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

    public function destroy(Product $product)
    {
        // 1. Eliminar la imagen del disco (Storage) si existe
        if ($product->image_path) {
            Storage::disk('public')->delete($product->image_path);
        }

        // 2. Eliminar el registro de la base de datos
        $product->delete();

        // 3. Redirigir con mensaje de éxito
        return redirect()
            ->route('products.index')
            ->with('success', '¡Producto eliminado exitosamente!');
    }
}