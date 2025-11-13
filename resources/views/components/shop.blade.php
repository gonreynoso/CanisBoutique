<section id="productos" class="bg-gray-50 py-20">
  <div class="max-w-7xl mx-auto px-6 text-center">
    <div class="text-pink-600 font-semibold mb-2 flex items-center justify-center gap-2">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M12 11c0 3-2 5-4 5s-4-2-4-5 2-5 4-5 4 2 4 5zM20 11c0 3-2 5-4 5s-4-2-4-5 2-5 4-5 4 2 4 5z"/>
      </svg>
      Nuestra Tienda
    </div>

    <h2 class="text-3xl md:text-4xl font-bold text-gray-900">
      Productos de Calidad para tu Mascota
    </h2>

    <p class="mt-3 text-gray-600 max-w-2xl mx-auto">
      Seleccionamos cuidadosamente los mejores productos para el bienestar y felicidad de tu compañero.
    </p>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-12">

      @foreach ($productos as $producto)
      <div class="bg-white rounded-xl border shadow-sm hover:shadow-md transition overflow-hidden">
        <div class="relative">
          <img src="{{ asset('images/' . $producto['imagen']) }}" alt="{{ $producto['titulo'] }}" class="w-full h-56 object-cover">
          <span class="absolute top-3 left-3 bg-pink-600 text-white text-xs px-3 py-1 rounded-full">{{ $producto['etiqueta'] }}</span>
        </div>
        <div class="p-6 text-left">
          <h3 class="font-semibold text-lg">{{ $producto['titulo'] }}</h3>
          <p class="text-gray-600 text-sm mb-3">{{ $producto['descripcion'] }}</p>
          <div class="flex items-center justify-between mb-4">
            <span class="text-pink-600 font-bold text-lg">{{ number_format($producto['precio'], 2) }}€</span>
            <span class="text-yellow-500 text-sm">★ {{ $producto['rating'] }}</span>
          </div>
          <button class="bg-pink-600 text-white w-full py-2 rounded-lg hover:bg-pink-700 transition">
            Añadir al Carrito
          </button>
        </div>
      </div>
      @endforeach

    </div>
  </div>
</section>
