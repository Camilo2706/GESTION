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
        Schema::create('pqrs', function (Blueprint $table) {
            $table->id('id_pqrs');
        $table->foreignId('id_usuario')->constrained('users');
        $table->enum('tipo', ['Petición', 'Queja', 'Reclamo', 'Sugerencia']);
        $table->text('descripcion');
        $table->date('fecha_creacion');
        $table->enum('estado', ['Abierto', 'Cerrado']);
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pqrs');
    }
};
