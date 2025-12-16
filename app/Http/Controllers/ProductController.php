<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // ==========================================
    // ÁREA PÚBLICA (Lo que ve el cliente)
    // ==========================================

    public function catalogo(Request $request)
    {
        // 1. Iniciamos la consulta base: solo productos activos
        $query = Product::where('activo', true);

        // 2. Filtro por Categoría (Si viene en la URL ?categoria=juguetes)
        if ($request->has('categoria') && $request->categoria != null) {
            $query->where('categoria', $request->categoria);
        }

        // 3. Obtenemos resultados paginados
        $productos = $query->latest()->paginate(9);

        // 4. Retornamos la vista PÚBLICA (la grilla de fotos)
        return view('web.productos.index', compact('productos'));
    }

    // ==========================================
    // ÁREA ADMIN (CRUD)
    // ==========================================

    public function index()
    {
        // Admin: Listado tipo tabla para gestionar stock/precios
        $products = Product::latest()->paginate(10);
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        // Validación con nombres en ESPAÑOL (según tu DB)
        $validated = $request->validate([
            'nombre' => 'required|string|max:100',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0.01',
            'stock' => 'required|integer|min:0',
            'categoria' => 'required|string', // Agregamos categoría
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagenUrl = null;

        // Si sube una foto real, la guardamos y obtenemos la URL pública
        if ($request->hasFile('imagen')) {
            $path = $request->file('imagen')->store('products', 'public');
            // Guardamos la ruta relativa, luego en el modelo usaremos un Accessor o Asset
            $imagenUrl = Storage::url($path);
        }

        Product::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'stock' => $request->stock,
            'categoria' => $request->categoria,
            'imagen_url' => $imagenUrl, // Usamos la misma columna para URL externa o Path local
            'activo' => true
        ]);

        return redirect()->route('products.index')
            ->with('success', 'Producto creado exitosamente.');
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0.01',
            'stock' => 'required|integer|min:0',
            'categoria' => 'required|string',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('imagen')) {
            // Borrar imagen vieja si NO es una URL de Unsplash (si es local)
            if ($product->imagen_url && !str_starts_with($product->imagen_url, 'http')) {
                // Truco: Convertir URL pública a path relativo para borrar
                $relativePath = str_replace('/storage/', '', $product->imagen_url);
                Storage::disk('public')->delete($relativePath);
            }

            $path = $request->file('imagen')->store('products', 'public');
            $validated['imagen_url'] = Storage::url($path);
        }

        $product->update($validated);

        return redirect()->route('products.index')
            ->with('success', 'Producto actualizado exitosamente!');
    }

    public function destroy(Product $product)
    {
        // Solo borramos del disco si es una imagen local (no borramos nada de Unsplash)
        if ($product->imagen_url && !str_starts_with($product->imagen_url, 'http')) {
            $relativePath = str_replace('/storage/', '', $product->imagen_url);
            Storage::disk('public')->delete($relativePath);
        }

        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Producto eliminado exitosamente!');
    }
}