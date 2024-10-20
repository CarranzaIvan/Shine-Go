<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('citas', function (Blueprint $table) {
            $table->id('id_cita');
            $table->unsignedBigInteger('id_usuario')->nullable();
            $table->unsignedBigInteger('id_servicio')->nullable();
            $table->date('fecha_cita');
            $table->string('hora_cita', 100);
            $table->string('title', 100);
            $table->date('start');
            $table->date('end');
            $table->string('color', 50);
            $table->string('estado', 50);
            
            // Agregar las columnas de timestamps con nombres personalizados
            $table->timestamp('fyh_creacion')->nullable();
            $table->timestamp('fyh_actualizacion')->nullable();
        });
    }
    
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('citas');
    }
};
