<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StoreController extends Controller
{

    public function index(Request $request)
    {
        $query = Product::where('activo', true);

        if ($request->has('categoria') && $request->categoria != null) {
            $query->where('categoria', $request->categoria);
        }


        if ($request->has('search') && $request->search != null) {
            $query->where('nombre', 'like', '%' . $request->search . '%');
        }

        $productos = $query->latest()->paginate(9);

        return view('web.tienda.index', compact('productos'));
    }
    public function show($id)
    {
        $producto = Product::where('activo', true)->findOrFail($id);
        return view('web.tienda.show', compact('producto'));
    }


    public function addToCart($id)
    {
        $producto = Product::findOrFail($id);
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['cantidad']++;
        } else {

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

    public function cart()
    {
        return view('web.tienda.cart');
    }


    public function removeFromCart($id)
    {
        $cart = session()->get('cart');
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        return redirect()->back()->with('success', 'Producto eliminado.');
    }


    public function checkout()
    {
        if (!session('cart') || count(session('cart')) == 0) {
            return redirect()->route('tienda.index');
        }
        return view('web.tienda.checkout');
    }


    public function processOrder(Request $request)
    {
        $request->validate([
            'cliente_nombre' => 'required|string|min:3',
            'cliente_email' => 'required|email',
            'cliente_telefono' => 'required',
            'cliente_direccion' => 'required',
        ]);

        $cart = session('cart');


        if (!$cart) {
            return redirect()->route('tienda.index')->with('error', 'El carrito está vacío.');
        }

        $total = 0;
        foreach ($cart as $item) {
            $total += $item['precio'] * $item['cantidad'];
        }

        try {
            DB::beginTransaction();


            $order = Order::create([
                'cliente_nombre' => $request->cliente_nombre,
                'cliente_email' => $request->cliente_email,
                'cliente_telefono' => $request->cliente_telefono,
                'cliente_direccion' => $request->cliente_direccion,
                'total' => $total,
                'estado' => 'pagado',
            ]);


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
            session()->forget('cart');

            return redirect()->route('tienda.success', $order->id);

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Error al procesar la compra: ' . $e->getMessage());
        }
    }


    public function orderSuccess($id)
    {
        $order = Order::with('items')->findOrFail($id);
        return view('web.tienda.success', compact('order'));
    }

    public function profile()
    {

        $user = auth()->user();


        $orders = Order::where('cliente_email', $user->email)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('web.perfil', compact('user', 'orders'));
    }

    public function increaseQuantity($id)
    {
        $cart = session()->get('cart');

        if (isset($cart[$id])) {
            $cart[$id]['cantidad']++;
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Cantidad actualizada');
    }

    public function decreaseQuantity($id)
    {
        $cart = session()->get('cart');

        if (isset($cart[$id])) {

            if ($cart[$id]['cantidad'] > 1) {
                $cart[$id]['cantidad']--;
                session()->put('cart', $cart);
            } else {

                unset($cart[$id]);
                session()->put('cart', $cart);
            }
        }

        return redirect()->back()->with('success', 'Carrito actualizado');
    }
}