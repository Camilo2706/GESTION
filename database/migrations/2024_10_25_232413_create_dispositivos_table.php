<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('dispositivos', function (Blueprint $table) {
            $table->id(); // Esto crea el id como clave primaria
            $table->foreignId('id_usuario')->constrained('users'); // Asegúrate de que coincidan los tipos de datos
            $table->enum('tipo_dispositivo', ['Computador', 'Tablet', 'Celular']);
            $table->string('marca');
            $table->string('modelo');
            $table->date('fecha_entrega');
            $table->enum('estado', ['Activo', 'En Reparación', 'Inactivo']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dispositivos');
    }
};
