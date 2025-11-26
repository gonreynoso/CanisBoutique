<section id="testimonios" class="bg-white py-20">
  <div class="max-w-7xl mx-auto px-6 text-center">

    <div class="text-pink-600 font-semibold mb-2 flex items-center justify-center gap-2">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.985a1 1 0 00.95.69h4.196c.969 0 1.371 1.24.588 1.81l-3.397 2.467a1 1 0 00-.364 1.118l1.286 3.985c.3.921-.755 1.688-1.54 1.118l-3.397-2.467a1 1 0 00-1.175 0L7.135 18.09c-.784.57-1.838-.197-1.539-1.118l1.285-3.985a1 1 0 00-.364-1.118L3.121 9.412c-.783-.57-.38-1.81.588-1.81h4.196a1 1 0 00.95-.69l1.286-3.985z"/>
      </svg>
      Opiniones de Clientes
    </div>

    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">
      Lo que Dicen Nuestros Clientes
    </h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

      @foreach ($testimonials as $t)
      <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm hover:shadow-md transition-all">

        <p class="text-gray-800 text-[15px] leading-relaxed mb-4">
          “{{ $t['texto'] }}”
        </p>

        <div class="text-amber-500 text-sm mb-4 tracking-wide">
          {!! str_repeat('★', $t['estrellas']) !!}
        </div>

        <div class="text-gray-900 font-medium text-sm tracking-tight">
          {{ $t['nombre'] }}
        </div>

      </div>
      @endforeach

    </div>

  </div>
</section>

