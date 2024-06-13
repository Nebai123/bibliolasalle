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
        Schema::create('prestamos', function (Blueprint $table) {
            $table->id('id_prestamo'); // Clave primaria
            $table->unsignedBigInteger('id_estudiante')->nullable(); // Clave foránea, puede ser nulo
            $table->unsignedBigInteger('id_libro'); // Clave foránea, no puede ser nulo
            $table->string('dni'); // DNI del prestamista
            $table->date('fecha_prestamo'); // Fecha del préstamo
            $table->date('fecha_devolucion')->nullable(); // Fecha de devolución, puede ser nulo
            $table->text('observacion')->nullable(); // Observaciones, puede ser nulo
            $table->timestamps();

            // Definir claves foráneas
            $table->foreign('id_estudiante')->references('id')->on('estudiantes')->onDelete('set null');
            $table->foreign('id_libro')->references('id_libro')->on('libros')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prestamos');
    }
};
