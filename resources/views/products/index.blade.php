@php
    // Asegúrate de importar la clase Str (String) para truncar la descripción
    use Illuminate\Support\Str; 
@endphp

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestión de Productos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                {{-- Mensaje de Éxito (Si viene de store, update o destroy) --}}
                @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
                        role="alert">
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif

                {{-- Botón para Crear Nuevo Producto --}}
                <div class="flex justify-end mb-4">
                    <a href="{{ route('products.create') }}"
                        class="bg-pink-600 hover:bg-pink-700 text-white font-bold py-2 px-4 rounded-lg transition duration-150">
                        Crear Nuevo Producto
                    </a>
                </div>

                {{-- Tabla de Productos --}}
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3">ID</th>
                                <th scope="col" class="px-6 py-3">Imagen</th>
                                <th scope="col" class="px-6 py-3">Nombre</th>
                                <th scope="col" class="px-6 py-3">Descripción</th>
                                <th scope="col" class="px-6 py-3">Precio</th>
                                <th scope="col" class="px-6 py-3">Stock</th>
                                <th scope="col" class="px-6 py-3">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $product)
                                <tr class="bg-white border-b hover:bg-gray-100">
                                    <td class="px-6 py-4">{{ $product->id }}</td>
                                    <td class="px-6 py-4">
                                        {{-- Mostrar Imagen --}}
                                        @if ($product->image_path)
                                            <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}"
                                                class="w-12 h-12 object-cover rounded">
                                        @else
                                            <span class="text-xs text-gray-400">N/A</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 font-semibold text-gray-900">{{ $product->name }}</td>
                                    <td class="px-6 py-4 text-gray-600 max-w-xs overflow-hidden truncate">
                                        {{ Str::limit($product->description, 50) }}
                                    </td>
                                    <td class="px-6 py-4 text-green-600 font-medium">
                                        ${{ number_format($product->price, 2) }}</td>
                                    <td
                                        class="px-6 py-4 {{ $product->stock == 0 ? 'text-red-500 font-bold' : 'text-gray-900' }}">
                                        {{ $product->stock }}
                                    </td>

                                    <td class="px-6 py-4 space-x-2 flex items-center">
                                        {{-- Botón Editar --}}
                                        <a href="{{ route('products.edit', $product) }}"
                                            class="font-medium text-pink-600 hover:text-pink-800">
                                            Editar
                                        </a>

                                        {{-- Formulario Eliminar --}}
                                        <form method="POST" action="{{ route('products.destroy', $product) }}"
                                            onsubmit="return confirm('¿Estás seguro de que deseas eliminar el producto: {{ $product->name }}?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="font-medium text-red-600 hover:text-red-800 ms-2">
                                                Eliminar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr class="bg-white border-b">
                                    <td colspan="7" class="px-6 py-4 text-center text-gray-500">
                                        No hay productos registrados. ¡Crea uno para empezar!
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- Paginación --}}
                <div class="mt-4">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>