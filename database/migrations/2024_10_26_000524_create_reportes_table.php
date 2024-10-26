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
        Schema::create('reportes', function (Blueprint $table) {
            $table->id(); // Crea un campo id con unsigned big integer
            $table->foreignId('id_dispositivo')->constrained('dispositivos'); // La tabla 'dispositivos' debe existir
            $table->text('descripcion');
            $table->date('fecha_reporte');
            $table->enum('estado_reporte', ['En Revisión', 'Finalizado']);
            $table->foreignId('id_mantenimiento')->constrained('mantenimientos'); // Nombre correcto de la tabla de referencia
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reportes');
    }
};
