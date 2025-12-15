<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('turnos', function (Blueprint $table) {
            $table->id();

            // Relación
            $table->foreignId('servicio_id')->constrained('servicios');

            // Cuándo
            $table->date('fecha'); // 2025-12-20
            $table->time('hora');  // 14:00:00

            // Quién (Datos crudos porque es guest/invitado)
            $table->string('cliente_nombre');
            $table->string('cliente_email');
            $table->string('cliente_telefono')->nullable();

            // Mascota
            $table->string('mascota_nombre');
            $table->string('mascota_tipo'); // Perro/Gato

            // Estado
            $table->enum('estado', ['pendiente', 'confirmado', 'cancelado', 'completado'])->default('confirmado');

            $table->timestamps();
            $table->softDeletes(); // Para no perder historial si borras
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('turnos');
    }
};
