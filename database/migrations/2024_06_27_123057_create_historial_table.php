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
        Schema::create('historial', function (Blueprint $table) {
            $table->unsignedInteger('id')->autoIncrement();
            $table->timestamps();
            $table->unsignedInteger('id_usuario');
            $table->unsignedInteger('id_juego');
            $table->foreign('id_usuario')->references('id')->on('usuarios');
            $table->foreign('id_juego')->references('id')->on('juegos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historial');
    }
};
