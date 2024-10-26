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
        Schema::create('envios', function (Blueprint $table) {
            $table->id('id_envio');
            $table->string('direccion_destino');
            $table->date('fecha_envio');
            $table->enum('estado_envio', ['Pendiente', 'Enviado', 'Entregado']);
            $table->enum('tipo_envio', ['Estándar', 'Urgente']);
            $table->foreignId('usuario_id')->constrained('users');
            $table->foreignId('factura_id')->constrained('facturas', 'id_factura');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('envios');
    }
};
