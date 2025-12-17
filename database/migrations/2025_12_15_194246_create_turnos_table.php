<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('turnos', function (Blueprint $table) {
            $table->id();

            $table->foreignId('servicio_id')->constrained('servicios');

            $table->date('fecha');
            $table->time('hora');
            $table->string('cliente_nombre');
            $table->string('cliente_email');
            $table->string('cliente_telefono')->nullable();

            $table->string('mascota_nombre');
            $table->string('mascota_tipo');

            $table->enum('estado', ['pendiente', 'confirmado', 'cancelado', 'completado'])->default('confirmado');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('turnos');
    }
};
