<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Producto: ') . $product->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                {{-- Formulario de Edición --}}
                <form method="POST" action="{{ route('products.update', $product) }}" enctype="multipart/form-data">
                    @csrf
                    {{-- Método PUT/PATCH requerido por Laravel para las actualizaciones --}}
                    @method('PUT')

                    {{-- Nombre del Producto --}}
                    <div class="mb-4">
                        <x-input-label for="name" :value="__('Nombre del Producto')" />
                        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $product->name)" required autofocus />
                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                    </div>

                    {{-- Descripción --}}
                    <div class="mb-4">
                        <x-input-label for="description" :value="__('Descripción')" />
                        <textarea id="description" name="description" rows="3"
                            class="border-gray-300 focus:border-pink-500 focus:ring-pink-500 rounded-md shadow-sm mt-1 block w-full">{{ old('description', $product->description) }}</textarea>
                        <x-input-error class="mt-2" :messages="$errors->get('description')" />
                    </div>

                    {{-- Precio y Stock (Fila) --}}
                    <div class="flex space-x-4 mb-4">
                        <div class="w-1/2">
                            <x-input-label for="price" :value="__('Precio ($)')" />
                            <x-text-input id="price" name="price" type="number" step="0.01" class="mt-1 block w-full"
                                :value="old('price', $product->price)" required />
                            <x-input-error class="mt-2" :messages="$errors->get('price')" />
                        </div>
                        <div class="w-1/2">
                            <x-input-label for="stock" :value="__('Stock')" />
                            <x-text-input id="stock" name="stock" type="number" class="mt-1 block w-full"
                                :value="old('stock', $product->stock)" required />
                            <x-input-error class="mt-2" :messages="$errors->get('stock')" />
                        </div>
                    </div>

                    {{-- Imagen Actual --}}
                    <div class="mb-4">
                        <x-input-label :value="__('Imagen Actual')" />
                        @if ($product->image_path)
                            <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}"
                                class="w-24 h-24 object-cover rounded mt-2 border border-gray-200">
                        @else
                            <span class="text-gray-500">No hay imagen subida.</span>
                        @endif
                    </div>

                    {{-- Subir Nueva Imagen --}}
                    <div class="mb-6">
                        <x-input-label for="image_file" :value="__('Subir Nueva Imagen (Opcional)')" />
                        <input id="image_file" name="image_file" type="file"
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none mt-1" />
                        <x-input-error class="mt-2" :messages="$errors->get('image_file')" />
                    </div>

                    {{-- Botones de Acción --}}
                    <div class="flex items-center justify-end">
                        <a href="{{ route('products.index') }}" class="text-gray-600 hover:text-gray-800 mr-4">
                            {{ __('Cancelar') }}
                        </a>
                        <x-primary-button class="bg-pink-600 hover:bg-pink-700">
                            {{ __('Guardar Cambios') }}
                        </x-primary-button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>