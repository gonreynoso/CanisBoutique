<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // NOTA: El método 'catalogo' (público) lo hemos movido a StoreController
    // para mantener este controlador exclusivo para la gestión del ADMINISTRADOR.

    // ==========================================
    // ÁREA ADMIN (CRUD)
    // ==========================================

    /**
     * Muestra la tabla de productos (Admin).
     */
    public function index()
    {
        // Paginamos de 10 en 10
        $products = Product::latest()->paginate(10);

        // CAMBIO IMPORTANTE: Apuntamos a la carpeta 'admin/products'
        return view('admin.productos.index', compact('products'));
    }

    /**
     * Muestra el formulario de creación.
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Guarda el producto en la BD.
     */
    public function store(Request $request)
    {
        // 1. Validaciones
        $validated = $request->validate([
            'nombre' => 'required|string|max:100',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0.01',
            'stock' => 'required|integer|min:0',
            'categoria' => 'required|string',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $imagenUrl = null;

        // 2. Si sube una foto real, la guardamos
        if ($request->hasFile('imagen')) {
            $path = $request->file('imagen')->store('products', 'public');
            $imagenUrl = Storage::url($path);
        } else {
            // Imagen por defecto si no suben nada
            $imagenUrl = '/assets/img/no-image.png';
        }

        // 3. Crear en BD
        Product::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'stock' => $request->stock,
            'categoria' => $request->categoria,
            'imagen_url' => $imagenUrl,
            'activo' => true
        ]);

        // CAMBIO IMPORTANTE: Redirigimos a la ruta del admin
        return redirect()->route('admin.products.index')
            ->with('success', 'Producto creado exitosamente.');
    }

    /**
     * Muestra el formulario de edición.
     */
    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    /**
     * Actualiza el producto existente.
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0.01',
            'stock' => 'required|integer|min:0',
            'categoria' => 'required|string',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($request->hasFile('imagen')) {
            // Lógica inteligente: Solo borramos si es una imagen local (no de Unsplash ni la default)
            if (
                $product->imagen_url &&
                !str_starts_with($product->imagen_url, 'http') &&
                $product->imagen_url !== '/assets/img/no-image.png'
            ) {

                $relativePath = str_replace('/storage/', '', $product->imagen_url);
                Storage::disk('public')->delete($relativePath);
            }

            $path = $request->file('imagen')->store('products', 'public');
            $validated['imagen_url'] = Storage::url($path);
        }

        $product->update($validated);

        return redirect()->route('admin.products.index')
            ->with('success', 'Producto actualizado exitosamente!');
    }

    /**
     * Elimina el producto.
     */
    public function destroy(Product $product)
    {
        // Solo borramos del disco si es imagen local
        if (
            $product->imagen_url &&
            !str_starts_with($product->imagen_url, 'http') &&
            $product->imagen_url !== '/assets/img/no-image.png'
        ) {

            $relativePath = str_replace('/storage/', '', $product->imagen_url);
            Storage::disk('public')->delete($relativePath);
        }

        $product->delete();

        return redirect()->route('admin.products.index')
            ->with('success', 'Producto eliminado exitosamente!');
    }
}