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
        Schema::create('reportes', function (Blueprint $table) {
            $table->id(); // Esto también crea un campo id con unsigned big integer
        $table->foreignId('id_dispositivo')->constrained('dispositivos'); // Asegúrate de que este tipo sea correcto
        $table->text('descripcion');
        $table->date('fecha_reporte');
        $table->enum('estado_reporte', ['En Revisión', 'Finalizado']);
        $table->foreignId('id_mantenimiento')->constrained('mantenimiento'); // Verifica que este sea correcto
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
