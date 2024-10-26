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
        Schema::create('mantenimientos', function (Blueprint $table) {
            $table->id(); // Esto crea un campo id con unsigned big integer
            $table->foreignId('id_dispositivo')->constrained('dispositivos'); // Verifica que este sea correcto
            $table->string('descripcion_mantenimiento');
            $table->date('fecha_mantenimiento');
            $table->enum('estado_mantenimiento', ['Pendiente', 'Completado']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mantenimientos');
    }
};
