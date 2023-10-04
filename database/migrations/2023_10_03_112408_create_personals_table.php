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
        Schema::create('personals', function (Blueprint $table) {
            $table->id();
            $table->string('primer_nombre',20)->nullanble(false);
            $table->string('segundo_nombre',50)->nullanble(false);
            $table->string('primer_apellido',20)->nullanble(false);
            $table->string('segundo_apellido',50)->nullanble(false);
            $table->date('fecha_contratacion')->nullanble(false);
            $table->string('DPI',15)->nullanble(false);
            $table->date('fecha_nacimiento')->nullanble(false);
            $table->integer('edad')->nullanble(false);
            $table->string('telefono',25)->nullanble(false);
            $table->string('cargo',50)->nullanble(false);
            $table->string('titulo',50)->nullanble(false);
            $table->integer('salario')->nullanble(false);
            $table->string('direccion',150)->nullanble(false);
            $table->string('impuesto',20)->nullanble(false);
            $table->string('sat',150)->nullanble(false);
            $table->string('estado_actual',20)->nullanble(false);
            $table->date('fecha_salida')->nullable(true);
            $table->string('foto')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personals');
    }
};
