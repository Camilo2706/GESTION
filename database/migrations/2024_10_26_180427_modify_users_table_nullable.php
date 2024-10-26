<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyUsersTableNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Cambiar las columnas 'telefono' y 'direccion' para que sean nullable
            $table->string('telefono')->nullable()->change();
            $table->string('direccion')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Revertir el cambio a no nullable
            $table->string('telefono')->nullable(false)->change();
            $table->string('direccion')->nullable(false)->change();
        });
    }
}
