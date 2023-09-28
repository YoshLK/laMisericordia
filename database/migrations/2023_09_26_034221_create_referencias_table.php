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
        Schema::create('referencias', function (Blueprint $table) {
            $table->id();
            $table->string('primer_nombre',20)->nullanble(false);
            $table->string('segundo_nombre',50)->nullanble(false);
            $table->string('primer_apellido',20)->nullanble(false);
            $table->string('segundo_apellido',50)->nullanble(false);
            $table->string('telefono',25)->nullanble(false);
            $table->string('direccion',150)->nullanble(false);
            $table->foreignId('adulto_id')
                  ->nullable()
                  ->constrained('adultos')
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
        Schema::dropIfExists('referencias');
    }
};
