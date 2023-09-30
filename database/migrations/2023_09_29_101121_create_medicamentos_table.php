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
        Schema::create('medicamentos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_medicamento',50)->nullanble(false);
            $table->double('cantidad_medicamento')->nullanble(false);
            $table->string('medida_medicamento',30)->nullanble(false);
            $table->integer('frecuencia_tiempo')->nullanble(false);
            $table->string('frecuencia_dia',10)->nullanble(false);
            $table->string('via_administracion',50)->nullanble(false);
            $table->date('fecha_inicio')->nullable(false);
            $table->date('fecha_fin')->nullable(true);
            $table->integer('duracion_dias')->nullable(true);
            $table->text('nota_medicamento')->nullable(true);
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
        Schema::dropIfExists('medicamentos');
    }
};
