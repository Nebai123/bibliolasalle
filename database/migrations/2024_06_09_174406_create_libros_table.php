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
        Schema::create('libros', function (Blueprint $table) {
            $table->id('id_libro'); // Cambia el nombre del campo id si lo prefieres
            $table->string('codigo')->unique();
            $table->string('titulo');
            $table->string('autor');
            $table->integer('ejemplares')->nullable();
            $table->text('descripcion')->nullable();
            $table->string('imagen')->nullable();
            $table->string('tema');
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('libros');
    }
};
