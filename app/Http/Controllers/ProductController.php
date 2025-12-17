<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    public function index(Request $request)
    {
        $query = Product::query();


        if ($request->has('buscar') && $request->buscar != '') {
            $query->where('nombre', 'like', '%' . $request->buscar . '%')
                ->orWhere('categoria', 'like', '%' . $request->buscar . '%');
        }

        $products = $query->latest()->paginate(10);

        $products->appends(['buscar' => $request->buscar]);

        return view('admin.productos.index', compact('products'));
    }


    public function create()
    {
        return view('admin.productos.create');
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'nombre' => 'required|string|max:100',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0.01',
            'stock' => 'required|integer|min:0',
            'categoria' => 'required|string',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $imagenUrl = null;


        if ($request->hasFile('imagen')) {
            $path = $request->file('imagen')->store('products', 'public');
            $imagenUrl = Storage::url($path);
        } else {

            $imagenUrl = '/assets/img/no-image.png';
        }


        Product::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'stock' => $request->stock,
            'categoria' => $request->categoria,
            'imagen_url' => $imagenUrl,
            'activo' => true
        ]);


        return redirect()->route('admin.productos.index')
            ->with('success', 'Producto creado exitosamente.');
    }


    public function edit(Product $product)
    {
        return view('admin.productos.edit', compact('product'));
    }


    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0.01',
            'stock' => 'required|integer|min:0',
            'categoria' => 'required|string',
            'activo' => 'required|boolean',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($request->hasFile('imagen')) {

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

        return redirect()->route('admin.productos.index')
            ->with('success', 'Producto actualizado exitosamente!');
    }


    public function destroy(Product $product)
    {
        if (
            $product->imagen_url &&
            !str_starts_with($product->imagen_url, 'http') &&
            $product->imagen_url !== '/assets/img/no-image.png'
        ) {

            $relativePath = str_replace('/storage/', '', $product->imagen_url);
            Storage::disk('public')->delete($relativePath);
        }

        $product->delete();

        return redirect()->route('admin.productos.index')
            ->with('success', 'Producto eliminado exitosamente!');
    }
}