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
        Schema::create('patologias', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_patologia',50)->nullanble(false);
            $table->date('fecha_diagnostico')->nullanble(false);
            $table->string('gravedad',25)->nullanble(false);
            $table->string('tratamiento_actual',150)->nullanble(false);
            $table->text('notas_patologia')->nullable(true);
            $table->foreignId('historial_id')
                  ->nullable()
                  ->constrained('historials')
                  ->cascadeOnUpdate()
                  ->cascadeonDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patologias');
    }
};
