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
        Schema::create('adultos', function (Blueprint $table) {
            $table->id();
            $table->string('primer_nombre',20)->nullanble(false);
            $table->string('segundo_nombre',50)->nullanble(false);
            $table->string('primer_apellido',20)->nullanble(false);
            $table->string('segundo_apellido',50)->nullanble(false);
            $table->date('fecha_ingreso')->nullanble(false);
            $table->string('DPI',15)->nullanble(false);
            $table->string('procedencia',100)->nullanble(false);
            $table->date('fecha_nacimiento')->nullanble(false);
            $table->integer('edad')->nullanble(false);
            $table->string('estado_actual',25)->nullanble(false);
            $table->string('foto')->nullable(true);
            $table->date('fecha_salida')->nullable(true);
            $table->string('motivo',100)->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adultos');
    }
};
