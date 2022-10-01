<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('dpi');
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('telefono_trabajo', 25);
            $table->string('telefono_domiciliar', 25);
            $table->string('celular', 25);
            $table->string('nombres_conyugue')->nullable();
            $table->string('apellidos_conyugue')->nullable();
            $table->boolean('alquila')->nullable();
            $table->string('lugar_trabajo');
            $table->string('direccion_trabajo');
            $table->string('direccion_personal');
            $table->string('correo');
            $table->string('facebook');
            $table->string('foto')->nullable();
            $table->string('referencia_nombres');
            $table->string('referencia_apellidos');
            $table->string('referencia_correo');
            $table->string('referencia_telefono', 25);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
};
