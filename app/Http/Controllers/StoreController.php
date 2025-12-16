<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StoreController extends Controller
{
    // 1. CATÁLOGO (Vista Principal)
    public function index(Request $request)
    {
        $query = Product::where('activo', true);

        if ($request->has('categoria') && $request->categoria != null) {
            $query->where('categoria', $request->categoria);
        }

        // Búsqueda por texto (si usaste el buscador del header)
        if ($request->has('search') && $request->search != null) {
            $query->where('nombre', 'like', '%' . $request->search . '%');
        }

        $productos = $query->latest()->paginate(9);

        return view('web.tienda.index', compact('productos'));
    }

    // 2. DETALLE DE PRODUCTO
    public function show($id)
    {
        $producto = Product::where('activo', true)->findOrFail($id);
        return view('web.tienda.show', compact('producto'));
    }

    // 3. AGREGAR AL CARRITO
    public function addToCart($id)
    {
        $producto = Product::findOrFail($id);
        $cart = session()->get('cart', []);

        // Si existe, sumamos cantidad
        if (isset($cart[$id])) {
            $cart[$id]['cantidad']++;
        } else {
            // Si no, lo creamos
            $cart[$id] = [
                "product_id" => $producto->id,
                "nombre" => $producto->nombre,
                "cantidad" => 1,
                "precio" => $producto->precio,
                "imagen" => $producto->imagen_url
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', '¡Producto agregado al carrito!');
    }

    // 4. VER CARRITO
    public function cart()
    {
        return view('web.tienda.cart');
    }

    // 5. ELIMINAR DEL CARRITO
    public function removeFromCart($id)
    {
        $cart = session()->get('cart');
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        return redirect()->back()->with('success', 'Producto eliminado.');
    }

    // 6. VISTA DE CHECKOUT
    public function checkout()
    {
        if (!session('cart') || count(session('cart')) == 0) {
            return redirect()->route('tienda.index');
        }
        return view('web.tienda.checkout');
    }

    // 7. PROCESAR COMPRA (Guardar en DB)
    public function processOrder(Request $request)
    {
        $request->validate([
            'cliente_nombre' => 'required|string|min:3',
            'cliente_email' => 'required|email',
            'cliente_telefono' => 'required',
            'cliente_direccion' => 'required',
        ]);

        $cart = session('cart');

        // Validación extra: Carrito vacío
        if (!$cart) {
            return redirect()->route('tienda.index')->with('error', 'El carrito está vacío.');
        }

        $total = 0;
        foreach ($cart as $item) {
            $total += $item['precio'] * $item['cantidad'];
        }

        try {
            DB::beginTransaction();

            // Crear Orden
            $order = Order::create([
                'cliente_nombre' => $request->cliente_nombre,
                'cliente_email' => $request->cliente_email,
                'cliente_telefono' => $request->cliente_telefono,
                'cliente_direccion' => $request->cliente_direccion,
                'total' => $total,
                'estado' => 'pagado',
            ]);

            // Crear Items
            foreach ($cart as $id => $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item['product_id'],
                    'nombre_producto' => $item['nombre'],
                    'cantidad' => $item['cantidad'],
                    'precio_unitario' => $item['precio'],
                    'subtotal' => $item['precio'] * $item['cantidad']
                ]);
            }

            DB::commit();
            session()->forget('cart'); // Vaciar carrito

            return redirect()->route('tienda.success', $order->id);

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Error al procesar la compra: ' . $e->getMessage());
        }
    }

    // 8. PÁGINA DE ÉXITO
    public function orderSuccess($id)
    {
        $order = Order::with('items')->findOrFail($id);
        return view('web.tienda.success', compact('order'));
    }
}